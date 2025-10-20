<?php
// Database file path
global $pdo;
$dbPath = '../database/invoice.db';

// Initialize PDO
try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('PRAGMA foreign_keys = OFF;');

    // Start transaction
    $pdo->beginTransaction();

    // Insert invoice
    $invoiceStmt = $pdo->prepare('
 INSERT INTO invoices (
    invoice_number, company_id, client_id, date_issued, due_date,
    subtotal, discount, grand_total, payment_terms, notes,
    show_payment_terms, show_client_notes, status
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
ON CONFLICT(invoice_number) DO UPDATE SET
    company_id = excluded.company_id,
    client_id = excluded.client_id,
    date_issued = excluded.date_issued,
    due_date = excluded.due_date,
    subtotal = excluded.subtotal,
    discount = excluded.discount,
    grand_total = excluded.grand_total,
    payment_terms = excluded.payment_terms,
    notes = excluded.notes,
    show_payment_terms = excluded.show_payment_terms,
    show_client_notes = excluded.show_client_notes,
    status = excluded.status
RETURNING invoice_id
    ');
    $invoiceStmt->execute([
        $_POST['invoiceId'],
        $_POST['company_id'],
        $_POST['client_id'],
        $_POST['dateIssued'],
        $_POST['dateDue'],
        $_POST['subtotal'] ?? 0.00,
        $_POST['discount'] ?? 0.00,
        $_POST['grand_total'] ?? 0.00,
        $_POST['invoiceMsg'] ?? '',
        $_POST['note'] ?? '',
        isset($_POST['payment-terms']) ? 1 : 0,
        isset($_POST['client-notes']) ? 1 : 0,
        'draft'
    ]);
    $invoice_id = $invoiceStmt->fetchColumn();

    // Delete existing items for this invoice (for updates)
    $pdo->prepare('DELETE FROM invoice_items WHERE invoice_id = ?')->execute([$invoice_id]);

    // Insert items
    if (isset($_POST['group-a']) && is_array($_POST['group-a'])) {
        $itemStmt = $pdo->prepare('
            INSERT INTO invoice_items (
                invoice_id, description, extra_details, cost, discount, quantity, total_price
            ) VALUES (?, ?, ?, ?, ?, ?, ?)
        ');
        foreach ($_POST['group-a'] as $item) {
            $cost = floatval($item['cost'] ?? 0);
            $discount = floatval($item['discount'] ?? 0);
            $quantity = intval($item['quantity'] ?? 1);
            $total_price = ($cost * $quantity) - $discount;

            $itemStmt->execute([
                $invoice_id,
                $item['item-details'] ?? '',
                $item['extra-details'] ?? '',
                $cost,
                $discount,
                $quantity,
                $total_price
            ]);
        }
    }

    // Delete existing payment methods for this invoice
    $pdo->prepare('DELETE FROM invoice_payment_methods WHERE invoice_id = ?')->execute([$invoice_id]);

    // Insert payment methods
    if (isset($_POST['acceptPaymentsVia']) && !empty($_POST['acceptPaymentsVia'])) {
        $methods = is_array($_POST['acceptPaymentsVia']) ? $_POST['acceptPaymentsVia'] : explode(',', $_POST['acceptPaymentsVia']);
        $methodStmt = $pdo->prepare('SELECT method_id FROM payment_methods WHERE name = ?');
        $insertMethodStmt = $pdo->prepare('INSERT INTO invoice_payment_methods (invoice_id, method_id) VALUES (?, ?)');
        foreach ($methods as $method) {
            $method = trim($method);
            if ($method) {
                $methodStmt->execute([$method]);
                $method_id = $methodStmt->fetchColumn();
                if ($method_id) {
                    $insertMethodStmt->execute([$invoice_id, $method_id]);
                }
            }
        }
    }


    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => 'Invoice saved successfully!']);
} catch (PDOException $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Error saving invoice: ' . $e->getMessage()]);
}
?>