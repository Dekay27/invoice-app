// Parse and format helpers stay the same
function parseCurrency(str) {
    return parseFloat((str || "0").replace(/[^0-9.\-]+/g, "")) || 0;
}
function formatCurrency(num) {
    return '$' + num.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

// Totals calculator stays the same
function updateInvoiceTotals() {
    let total = 0, totalDiscount = 0;
    document.querySelectorAll('.invoice-item-total-price').forEach(el => {
        total += parseCurrency(el.textContent);
    });
    document.querySelectorAll('.discount').forEach(input => {
        totalDiscount += parseCurrency(input.value);
    });

    const subtotal = total;
    const taxPercent = parseFloat(document.querySelector('.invoice-tax-percent')?.textContent || "0");
    const taxAmount = (subtotal - totalDiscount) * (taxPercent / 100);
    const grandTotal = subtotal - totalDiscount + taxAmount;

    document.querySelector('.invoice-subtotal').textContent = formatCurrency(subtotal);
    document.querySelector('.invoice-total-discount').textContent = formatCurrency(totalDiscount);
    document.querySelector('.invoice-grand-total').textContent = formatCurrency(grandTotal);
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

    // remove extra rows (keep only first as template)
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
}

// *** Delete helper ***
// Takes the DOM event from the delete button, removes the row + its data
function removeRow(e) {
    // find index of row
    const rows = Array.from(document.querySelectorAll('[data-repeater-item]'));
    const row = e.target.closest('[data-repeater-item]');
    const rowIndex = rows.indexOf(row);

    // remove the DOM row
    row.remove();

    // surgically remove from storage
    let items = JSON.parse(localStorage.getItem('invoiceItems') || '[]');
    if (rowIndex >= 0 && rowIndex < items.length) {
        items.splice(rowIndex, 1);
        localStorage.setItem('invoiceItems', JSON.stringify(items));
    }

    // update totals after removal
    updateInvoiceTotals();
}

// Initialise everything
document.addEventListener('DOMContentLoaded', () => {
    // Load saved items
    loadRepeater();
    updateInvoiceTotals();

    // Save to localStorage on any input change inside repeater
    document.querySelector('[data-repeater-list]').addEventListener('input', () => {
        saveRepeater();
        updateInvoiceTotals();
    });

    // Hook into delete clicks
    document.querySelector('[data-repeater-list]').addEventListener('click', e => {
        if (e.target.hasAttribute('data-repeater-delete') || e.target.closest('[data-repeater-delete]')) {
            removeRow(e);  // uses the helper
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
