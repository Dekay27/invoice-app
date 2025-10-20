<?php
// Database file path (store outside web root for security)
$dbPath = './';

// Ensure the directory exists and is writable
//$dir = dirname($dbPath);
//if (!is_dir($dir)) {
//    mkdir($dir, 0755, true);
//    chown($dir, 'www-data'); // Adjust for your server user
//    chgrp($dir, 'www-data');
//}

// Initialize PDO with SQLite
try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Enable foreign key support in SQLite
    $pdo->exec('PRAGMA foreign_keys = ON;');

    // Create companies table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS companies (
            company_id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            location TEXT NOT NULL,
            address TEXT NOT NULL,
            phone1 TEXT NOT NULL,
            phone2 TEXT,
            email TEXT NOT NULL,
            logo_svg TEXT
        )
    ");

    // Create clients table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS clients (
            client_id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            address TEXT NOT NULL,
            phone TEXT,
            email TEXT NOT NULL
        )
    ");

    // Create invoices table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS invoices (
            invoice_id INTEGER PRIMARY KEY AUTOINCREMENT,
            invoice_number TEXT NOT NULL UNIQUE,
            company_id INTEGER,
            client_id INTEGER,
            date_issued DATE NOT NULL,
            due_date DATE NOT NULL,
            subtotal REAL NOT NULL DEFAULT 0.00,
            discount REAL NOT NULL DEFAULT 0.00,
            grand_total REAL NOT NULL DEFAULT 0.00,
            payment_terms TEXT,
            notes TEXT,
            show_payment_terms INTEGER DEFAULT 1,
            show_client_notes INTEGER DEFAULT 1,
            status TEXT NOT NULL DEFAULT 'draft' CHECK(status IN ('draft', 'sent', 'paid', 'overdue')),
            FOREIGN KEY (company_id) REFERENCES companies(company_id) ON DELETE SET NULL,
            FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE SET NULL
        )
    ");

    // Create invoice_items table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS invoice_items (
            item_id INTEGER PRIMARY KEY AUTOINCREMENT,
            invoice_id INTEGER,
            description TEXT NOT NULL,
            extra_details TEXT,
            cost REAL NOT NULL DEFAULT 0.00,
            discount REAL NOT NULL DEFAULT 0.00,
            quantity INTEGER NOT NULL DEFAULT 1,
            total_price REAL NOT NULL DEFAULT 0.00,
            FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id) ON DELETE CASCADE
        )
    ");

    // Create payment_methods table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS payment_methods (
            method_id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL UNIQUE,
            icon_class TEXT
        )
    ");

    // Create invoice_payment_methods table (junction table)
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS invoice_payment_methods (
            invoice_id INTEGER,
            method_id INTEGER,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (invoice_id, method_id),
            FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id) ON DELETE CASCADE,
            FOREIGN KEY (method_id) REFERENCES payment_methods(method_id) ON DELETE CASCADE
        )
    ");

    // Create bank_accounts table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS bank_accounts (
            account_id INTEGER PRIMARY KEY AUTOINCREMENT,
            company_id INTEGER,
            account_number TEXT NOT NULL,
            bank_name TEXT NOT NULL,
            country TEXT NOT NULL,
            iban TEXT,
            swift_code TEXT,
            FOREIGN KEY (company_id) REFERENCES companies(company_id) ON DELETE SET NULL
        )
    ");

    // Create invoice_emails table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS invoice_emails (
            email_id INTEGER PRIMARY KEY AUTOINCREMENT,
            invoice_id INTEGER,
            from_email TEXT NOT NULL,
            to_email TEXT NOT NULL,
            subject TEXT NOT NULL,
            message TEXT NOT NULL,
            sent_at DATETIME,
            attachment_path TEXT,
            FOREIGN KEY (invoice_id) REFERENCES invoices(invoice_id) ON DELETE CASCADE
        )
    ");

    // Insert sample payment methods for Tagify
    $pdo->exec("
        INSERT OR IGNORE INTO payment_methods (name, icon_class) VALUES
        ('Mobile Money', 'icon-base bx bx-mobile-alt mb-50'),
        ('Bank Account', 'icon-base bx bx-building-house mb-50'),
        ('Crypto', 'icon-base bx bx-bitcoin mb-50'),
        ('Cash Delivery', 'icon-base bx bx-money-withdraw mb-50')
    ");

    echo "SQLite database and tables created successfully at $dbPath";

} catch (PDOException $e) {
    die("Error creating database: " . $e->getMessage());
}
?>