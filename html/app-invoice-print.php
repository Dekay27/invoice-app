<!doctype html>

<html
  lang="en"
  class="layout-wide"
  dir="ltr"
  data-skin="default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Invoice (Print version) - Patriot Project</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="../assets/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <!-- Page CSS -->

    <link rel="stylesheet" href="../assets/vendor/css/pages/app-invoice-print.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="invoice-print p-12">
      <div class="d-flex justify-content-between flex-row">
        <div class="mb-6">
          <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
            <span class="app-brand-logo demo" id="logo">
                <span class="text-primary">
                  <img id="companyLogo" src="" alt="logo" width="50">
                </span>
            </span>
              <span class="app-brand-text demo fw-bold ms-50" id="senderName"></span>
          </div>
            <p class="mb-0" id="senderLocation"></p>
            <p class="mb-0" id="senderContact"></p>
            <p class="mb-0" id="senderEmail"></p>
            <p class="mb-0" id="senderWebsite"></p>
        </div>
        <div>
            <h5 class="mb-6">
                Invoice #<span id="displayInvoiceId"></span>
            </h5>
            <div class="mb-1 text-heading">
                <span>Date Issued:</span>
                <span class="fw-medium" id="displayDateIssued"></span>
            </div>
            <div class="text-heading">
                <span>Date Due:</span>
                <span class="fw-medium" id="displayDateDue"></span>
            </div>
        </div>
      </div>

      <hr class="mb-6" />

      <div class="row d-flex justify-content-between mb-6">
        <div class="col-sm-6 w-50">
          <h6>Invoice To:</h6>
            <p class="mb-1" id="invoiceToCompany"></p>
            <p class="mb-1" id="invoiceToAddress"></p>
            <p class="mb-1" id="invoiceToContact"></p>
            <p class="mb-0" id="invoiceToEmail"></p>
        </div>
        <div class="col-sm-6 w-50">
          <h6>Payment Information</h6>
            <!-- Bank details -->
            <div id="bankAccountSection" style="display: none">
                <table>
                    <tbody>
                    <tr>
                        <td class="pe-4">Account Number:</td>
                        <td id="displayBankAccountNumber"></td>
                    </tr>
                    <tr>
                        <td class="pe-4">Bank name:</td>
                        <td id="displayBankName"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Momo details -->
            <div id="mobileMoneySection" style="display: none" >
                <hr class="my-4" />
                <table>
                    <tbody>
                    <tr>
                        <td class="pe-4">Number:</td>
                        <td id="displayMomoNumber"></td>
                    </tr>
                    <tr>
                        <td class="pe-4">Account Name:</td>
                        <td id="displayMomoAccountName"></td>
                    </tr>
                    <tr>
                        <td class="pe-4">Network</td>
                        <td id="displayMomoNetwork"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Crypto details -->
            <div id="cryptoSection" style="display: none">
                <hr class="my-4" />
                <table>
                    <tbody>
                    <tr>
                        <td class="pe-4">Crypto Token:</td>
                        <td id="displayCryptoToken"></td>
                    </tr>
                    <tr>
                        <td class="pe-4">Address:</td>
                        <td id="displayCryptoAddress"></td>
                    </tr>
                    <tr>
                        <td class="pe-4">Network</td>
                        <td id="displayCryptoNetwork"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Cash Delivery Table -->
            <div id="cashDeliverySection" style="display: none">
                <hr class="my-4" />
                <p id="displayCashInstructions"></p>
            </div>
        </div>
      </div>

      <div class="table-responsive border rounded border-bottom-0 border-top-0 border-light-subtle rounded">
          <table class="table m-0">
              <thead>
              <tr>
                  <th>Item</th>
                  <th>Description</th>
                  <th>Cost</th>
                  <th>Qty</th>
                  <th>Price</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td class="text-nowrap text-heading"></td>
                  <td class="text-nowrap"></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              </tbody>
          </table>
      </div>
      <div class="table-responsive">
            <table class="table m-0 table-borderless">
                <tbody>
                <tr>
                    <td class="align-top pe-6 ps-0 py-6 text-body">
                        <div id="paymentTermsSection"
                             class="col-md-9 mb-md-0 mb-4">
                            <div id="paymentTerms">
                                <i class="icon-base bx bx-wallet icon-xs me-1"></i>Payment Terms

                                <p class="mt-2" id="invoiceMsg"></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-0 py-6 w-px-100">
                        <p class="mb-2">Subtotal:</p>
                        <p class="mb-2">Discount:</p>
                        <p class="mb-2 border-bottom pb-2">Tax:</p>
                        <p class="mb-0">Total:</p>
                    </td>
                    <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                        <p class="fw-medium mb-2" id="totalSub">$1800</p>
                        <p class="fw-medium mb-2" id="totalDiscount">$28</p>
                        <p class="fw-medium mb-2 border-bottom pb-2" id="totalTax">21%</p>
                        <p class="fw-medium mb-0" id="totalAll">$1690</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

      <hr class="mt-0 mb-6" />
      <div class="row">
          <div class="col-12">
              <p class="text-heading">
                  <span class="fw-medium">Note:</span>
                  <span id="note"></span>
              </p>
          </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js  -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>

    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/@algolia/autocomplete-js.js"></script>

    <script src="../assets/vendor/libs/pickr/pickr.js"></script>

    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/libs/hammer/hammer.js"></script>

    <script src="../assets/vendor/libs/i18n/i18n.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/app-invoice-print.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ------------------------------
            // Helper: Safely set text from localStorage
            // ------------------------------
            const setText = (id, key) => {
                const el = document.getElementById(id);
                if (el) el.textContent = localStorage.getItem(key) || '';
            };

            // ------------------------------
            // Helper: Format date from Y-m-d to "Month DD, YYYY"
            // ------------------------------
            const formatDate = (dateStr) => {
                if (!dateStr) return '';
                const date = new Date(dateStr);
                if (isNaN(date.getTime())) return ''; // Invalid date
                return date.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });
            };

            // ------------------------------
            // Helper: Set formatted date
            // ------------------------------
            const setFormattedDate = (id, key) => {
                const storedDate = localStorage.getItem(key);
                const el = document.getElementById(id);
                if (el) {
                    if (storedDate) {
                        el.textContent = formatDate(storedDate);
                    } else {
                        // Default to current date if not stored
                        const now = new Date('2025-10-07'); // Use provided current date
                        el.textContent = now.toLocaleDateString('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric'
                        });
                    }
                }
            };

            // ------------------------------
            // Sender / Company Info
            // ------------------------------
            setText('senderName', 'senderName');
            setText('senderLocation', 'senderLocation');
            setText('senderContact', 'senderContact');
            setText('senderEmail', 'senderEmail');
            setText('senderWebsite', 'senderWebsite');

            // ------------------------------
            // Invoice Info
            // ------------------------------
            setText('displayInvoiceId', 'invoiceId');
            setFormattedDate('displayDateIssued', 'dateIssued');
            setFormattedDate('displayDateDue', 'dateDue');

            // ------------------------------
            // Recipient Info
            // ------------------------------
            setText('invoiceToCompany', 'companyName');
            setText('invoiceToAddress', 'companyAddress');
            setText('invoiceToContact', 'companyContact');
            setText('invoiceToEmail', 'companyEmail');

            // ------------------------------
            // Notes / Payment Terms
            // ------------------------------
            setText('note', 'note');
            setText('invoiceMsg', 'invoiceMsg');

            // ------------------------------
            // Company Logo
            // ------------------------------
            const logoContainer = document.getElementById('logo');
            const logoImg = document.getElementById('companyLogo');
            const storedLogo = localStorage.getItem('companyLogo');

            if (storedLogo && storedLogo.trim() !== '') {
                // Use stored logo
                logoImg.src = storedLogo;
            } else if (logoContainer) {
                // No logo in storage → remove the entire span container
                logoContainer.remove();
            }

            // ------------------------------
            // Load and render invoice items
            // ------------------------------
            const invoiceItemsData = localStorage.getItem('invoiceItems');
            if (invoiceItemsData) {
                try {
                    const invoiceItems = JSON.parse(invoiceItemsData);
                    const tbody = document.querySelector('.table tbody');
                    let totalSub = 0;
                    let totalDiscount = 0;

                    if (tbody) {
                        tbody.innerHTML = ''; // clear template rows
                        invoiceItems.forEach((item) => {
                            const cost = parseFloat(item.cost || 0);
                            const qty = parseFloat(item.qty || 0);
                            const price = cost * qty;
                            const row = `
                        <tr>
                            <td class="text-nowrap text-heading">${item.detail || ''}</td>
                            <td class="text-nowrap">${item.extra || ''}</td>
                            <td>$${cost.toFixed(2)}</td>
                            <td>${qty}</td>
                            <td>$${price.toFixed(2)}</td>
                        </tr>
                    `;
                            tbody.insertAdjacentHTML('beforeend', row);
                            totalSub += price;
                            totalDiscount += parseFloat(item.discount || 0);
                        });

                        // Calculate totals after processing all items
                        const netAmount = totalSub - totalDiscount;
                        const totalTax = (netAmount * 21) / 100;
                        const totalAll = netAmount + totalTax;

                        // Update total display elements
                        const totalSubEl = document.getElementById('totalSub');
                        if (totalSubEl) totalSubEl.textContent = `$${totalSub.toFixed(2)}`;

                        const totalDiscountEl = document.getElementById('totalDiscount');
                        if (totalDiscountEl) totalDiscountEl.textContent = `$${totalDiscount.toFixed(2)}`;

                        const totalTaxEl = document.getElementById('totalTax');
                        if (totalTaxEl) totalTaxEl.textContent = `$${totalTax.toFixed(2)}`;

                        const totalAllEl = document.getElementById('totalAll');
                        if (totalAllEl) totalAllEl.textContent = `$${totalAll.toFixed(2)}`;
                    }
                } catch (error) {
                    console.error('Error parsing invoice items:', error);
                }
            }

            // ------------------------------
            // Payment Method Sections
            // ------------------------------
            const acceptPaymentsVia = localStorage.getItem('acceptPaymentsVia');
            if (acceptPaymentsVia) {
                try {
                    const paymentMethods = JSON.parse(acceptPaymentsVia);

                    // Hide all sections first
                    ['bankAccountSection', 'mobileMoneySection', 'cryptoSection', 'cashDeliverySection']
                        .forEach(id => {
                            const el = document.getElementById(id);
                            if (el) el.style.display = 'none';
                        });

                    // Show sections based on saved methods
                    paymentMethods.forEach(method => {
                        switch (method) {
                            case 'Bank Account':
                                document.getElementById('bankAccountSection').style.display = 'block';
                                setText('displayBankAccountNumber', 'bankAccountNumber');
                                setText('displayBankName', 'bankName');
                                break;

                            case 'Mobile Money':
                                document.getElementById('mobileMoneySection').style.display = 'block';
                                setText('displayMomoNumber', 'momoNumber');
                                setText('displayMomoAccountName', 'momoAccountName');
                                setText('displayMomoNetwork', 'momoNetwork');
                                break;

                            case 'Crypto':
                                document.getElementById('cryptoSection').style.display = 'block';
                                setText('displayCryptoToken', 'cryptoToken');
                                setText('displayCryptoAddress', 'cryptoAddress');
                                setText('displayCryptoNetwork', 'cryptoNetwork');
                                break;

                            case 'Cash Delivery':
                                document.getElementById('cashDeliverySection').style.display = 'block';
                                setText('displayCashInstructions', 'cashInstructions');
                                break;
                        }
                    });
                } catch (error) {
                    console.error('Error parsing payment methods:', error);
                }
            }
        });
    </script>


  </body>
</html>
