// // invoice-calculator.js
//
// document.addEventListener('DOMContentLoaded', function () {
//     // Setup calculation listeners for a single repeater row
//     function setupRepeaterRow(row) {
//         const costInput = row.querySelector('.invoice-item-price');
//         const qtyInput = row.querySelector('.invoice-item-qty');
//         const discountInput = row.querySelector('.discount');
//         const priceElem = row.querySelector('.invoice-item-total-price');
//
//         if (!costInput || !qtyInput || !discountInput || !priceElem) return;
//
//         function updatePrice() {
//             const cost = parseFloat(costInput.value) || 0;
//             const qty = parseFloat(qtyInput.value) || 0;
//             const discount = parseFloat(discountInput.value) || 0;
//             let price = (cost * qty) - discount;
//             if (price < 0) price = 0;
//             priceElem.textContent = `$${price.toFixed(2)}`;
//         }
//
//         [costInput, qtyInput, discountInput].forEach(input =>
//             input.addEventListener('input', updatePrice)
//         );
//
//         // Initial calculation
//         updatePrice();
//     }
//
//     // Setup for all current rows on page load
//     document.querySelectorAll('[data-repeater-item]').forEach(setupRepeaterRow);
//
//     // Listen for new rows being added (when user clicks "Add Item")
//     document.querySelector('[data-repeater-list]').addEventListener('DOMNodeInserted', function (e) {
//         if (e.target.matches('[data-repeater-item]')) {
//             setupRepeaterRow(e.target);
//         }
//     });
// });