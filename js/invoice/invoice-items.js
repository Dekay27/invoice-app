
    // Save price info that gets repeated to localStorage
    function saveRepeater() {
    const items = [];

    document.querySelectorAll('[data-repeater-item]').forEach(item => {
    const detail   = item.querySelector('.item-details')?.value || '';
    const extra    = item.querySelector('textarea')?.value || '';
    const cost     = item.querySelector('.invoice-item-price')?.value || '';
    const discount = item.querySelector('.discount')?.value || '';
    const qty      = item.querySelector('.invoice-item-qty')?.value || '';

    items.push({ detail, extra, cost, discount, qty });
});

    localStorage.setItem('invoiceItems', JSON.stringify(items));
}

    function loadRepeater() {
    const saved = localStorage.getItem('invoiceItems');
    if (!saved) return;

    const items = JSON.parse(saved);

    // remove extra rows (keep only first as template)
    const allRows = document.querySelectorAll('[data-repeater-item]');
    allRows.forEach((item, i) => { if (i > 0) item.remove(); });

    items.forEach((data, index) => {
    if (index > 0) {
    // click your repeater "add" button to create a new row
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

    // set up everything on page load
    document.addEventListener('DOMContentLoaded', () => {
    // load saved items into the repeater
    loadRepeater();

    // watch for input changes inside the repeater
    document.querySelector('[data-repeater-list]').addEventListener('input', saveRepeater);

    // also watch for item deletion (so we update localStorage after deletion)
    document.querySelector('[data-repeater-list]').addEventListener('click', e => {
    if (e.target.hasAttribute('data-repeater-delete')) {
    // wait a tick for the row to be removed then save
    setTimeout(saveRepeater, 100);
}
});

    // also update localStorage when a new row is added
    document.querySelector('[data-repeater-create]').addEventListener('click', () => {
    // wait a tick for the new row to appear then attach input listener automatically
    setTimeout(saveRepeater, 200);
});
});