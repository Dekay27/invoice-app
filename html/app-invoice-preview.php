<!doctype html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
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

    <title>Demo: Preview - Invoice | Sneat - Bootstrap Dashboard PRO</title>

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

    <link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="../assets/vendor/css/pages/app-invoice.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contains global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../assets/js/config.js"></script>

      <!-- Script to select active page -->
      <script src="../js/invoice/menu-active.js"></script>

      <!-- PDF export scripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

          <?php include 'aside.html'; ?>

        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
            <i class="bx bx-menu icon-base"></i>
            <i class="bx bx-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            <?php include 'nav.html'; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                  <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                      <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                        <div class="mb-xl-0 mb-6 text-heading">
                          <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                            <span class="app-brand-logo demo">
                                <span class="text-primary">
                                  <img id="companyLogo" src="../assets/img/branding/hanover.svg" alt="logo" width="50">
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
                    </div>
                    <div class="card-body px-0">
                      <div class="row">
                          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                              <h6>Invoice To:</h6>
<!--                              <p class="mb-1" id="invoiceToName"></p>-->
                              <p class="mb-1" id="invoiceToCompany"></p>
                              <p class="mb-1" id="invoiceToAddress"></p>
                              <p class="mb-1" id="invoiceToContact"></p>
                              <p class="mb-0" id="invoiceToEmail"></p>
                          </div>

                          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
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
                    </div>
                    <div class="table-responsive border border-bottom-0 border-top-0 rounded">
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
                              <p class="fw-medium mb-2">$1800</p>
                              <p class="fw-medium mb-2">$28</p>
                              <p class="fw-medium mb-2 border-bottom pb-2">21%</p>
                              <p class="fw-medium mb-0">$1690</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <hr class="mt-0 mb-6" />
                    <div class="card-body p-0">
                        <div id="notePreviewSection">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-heading">
                                        <span class="fw-medium">Note:</span>
                                        <span id="note"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                  <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-4" id="exportPdf">
                            <span class="d-flex align-items-center justify-content-center text-nowrap">
                                <i class="icon-base bx bx-bxs-down-arrow-circle icon-sm me-2"></i>Download Invoice
                            </span>
                        </button>
<!--                      <button-->
<!--                        class="btn btn-label-secondary d-grid w-100 mb-4"-->
<!--                        data-bs-toggle="offcanvas"-->
<!--                        data-bs-target="#sendInvoiceOffcanvas">-->
<!--                        <span class="d-flex align-items-center justify-content-center text-nowrap"-->
<!--                          ><i class="icon-base bx bx-paper-plane icon-sm me-2"></i>Send Invoice</span-->
<!--                        >-->
<!--                      </button>-->
                        <button
                                class="btn btn-primary d-grid w-100 mb-4"
                                id="sendViaWhatsApp">
                            <span class="d-flex align-items-center justify-content-center text-nowrap">
                                <i class="icon-base bx bx-paper-plane icon-sm me-2"></i>Send via WhatsApp
                            </span>
                        </button>

                      <div class="d-flex mb-4">
                        <a
                          class="btn btn-label-secondary d-grid w-100 me-4"
                          target="_blank"
                          href="./app-invoice-print.php">
                          Print
                        </a>
                        <a href="./app-invoice-add.php" class="btn btn-label-secondary d-grid w-100"> Edit </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Invoice Actions -->
              </div>

              <!-- Offcanvas -->
              <!-- Send Invoice Sidebar -->
              <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                <div class="offcanvas-header mb-6 border-bottom">
                  <h5 class="offcanvas-title">Send Invoice</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0 flex-grow-1">
                  <form>
                    <div class="mb-6">
                      <label for="invoice-from" class="form-label">From</label>
                      <input
                        type="text"
                        class="form-control"
                        id="invoice-from"
                        value="shelbyComapny@email.com"
                        placeholder="company@email.com" />
                    </div>
                    <div class="mb-6">
                      <label for="invoice-to" class="form-label">To</label>
                      <input
                        type="text"
                        class="form-control"
                        id="invoice-to"
                        value="qConsolidated@email.com"
                        placeholder="company@email.com" />
                    </div>
                    <div class="mb-6">
                      <label for="invoice-subject" class="form-label">Subject</label>
                      <input
                        type="text"
                        class="form-control"
                        id="invoice-subject"
                        value="Invoice of purchased Admin Templates"
                        placeholder="Invoice regarding goods" />
                    </div>
                    <div class="mb-6">
                      <label for="invoice-message" class="form-label">Message</label>
                      <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea
                      >
                    </div>
                    <div class="mb-6">
                      <span class="badge bg-label-primary">
                        <i class="icon-base bx bx-link icon-xs"></i>
                        <span class="align-middle">Invoice Attached</span>
                      </span>
                    </div>
                    <div class="mb-6 d-flex flex-wrap">
                      <button type="button" class="btn btn-primary me-4" data-bs-dismiss="offcanvas">Send</button>
                      <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /Send Invoice Sidebar -->

              <!-- /Offcanvas -->
            </div>
            <!-- / Content -->

              <!-- Footer -->
              <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl">
                      <div
                              class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                          <div class="mb-2 mb-md-0">

                          </div>
                          <div class="d-none d-lg-inline-block">
                              ©
                              <script>
                                  document.write(new Date().getFullYear());
                              </script>
                              , built by
                              <a href="https://bigballerde.tech" target="_blank" class="footer-link">Daniel Kumah </a> | Licensed for open use
                          </div>
                      </div>
                  </div>
              </footer>
              <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

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
    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../assets/vendor/libs/cleave-zen/cleave-zen.js"></script>

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/offcanvas-add-payment.js"></script>
    <script src="../assets/js/offcanvas-send-invoice.js"></script>

  <script>
      // Populate display on page load
      document.addEventListener('DOMContentLoaded', () => {
          document.getElementById('senderName').textContent = localStorage.getItem('senderName') || '';
          document.getElementById('senderLocation').textContent = localStorage.getItem('senderLocation') || '';
          document.getElementById('senderContact').textContent = localStorage.getItem('senderContact') || '';
          document.getElementById('senderEmail').textContent = localStorage.getItem('senderEmail') || '';
          document.getElementById('senderWebsite').textContent = localStorage.getItem('senderWebsite') || '';
          document.getElementById('companyLogo').src = localStorage.getItem('companyLogo') || '../assets/img/branding/hanover.svg';
      });
  </script>
  <script>
      function formatDateForDisplay(dateStr) {
          if (!dateStr) return ''; // no date
          const d = new Date(dateStr); // parses YYYY-MM-DD automatically
          // format as "October 6, 2025"
          return d.toLocaleDateString(undefined, {
              year: 'numeric',
              month: 'long',
              day: 'numeric'
          });
      }

      document.addEventListener('DOMContentLoaded', () => {
          // read values from localStorage
          const invoiceId   = localStorage.getItem('invoiceId') || '';
          const dateIssued  = localStorage.getItem('dateIssued') || '';
          const dateDue     = localStorage.getItem('dateDue') || '';

          // update display spans
          document.getElementById('displayInvoiceId').textContent  = invoiceId || '-';
          document.getElementById('displayDateIssued').textContent = formatDateForDisplay(dateIssued) || '-';
          document.getElementById('displayDateDue').textContent    = formatDateForDisplay(dateDue) || '-';
      });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          //document.getElementById('invoiceToName').textContent    = localStorage.getItem('companyName') || '';
          document.getElementById('invoiceToCompany').textContent = localStorage.getItem('companyName') || '';
          document.getElementById('invoiceToAddress').textContent = localStorage.getItem('companyAddress') || '';
          document.getElementById('invoiceToContact').textContent = localStorage.getItem('companyContact') || '';
          document.getElementById('invoiceToEmail').textContent   = localStorage.getItem('companyEmail') || '';
      });
  </script>
    <script>
        window.addEventListener('load', () => {
            // 1️⃣ Map option labels to section IDs
            const sectionMap = {
                'Mobile Money': 'mobileMoneySection',
                'Bank Account': 'bankAccountSection',
                'Crypto': 'cryptoSection',
                'Cash Delivery': 'cashDeliverySection'
            };

            // 2️⃣ Retrieve saved payment options
            const saved = JSON.parse(localStorage.getItem('acceptPaymentsVia') || '[]');

            // 3️⃣ Track if any section was shown
            let anyVisible = false;

            // 4️⃣ Loop through sections to toggle visibility
            for (const [optionText, sectionId] of Object.entries(sectionMap)) {
                const section = document.getElementById(sectionId);
                if (!section) continue;

                if (saved.includes(optionText)) {
                    section.style.display = 'block';
                    anyVisible = true;
                } else {
                    section.style.display = 'none';
                }
            }

            // 5️⃣ Handle fallback message
            let fallbackMessage = document.getElementById('noPaymentMessage');
            if (!fallbackMessage) {
                fallbackMessage = document.createElement('p');
                fallbackMessage.id = 'noPaymentMessage';
                fallbackMessage.className = 'text-muted mt-3';
                fallbackMessage.textContent = 'No payment method information available.';
                // Append it right under the payment area (you can adjust parent if needed)
                const paymentContainer = document.querySelector('.col-xl-6.col-md-12.col-sm-7.col-12');
                if (paymentContainer) paymentContainer.appendChild(fallbackMessage);
            }

            // Toggle fallback visibility
            fallbackMessage.style.display = anyVisible ? 'none' : 'block';

            // 6️⃣ Populate payment details (only values, display handled above)
            const get = key => localStorage.getItem(key) || '';

            document.getElementById('displayBankAccountNumber').textContent = get('bankAccountNumber');
            document.getElementById('displayBankName').textContent = get('bankName');
            document.getElementById('displayMomoAccountName').textContent = get('momoAccountName');
            document.getElementById('displayMomoNumber').textContent = get('momoNumber');
            document.getElementById('displayMomoNetwork').textContent = get('momoNetwork');
            document.getElementById('displayCryptoAddress').textContent = get('cryptoAddress');
            document.getElementById('displayCryptoToken').textContent = get('cryptoToken');
            document.getElementById('displayCryptoNetwork').textContent = get('cryptoNetwork');
            document.getElementById('displayCashInstructions').textContent = get('cashInstructions');
        });
    </script>
  <script>
      document.getElementById('invoiceMsg').textContent = localStorage.getItem('invoiceMsg') || '';
      document.getElementById('note').textContent = localStorage.getItem('note') || '';
  </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tbody = document.querySelector('table.m-0 tbody');
            const totalsContainer = document.querySelector('.text-end.px-0.py-6.w-px-100.fw-medium.text-heading');

            // Helpers from invoice-totals.js (inline or load the file)
            function parseCurrency(str) { return parseFloat((str || "0").replace(/[^0-9.\-]+/g, "")) || 0; }
            const currencySymbols = { 'USD': '$', 'GHS': 'GH¢', 'EUR': '€', 'GBP': '£' };
            function formatCurrency(currencyCode, num) {
                const symbol = currencySymbols[currencyCode] || 'GH¢';
                return symbol + num.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
            function getCurrentCurrency() {
                return localStorage.getItem('paymentCurrency') || 'GHS';
            }
            function getCombinedTaxRate() {
                const taxes = JSON.parse(localStorage.getItem('selectedTaxes') || '[]');
                return taxes.reduce((sum, t) => sum + (parseFloat(t.taxRate) || 0), 0);
            }

            const currencyCode = getCurrentCurrency();
            const savedItems = JSON.parse(localStorage.getItem('invoiceItems') || '[]');
            tbody.innerHTML = '';

            if (savedItems.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-4">No items added yet</td></tr>';
                // Hide totals if no items
                if (totalsContainer) totalsContainer.innerHTML = '';
                return;
            }

            let subtotal = 0, totalDiscount = 0;
            savedItems.forEach(item => {
                const cost = parseCurrency(item.cost);
                const qty = parseFloat(item.qty) || 1;
                const disc = parseCurrency(item.discount);
                const lineTotal = (cost * qty) - disc; // Per-row discount
                subtotal += (cost * qty);
                totalDiscount += disc;

                const tr = document.createElement('tr');
                tr.innerHTML = `
            <td class="text-nowrap text-heading">${item.detail || '-'}</td>
            <td class="text-nowrap">${item.extra || ''}</td>
            <td>${formatCurrency(currencyCode, cost)}</td>
            <td>${qty}</td>
            <td>${formatCurrency(currencyCode, lineTotal)}</td>
        `;
                tbody.appendChild(tr);
            });

            const taxPercent = getCombinedTaxRate();
            const taxAmount = (subtotal - totalDiscount) * (taxPercent / 100);
            const grandTotal = subtotal - totalDiscount + taxAmount;

            if (totalsContainer) {
                totalsContainer.innerHTML = `
            <p class="fw-medium mb-2">${formatCurrency(currencyCode, subtotal)}</p>
            <p class="fw-medium mb-2">${formatCurrency(currencyCode, totalDiscount)}</p>
            <p class="fw-medium mb-2 border-bottom pb-2">${taxPercent.toFixed(2)}%</p>
            <p class="fw-medium mb-0">${formatCurrency(currencyCode, grandTotal)}</p>
        `;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Helper to get toggle state (string 'true'/'false' to boolean, default true)
            function getToggleState(key) {
                const saved = localStorage.getItem(key);
                return saved === null ? true : saved === 'true';
            }

            // Payment Terms toggle
            const showPaymentTerms = getToggleState('paymentTermsToggle');
            const paymentTermsEl = document.getElementById('paymentTerms');
            if (paymentTermsEl) {
                paymentTermsEl.style.display = showPaymentTerms ? 'block' : 'none';
            }

            // Client Notes toggle (targets the note row/parent)
            const showNotes = getToggleState('clientNotesToggle');
            const noteRow = document.getElementById('notePreviewSection');
            if (noteRow) {
                noteRow.style.display = showNotes ? 'block' : 'none';
            }

            // Optional: If no terms/notes shown, add a subtle placeholder
            const termsSection = document.getElementById('paymentTermsSection');
            if (termsSection && !showPaymentTerms && !showNotes) {
                termsSection.innerHTML = '<p class="text-muted small">No additional terms or notes.</p>';
            }
        });
    </script>
  <script>
      // Simple export button
      // Simple export button (now with error handling)
      $('#exportPdf').on('click', function() {
          if (typeof html2canvas === 'undefined' || typeof window.jspdf === 'undefined') {
              alert('PDF libraries not loaded—check console.');
              return;
          }
          const element = $('.invoice-preview-card')[0];
          html2canvas(element, { scale: 2, useCORS: true }).then(canvas => {
              const pdf = new window.jspdf.jsPDF('p', 'mm', 'a4');
              const imgData = canvas.toDataURL('image/png');
              const imgWidth = 210;
              const pageHeight = 297;
              const imgHeight = (canvas.height * imgWidth) / canvas.width;
              let heightLeft = imgHeight;
              let position = 0;

              pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
              heightLeft -= pageHeight;

              while (heightLeft >= 0) {
                  position = heightLeft - imgHeight;
                  pdf.addPage();
                  pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                  heightLeft -= pageHeight;
              }

              pdf.save(`invoice-${localStorage.getItem('invoiceId') || 'demo'}.pdf`);
          }).catch(err => console.error('PDF Export Error:', err));
      });
  </script>
  <script>
      // Direct WhatsApp Share
      document.addEventListener('DOMContentLoaded', () => {
          const sendBtn = document.getElementById('sendViaWhatsApp');
          if (!sendBtn) return;

          sendBtn.addEventListener('click', async () => {
              // 1. Default message (pull from localStorage or hardcoded)
              const defaultMsg = localStorage.getItem('invoiceMsg') || 'Please find the attached invoice. Review and let me know if you have questions.';
              const subject = localStorage.getItem('invoiceId') || 'Invoice';
              const message = `${defaultMsg}\n\nInvoice: ${subject}`;

              // 2. Generate PDF blob
              let pdfBlob;
              try {
                  pdfBlob = await generateInvoicePdf();
              } catch (err) {
                  console.error('PDF Gen Error:', err);
                  alert('Failed to generate PDF—check console.');
                  return;
              }

              const pdfName = `invoice-${localStorage.getItem('invoiceId') || 'demo'}.pdf`;
              const file = new File([pdfBlob], pdfName, { type: 'application/pdf' });
              const pdfUrl = URL.createObjectURL(pdfBlob);

              // 3. Share PDF (user picks WhatsApp + recipient)
              const shareData = {
                  title: `Invoice ${subject}`,
                  text: message,
                  files: [file]
              };

              if (navigator.canShare && navigator.canShare(shareData)) {
                  try {
                      await navigator.share(shareData);
                  } catch (err) {
                      if (err.name !== 'AbortError') {
                          console.warn('Share failed:', err);
                          fallbackShare(pdfUrl, message);
                      }
                  }
              } else {
                  fallbackShare(pdfUrl, message);
              }

              // Cleanup
              URL.revokeObjectURL(pdfUrl);
          });
      });

      // PDF Generator (unchanged—html2canvas for screenshot-style)
      async function generateInvoicePdf() {
          if (typeof html2canvas === 'undefined' || typeof window.jspdf === 'undefined') {
              throw new Error('PDF libs not loaded.');
          }

          // Temp hide icons for clean PDF
          const icons = $('.icon-base');
          icons.addClass('d-print-none');

          const element = $('.invoice-preview-card')[0]; // Use preview card; swap to add page's if needed
          const canvas = await html2canvas(element, { scale: 2, useCORS: true });
          const imgData = canvas.toDataURL('image/png');
          const pdf = new window.jspdf.jsPDF('p', 'mm', 'a4');
          const imgWidth = 210;
          const imgHeight = (canvas.height * imgWidth) / canvas.width;
          let heightLeft = imgHeight;
          let position = 0;

          pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
          heightLeft -= 297;

          while (heightLeft >= 0) {
              position = heightLeft - imgHeight;
              pdf.addPage();
              pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
              heightLeft -= 297;
          }

          icons.removeClass('d-print-none');

          return pdf.output('blob');
      }

      // Fallback: Download PDF + Open WhatsApp Web
      function fallbackShare(pdfUrl, message) {
          // Auto-download PDF
          const a = document.createElement('a');
          a.href = pdfUrl;
          a.download = pdfUrl.split('/').pop();
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);

          // Open WhatsApp Web with pre-filled message (user attaches the downloaded PDF)
          const waMessage = encodeURIComponent(message);
          window.open(`https://web.whatsapp.com/send?text=${waMessage}`, '_blank');
      }
  </script>







  </body>
</html>
