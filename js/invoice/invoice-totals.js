// Parse helper (strips symbols/nonsense for any currency)
function parseCurrency(str) {
    return parseFloat((str || "0").replace(/[^0-9.\-]+/g, "")) || 0;
}

// Currency-aware format helper
const currencySymbols = {
    'USD': '$',
    'GHS': 'GH¢',
    'EUR': '€',
    'GBP': '£'
};

function formatCurrency(currencyCode, num) {
    const symbol = currencySymbols[currencyCode] || '$'; // Fallback to USD
    return symbol + num.toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Get current currency code from radio selection
function getCurrentCurrency() {
    const selected = document.querySelector('input[name="paymentCurrency"]:checked');
    return selected ? selected.value : 'GHS'; // Default to GHS per your script
}

// Totals calculator (currency-aware, with per-row calcs)
function updateInvoiceTotals() {
    const currencyCode = getCurrentCurrency();
    let total = 0, totalDiscount = 0;

    // Calc and format each row's total
    document.querySelectorAll('[data-repeater-item]').forEach(row => {
        const price = parseCurrency(row.querySelector('.invoice-item-price')?.value);
        const qty = parseFloat(row.querySelector('.invoice-item-qty')?.value) || 1;
        const disc = parseCurrency(row.querySelector('.discount')?.value);
        const rowTotal = (price * qty) - disc;
        row.querySelector('.invoice-item-total-price').textContent = formatCurrency(currencyCode, rowTotal);
        total += rowTotal;
        totalDiscount += disc;
    });

    const subtotal = total;
    const taxPercent = parseFloat(document.querySelector('.invoice-tax-percent')?.textContent || "0");
    const taxAmount = (subtotal - totalDiscount) * (taxPercent / 100);
    const grandTotal = subtotal - totalDiscount + taxAmount;

    // Update summary DOM
    document.querySelector('.invoice-subtotal').textContent = formatCurrency(currencyCode, subtotal);
    document.querySelector('.invoice-total-discount').textContent = formatCurrency(currencyCode, totalDiscount);
    document.querySelector('.invoice-grand-total').textContent = formatCurrency(currencyCode, grandTotal);

    // Normalize placeholders for new rows/inputs
    document.querySelectorAll('.invoice-item-price, .discount').forEach(el => {
        el.placeholder = formatCurrency(currencyCode, 0);
    });
}

// Store all rows to localStorage
function saveRepeater() {
    const items = [];
    document.querySelectorAll('[data-repeater-item]').forEach(item => {
        items.push({
            detail:   item.querySelector('.item-details')?.value || '',
            extra:    item.querySelector('textarea')?.value || '',
            cost:     item.querySelector('.invoice-item-price')?.value || '',
            discount: item.querySelector('.discount')?.value || '',
            qty:      item.querySelector('.invoice-item-qty')?.value || ''
        });
    });
    localStorage.setItem('invoiceItems', JSON.stringify(items));
}

// Load saved items back into the repeater
function loadRepeater() {
    const saved = localStorage.getItem('invoiceItems');
    if (!saved) return;
    const items = JSON.parse(saved);

    // Remove extra rows (keep first as template)
    const allRows = document.querySelectorAll('[data-repeater-item]');
    allRows.forEach((item, i) => { if (i > 0) item.remove(); });

    items.forEach((data, index) => {
        if (index > 0) {
            document.querySelector('[data-repeater-create]').click();
        }
        const row = document.querySelectorAll('[data-repeater-item]')[index];
        row.querySelector('.item-details').value = data.detail;
        row.querySelector('textarea').value = data.extra;
        row.querySelector('.invoice-item-price').value = data.cost;
        row.querySelector('.discount').value = data.discount;
        row.querySelector('.invoice-item-qty').value = data.qty;
    });

    // Recalc after load
    updateInvoiceTotals();
}

// Delete helper
function removeRow(e) {
    // Find index of row
    const rows = Array.from(document.querySelectorAll('[data-repeater-item]'));
    const row = e.target.closest('[data-repeater-item]');
    const rowIndex = rows.indexOf(row);

    // Remove the DOM row
    row.remove();

    // Surgically remove from storage
    let items = JSON.parse(localStorage.getItem('invoiceItems') || '[]');
    if (rowIndex >= 0 && rowIndex < items.length) {
        items.splice(rowIndex, 1);
        localStorage.setItem('invoiceItems', JSON.stringify(items));
    }

    // Update totals after removal
    updateInvoiceTotals();
}

// Initialise everything
document.addEventListener('DOMContentLoaded', () => {
    // Load saved items
    loadRepeater();
    updateInvoiceTotals();

    // Currency change listener
    document.querySelectorAll('input[name="paymentCurrency"]').forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                localStorage.setItem('paymentCurrency', radio.value);
            }
            updateInvoiceTotals(); // Reformat everything
        });
    });

    // Save to localStorage on any input change inside repeater
    document.querySelector('[data-repeater-list]').addEventListener('input', () => {
        saveRepeater();
        updateInvoiceTotals();
    });

    // Hook into delete clicks
    document.querySelector('[data-repeater-list]').addEventListener('click', e => {
        if (e.target.hasAttribute('data-repeater-delete') || e.target.closest('[data-repeater-delete]')) {
            removeRow(e);
        }
    });

    // When adding a new row
    document.querySelector('[data-repeater-create]').addEventListener('click', () => {
        setTimeout(() => {
            saveRepeater();
            updateInvoiceTotals();
        }, 200);
    });
});