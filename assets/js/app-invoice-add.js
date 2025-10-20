/**
 * App Invoice - Add
 */

/**
'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  const invoiceItemPriceList = document.querySelectorAll('.invoice-item-price'),
    invoiceItemQtyList = document.querySelectorAll('.invoice-item-qty'),
    invoiceDateList = document.querySelectorAll('.date-picker');

  // Price
  if (invoiceItemPriceList) {
    invoiceItemPriceList.forEach(function (invoiceItemPrice) {
      if (invoiceItemPrice) {
        invoiceItemPrice.addEventListener('input', event => {
          invoiceItemPrice.value = formatNumeral(event.target.value, {
            delimiter: '',
            numeral: true
          });
        });
      }
    });
  }

  // Qty
  if (invoiceItemQtyList) {
    invoiceItemQtyList.forEach(function (invoiceItemQty) {
      if (invoiceItemQty) {
        invoiceItemQty.addEventListener('input', event => {
          invoiceItemQty.value = formatNumeral(event.target.value, {
            delimiter: '',
            numeral: true
          });
        });
      }
    });
  }

  // Datepicker
  if (invoiceDateList) {
    invoiceDateList.forEach(function (invoiceDateEl) {
      invoiceDateEl.flatpickr({
        monthSelectorType: 'static'
      });
    });
  }

  // repeater (jquery)
  var applyChangesBtn = $('.btn-apply-changes'),
    discount,
    tax1,
    tax2,
    discountInput,
    tax1Input,
    tax2Input,
    sourceItem = $('.source-item'),
    adminDetails = {
      'App Design': 'Designed UI kit & app pages.',
      'App Customization': 'Customization & Bug Fixes.',
      'ABC Template': 'Bootstrap 4 admin template.',
      'App Development': 'Native App Development.'
    };

  // Prevent dropdown from closing on tax change
  $(document).on('click', '.tax-select', function (e) {
    e.stopPropagation();
  });

  // On tax change update it's value value
  function updateValue(listener, el) {
    listener.closest('.repeater-wrapper').find(el).text(listener.val());
  }

  // Apply item changes btn
  if (applyChangesBtn.length) {
    $(document).on('click', '.btn-apply-changes', function (e) {
      var $this = $(this);
      tax1Input = $this.closest('.dropdown-menu').find('#taxInput1');
      tax2Input = $this.closest('.dropdown-menu').find('#taxInput2');
      discountInput = $this.closest('.dropdown-menu').find('#discountInput');
      tax1 = $this.closest('.repeater-wrapper').find('.tax-1');
      tax2 = $this.closest('.repeater-wrapper').find('.tax-2');
      discount = $('.discount');

      if (tax1Input.val() !== null) {
        updateValue(tax1Input, tax1);
      }

      if (tax2Input.val() !== null) {
        updateValue(tax2Input, tax2);
      }

      if (discountInput.val().length) {
        $this
          .closest('.repeater-wrapper')
          .find(discount)
          .text(discountInput.val() + '%');
      }
    });
  }

  // Repeater init
  if (sourceItem.length) {
    sourceItem.on('submit', function (e) {
      e.preventDefault();
    });
    sourceItem.repeater({
      show: function () {
        $(this).slideDown();
        // Initialize tooltip on load of each item
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
        });
      },
      hide: function (e) {
        $(this).slideUp();
      }
    });
  }

  // Item details select onchange
  $(document).on('change', '.item-details', function () {
    var $this = $(this),
      value = adminDetails[$this.val()];
    if ($this.next('textarea').length) {
      $this.next('textarea').val(value);
    } else {
      $this.after('<textarea class="form-control" rows="2">' + value + '</textarea>');
    }
  });
});
**/

/**
 * Combined Invoice Management Script
 */
'use strict';

// Utility function to format numbers (assumed to be available)
function formatNumeral(value, options) {
  // Placeholder for formatNumeral; replace with actual implementation if needed
  // Assumes it formats input values for numbers (e.g., removes delimiters)
  return value.replace(/[^0-9.]/g, '');
}

// Setup input formatting for price and quantity fields
function setupInputFormatting(element) {
  const priceInputs = element.querySelectorAll('.invoice-item-price');
  const qtyInputs = element.querySelectorAll('.invoice-item-qty');

  priceInputs.forEach(input => {
    input.addEventListener('input', event => {
      event.target.value = formatNumeral(event.target.value, { delimiter: '', numeral: true });
    });
  });

  qtyInputs.forEach(input => {
    input.addEventListener('input', event => {
      event.target.value = formatNumeral(event.target.value, { delimiter: '', numeral: true });
    });
  });
}

// Setup date pickers
function setupDatePickers(element) {
  const datePickers = element.querySelectorAll('.date-picker');
  datePickers.forEach(el => {
    if (!el._flatpickr) { // Prevent re-initialization
      el.flatpickr({ monthSelectorType: 'static' });
    }
  });
}

// Setup price calculations for a repeater row
function setupRepeaterRow(row) {
  const costInput = row.querySelector('.invoice-item-price');
  const qtyInput = row.querySelector('.invoice-item-qty');
  const discountInput = row.querySelector('.discount');
  const priceElem = row.querySelector('.invoice-item-total-price');

  if (!costInput || !qtyInput || !discountInput || !priceElem) return;

  function updatePrice() {
    const cost = parseFloat(costInput.value) || 0;
    const qty = parseFloat(qtyInput.value) || 0;
    const discount = parseFloat(discountInput.textContent) || 0; // Use textContent to match repeater
    let price = (cost * qty) - discount;
    if (price < 0) price = 0;
    priceElem.textContent = `$${price.toFixed(2)}`;
  }

  [costInput, qtyInput].forEach(input => {
    input.addEventListener('input', updatePrice);
  });

  // Observe discount changes (since it's updated via textContent)
  const observer = new MutationObserver(updatePrice);
  observer.observe(discountInput, { childList: true, characterData: true, subtree: true });

  updatePrice();
}

// Setup jQuery repeater functionality
function setupRepeater(sourceItem) {
  if (!sourceItem.length) return;

  sourceItem.on('submit', function (e) {
    e.preventDefault();
  });

  sourceItem.repeater({
    show: function () {
      $(this).slideDown();
      // Initialize tooltip for new items
      const tooltipTriggerList = [].slice.call(this.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
      // Setup formatting and calculations for new row
      setupInputFormatting(this);
      setupDatePickers(this);
      setupRepeaterRow(this);
    },
    hide: function (e) {
      $(this).slideUp();
    }
  });
}

// Setup tax and discount handling
function setupTaxDiscount() {
  const adminDetails = {
    'App Design': 'Designed UI kit & app pages.',
    'App Customization': 'Customization & Bug Fixes.',
    'ABC Template': 'Bootstrap 4 admin template.',
    'App Development': 'Native App Development.'
  };

  $(document).on('click', '.tax-select', function (e) {
    e.stopPropagation();
  });

  function updateValue(listener, el) {
    listener.closest('.repeater-wrapper').find(el).text(listener.val());
  }

  $(document).on('click', '.btn-apply-changes', function (e) {
    const $this = $(this);
    const tax1Input = $this.closest('.dropdown-menu').find('#taxInput1');
    const tax2Input = $this.closest('.dropdown-menu').find('#taxInput2');
    const discountInput = $this.closest('.dropdown-menu').find('#discountInput');
    const tax1 = $this.closest('.repeater-wrapper').find('.tax-1');
    const tax2 = $this.closest('.repeater-wrapper').find('.tax-2');
    const discount = $this.closest('.repeater-wrapper').find('.discount');

    if (tax1Input.val() !== null) updateValue(tax1Input, tax1);
    if (tax2Input.val() !== null) updateValue(tax2Input, tax2);
    if (discountInput.val().length) {
      $this.closest('.repeater-wrapper').find(discount).text(discountInput.val() + '%');
    }
  });

  $(document).on('change', '.item-details', function () {
    const $this = $(this);
    const value = adminDetails[$this.val()];
    if ($this.next('textarea').length) {
      $this.next('textarea').val(value);
    } else {
      $this.after(`<textarea class="form-control" rows="2">${value}</textarea>`);
    }
  });
}

// Initialize all functionality for existing elements
function initializeElements(root) {
  setupInputFormatting(root);
  setupDatePickers(root);
  setupRepeater($(root).find('.source-item'));
  setupTaxDiscount();
  $(root).find('[data-repeater-item]').each(function () {
    setupRepeaterRow(this);
  });
}

// MutationObserver to handle DOM changes
function setupMutationObserver() {
  const observer = new MutationObserver((mutations) => {
    mutations.forEach(mutation => {
      if (mutation.type === 'childList') {
        mutation.addedNodes.forEach(node => {
          if (node.nodeType === Node.ELEMENT_NODE) {
            if (node.matches('[data-repeater-item]')) {
              setupRepeaterRow(node);
            } else if (node.querySelector('[data-repeater-item]')) {
              node.querySelectorAll('[data-repeater-item]').forEach(setupRepeaterRow);
            }
            initializeElements(node);
          }
        });
      }
    });
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true
  });

  // Initial setup for existing elements
  initializeElements(document);
}

// Start observing when script loads
setupMutationObserver();


// flatpickr helper
flatpickr('.flatpickr', {
  altInput: true,
  altFormat: 'F j, Y', // Displays "January 01, 2025"
  dateFormat: 'Y-m-d', // Stores "2025-01-01" for form submission
  defaultDate: 'today', //
  static: true, // Keeps the calendar in place (Sneat’s default)[](https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/forms-pickers.html)
  monthSelectorType: 'static' // Prevents dropdown for month/year (Sneat’s style)
});

// Payment Options with Tagify
// let input = document.querySelector('#acceptPaymentsVia');
// new Tagify(input, {
//   whitelist: [
//     "Bank Account",
//     "Paypal",
//     "Credit/Debit Card",
//     "UPI Transfer"
//   ],
//   dropdown: {
//     enabled: 0,         // show the suggestions dropdown on focus
//     maxItems: 5,        // max items to show in the dropdown
//     classname: "tagify-dropdown",
//     closeOnSelect: false // don't close the suggestions dropdown after selecting an item
//   }
// });

const pay_input = document.querySelector('#acceptPaymentsVia');
new Tagify(pay_input, {
  whitelist: ['Bank Account', 'Paypal', 'Credit/Debit Card', 'UPI Transfer'], // Predefined options
  maxTags: 4, // Limit to the number of options (optional)
  dropdown: {
    enabled: 0, // Show dropdown immediately on focus
    maxItems: 10, // Show up to 10 suggestions
    classname: 'tagify__dropdown', // Custom dropdown class
    searchKeys: ['value'] // Search by tag value
  },
  enforceWhitelist: true, // Only allow tags from whitelist
  delimiters: ',', // Comma-separated input
  originalInputValueFormat: values => values.map(item => item.value).join(','), // Format output as comma-separated string
  placeholder: 'Select payment methods' // Placeholder for input
});