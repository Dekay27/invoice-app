function parseCurrency(str) {
    // Remove $ and commas, handle empty values
    return parseFloat((str || "0").replace(/[^0-9.\-]+/g, "")) || 0;
}
function formatCurrency(num) {
    return '$' + num.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function updateInvoiceTotals() {
    // Get all line item totals and discounts
    let total = 0, totalDiscount = 0;
    document.querySelectorAll('.invoice-item-total-price').forEach(function(el) {
        total += parseCurrency(el.textContent);
    });
    document.querySelectorAll('.discount').forEach(function(input) {
        totalDiscount += parseCurrency(input.value);
    });

    // Subtotal is sum of all line prices before discounts
    const subtotal = total;

    // Tax percent: get the .invoice-tax-percent element's text, or default to 0
    const taxPercent = parseFloat(document.querySelector('.invoice-tax-percent')?.textContent || "0");
    const taxAmount = (subtotal - totalDiscount) * (taxPercent / 100);

    // Grand total = subtotal - discounts + tax
    const grandTotal = subtotal - totalDiscount + taxAmount;

    // Update fields
    document.querySelector('.invoice-subtotal').textContent = formatCurrency(subtotal);
    document.querySelector('.invoice-total-discount').textContent = formatCurrency(totalDiscount);
    // (tax percent stays as % in HTML)
    document.querySelector('.invoice-grand-total').textContent = formatCurrency(grandTotal);
}

// Call when invoice items change
document.addEventListener('input', function(e) {
    if (
        e.target.classList.contains('invoice-item-price') ||
        e.target.classList.contains('invoice-item-qty') ||
        e.target.classList.contains('discount')
    ) {
        setTimeout(updateInvoiceTotals, 20); // wait for per-row JS to update
    }
});

// Initial update on a page load
window.addEventListener('DOMContentLoaded', updateInvoiceTotals);