<?php
// Database file path
$dbPath = '../database/invoice.db';

// Initialize PDO
try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('PRAGMA foreign_keys = OFF;');

    // Start transaction
    $pdo->beginTransaction();

    // Insert or update company (assuming one company for simplicity)
    $companyStmt = $pdo->prepare('
        INSERT INTO companies (name, location, address, phone1, phone2, email, logo_svg)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ON CONFLICT(name) DO UPDATE SET
            location = excluded.location,
            address = excluded.address,
            phone1 = excluded.phone1,
            phone2 = excluded.phone2,
            email = excluded.email,
            logo_svg = excluded.logo_svg
        RETURNING company_id
    ');
    $companyStmt->execute([
        $_POST['companyName'] ?? 'Freelance',
        $_POST['companyLocation'] ?? 'Company Location',
        $_POST['companyAddress'] ?? 'City, State, Country',
        $_POST['companyPhone'] ?? '+1 (***) *** ****',
        $_POST['companyPhone2'] ?? '+44 (***) *** ****',
        $_POST['companyEmail'] ?? 'Email',
        $_POST['companyLogo'] ?? '' // SVG or empty
    ]);
    $company_id = $companyStmt->fetchColumn();

    // Insert or update client
    $clientStmt = $pdo->prepare('
        INSERT INTO clients (name, address, phone, email)
        VALUES (?, ?, ?, ?)
        ON CONFLICT(email) DO UPDATE SET
            name = excluded.name,
            address = excluded.address,
            phone = excluded.phone
        RETURNING client_id
    ');
    $clientStmt->execute([
        $_POST['clientName'] ?? 'Shelby Company Limited',
        $_POST['clientAddress'] ?? 'Small Heath, B10 0HF, UK',
        $_POST['clientPhone'] ?? '718-986-6062',
        $_POST['clientEmail'] ?? 'peakyFBlinders@gmail.com'
    ]);
    $client_id = $clientStmt->fetchColumn();

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
        $company_id,
        $client_id,
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

    // Insert or update bank account
    $bankStmt = $pdo->prepare('
        INSERT INTO bank_accounts (
            company_id, account_number, bank_name, country, iban, swift_code
        ) VALUES (?, ?, ?, ?, ?, ?)
        ON CONFLICT(account_number) DO UPDATE SET
            bank_name = excluded.bank_name,
            country = excluded.country,
            iban = excluded.iban,
            swift_code = excluded.swift_code
    ');
    $bankStmt->execute([
        $company_id,
        $_POST['accountNumber'] ?? '12911055',
        $_POST['bankName'] ?? 'American Bank',
        $_POST['country'] ?? 'United States',
        $_POST['iban'] ?? 'ETD95476213874685',
        $_POST['swiftCode'] ?? 'BR91905'
    ]);

    // Insert email data (optional, only if "Send" is also triggered)
    if (isset($_POST['invoice-from']) && isset($_POST['invoice-to'])) {
        $emailStmt = $pdo->prepare('
            INSERT INTO invoice_emails (
                invoice_id, from_email, to_email, subject, message, attachment_path
            ) VALUES (?, ?, ?, ?, ?, ?)
        ');
        $emailStmt->execute([
            $invoice_id,
            $_POST['invoice-from'],
            $_POST['invoice-to'],
            $_POST['invoice-subject'] ?? '',
            $_POST['invoice-message'] ?? '',
            $_POST['attachment_path'] ?? ''
        ]);
    }

    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => 'Invoice saved successfully!']);
} catch (PDOException $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Error saving invoice: ' . $e->getMessage()]);
}
?>