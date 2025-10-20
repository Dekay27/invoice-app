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

    <title>Demo: Edit - Invoice | Sneat - Bootstrap Dashboard PRO</title>

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

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../assets/js/config.js"></script>

      <!-- Script to select active page -->
      <script src="../js/invoice/menu-active.js"></script>
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
              <div class="row invoice-edit">
                <!-- Invoice Edit-->
                <div class="col-lg-9 col-12 mb-lg-0 mb-6">
                  <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                      <div class="row text-heading px-3">
                        <div class="col-md-7 mb-md-0 mb-6 ps-0">
                          <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                            <span class="app-brand-logo demo">
                              <span class="text-primary">
                                <img src="../assets/img/branding/logo.svg" alt="logo">
                              </span>
                            </span>
                            <span class="app-brand-text demo fw-bold ms-50">Sneat</span>
                          </div>
                          <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                          <p class="mb-2">San Diego County, CA 91905, USA</p>
                          <p class="mb-3">+1 (123) 456 7891, +44 (876) 543 2198</p>
                        </div>
                        <div class="col-md-5 col-8 pe-0 ps-0 ps-md-2">
                          <dl class="row mb-0 gx-4">
                            <dt class="col-sm-5 mb-2 d-md-flex align-items-center justify-content-end">
                              <span class="h5 text-capitalize mb-0 text-nowrap">Invoice</span>
                            </dt>
                            <dd class="col-sm-7">
                              <input
                                type="text"
                                class="form-control"
                                disabled
                                placeholder="#74909"
                                value="#74909"
                                id="invoiceId" />
                            </dd>
                            <dt class="col-sm-5 mb-1 d-md-flex align-items-center justify-content-end">
                              <span class="fw-normal">Date Issued:</span>
                            </dt>
                            <dd class="col-sm-7">
                              <input type="text" class="form-control invoice-date" placeholder="MM/DD/YYYY" />
                            </dd>
                            <dt class="col-sm-5 d-md-flex align-items-center justify-content-end">
                              <span class="fw-normal">Due Date:</span>
                            </dt>
                            <dd class="col-sm-7 mb-0">
                              <input type="text" class="form-control due-date" placeholder="MM/DD/YYYY" />
                            </dd>
                          </dl>
                        </div>
                      </div>
                    </div>

                    <div class="card-body px-0">
                      <div class="row">
                        <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-6">
                          <h6>Invoice To:</h6>
                          <select class="form-select mb-4 w-50">
                            <option value="Jordan Stevenson">Jordan Stevenson</option>
                            <option value="Wesley Burland">Wesley Burland</option>
                            <option value="Vladamir Koschek">Vladamir Koschek</option>
                            <option value="Tyne Widmore">Tyne Widmore</option>
                          </select>
                          <p class="mb-1">Shelby Company Limited</p>
                          <p class="mb-1">Small Heath, B10 0HF, UK</p>
                          <p class="mb-1">718-986-6062</p>
                          <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div>
                        <div class="col-md-6 col-sm-7">
                          <h6>Bill To:</h6>
                          <table>
                            <tbody>
                              <tr>
                                <td class="pe-4">Total Due:</td>
                                <td>$12,110.55</td>
                              </tr>
                              <tr>
                                <td class="pe-4">Bank name:</td>
                                <td>American Bank</td>
                              </tr>
                              <tr>
                                <td class="pe-4">Country:</td>
                                <td>United States</td>
                              </tr>
                              <tr>
                                <td class="pe-4">IBAN:</td>
                                <td>ETD95476213874685</td>
                              </tr>
                              <tr>
                                <td class="pe-4">SWIFT code:</td>
                                <td>BR91905</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <hr class="mb-6 mt-0" />
                    <div class="card-body pt-0 px-0">
                      <form class="source-item">
                        <div class="mb-4" data-repeater-list="group-a">
                          <div class="repeater-wrapper pt-0 pt-md-9" data-repeater-item>
                            <div class="d-flex border rounded position-relative pe-0">
                              <div class="row w-100 p-6 g-6">
                                <div class="col-md-6 col-12 mb-md-0 mb-3">
                                  <p class="h6 repeater-title">Item</p>
                                  <select class="form-select item-details mb-6">
                                    <option value="App Design">App Design</option>
                                    <option value="App Customization" selected>App Customization</option>
                                    <option value="ABC Template">ABC Template</option>
                                    <option value="App Development">App Development</option>
                                  </select>
                                  <textarea
                                    class="form-control"
                                    rows="2"
                                    placeholder="Customization & Bug Fixes"></textarea>
                                </div>
                                <div class="col-md-3 col-12 mb-md-0 mb-4">
                                  <p class="h6 repeater-title">Cost</p>
                                  <input
                                    type="text"
                                    class="form-control invoice-item-price mb-5"
                                    value="24"
                                    placeholder="24"
                                    min="12" />
                                  <div class="text-heading">
                                    <div class="mb-1">Discount:</div>
                                    <span class="discount me-2">0%</span>
                                    <span
                                      class="tax-1 me-2"
                                      data-bs-toggle="tooltip"
                                      data-bs-placement="top"
                                      title="Tax 1"
                                      >0%</span
                                    >
                                    <span class="tax-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 2"
                                      >0%</span
                                    >
                                  </div>
                                </div>
                                <div class="col-md-2 col-12 mb-md-0 mb-4">
                                  <p class="h6 repeater-title">Qty</p>
                                  <input
                                    type="text"
                                    class="form-control invoice-item-qty"
                                    value="1"
                                    placeholder="1"
                                    min="1"
                                    max="50" />
                                </div>
                                <div class="col-md-1 col-12 pe-0 mt-8">
                                  <p class="h6 repeater-title">Price</p>
                                  <p class="mb-0 text-heading">$24.00</p>
                                </div>
                              </div>
                              <div
                                class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                <i class="icon-base bx bx-x icon-lg cursor-pointer" data-repeater-delete></i>
                                <div class="dropdown">
                                  <i
                                    class="icon-base bx bx-cog icon-lg cursor-pointer more-options-dropdown"
                                    role="button"
                                    id="dropdownMenuButton"
                                    data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside"
                                    aria-expanded="false">
                                  </i>
                                  <div
                                    class="dropdown-menu dropdown-menu-end w-px-300 p-4"
                                    aria-labelledby="dropdownMenuButton">
                                    <div class="row g-3">
                                      <div class="col-12">
                                        <label for="discountInput" class="form-label">Discount(%)</label>
                                        <input
                                          type="number"
                                          class="form-control"
                                          id="discountInput"
                                          min="0"
                                          max="100" />
                                      </div>
                                      <div class="col-md-6">
                                        <label for="taxInput1" class="form-label">Tax 1</label>
                                        <select name="tax-1-input" id="taxInput1" class="form-select tax-select">
                                          <option value="0%" selected>0%</option>
                                          <option value="1%">1%</option>
                                          <option value="10%">10%</option>
                                          <option value="18%">18%</option>
                                          <option value="40%">40%</option>
                                        </select>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="taxInput2" class="form-label">Tax 2</label>
                                        <select name="tax-2-input" id="taxInput2" class="form-select tax-select">
                                          <option value="0%" selected>0%</option>
                                          <option value="1%">1%</option>
                                          <option value="10%">10%</option>
                                          <option value="18%">18%</option>
                                          <option value="40%">40%</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="dropdown-divider my-4"></div>
                                    <button type="button" class="btn btn-label-primary btn-apply-changes">Apply</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <button type="button" class="btn btn-sm btn-primary" data-repeater-create>
                              <i class="icon-base bx bx-plus icon-xs me-1_5"></i>Add Item
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-0">
                      <div class="row row-gap-4">
                        <div class="col-md-6 mb-md-0 mb-3">
                          <div class="d-flex align-items-center mb-4">
                            <label for="salesperson" class="me-2 fw-medium text-heading">Salesperson:</label>
                            <input
                              type="text"
                              class="form-control"
                              id="salesperson"
                              placeholder="Edward Crowley"
                              value="Edward Crowley" />
                          </div>
                          <input
                            type="text"
                            class="form-control"
                            id="invoiceMsg"
                            placeholder="Thanks for your business"
                            value="Thanks for your business" />
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                          <div class="invoice-calculations">
                            <div class="d-flex justify-content-between mb-2">
                              <span class="w-px-100">Subtotal:</span>
                              <span class="fw-medium text-heading">$1800</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <span class="w-px-100">Discount:</span>
                              <span class="fw-medium text-heading">$28</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                              <span class="w-px-100">Tax:</span>
                              <span class="fw-medium text-heading">21%</span>
                            </div>
                            <hr class="my-2" />
                            <div class="d-flex justify-content-between">
                              <span class="w-px-100">Total:</span>
                              <span class="fw-medium text-heading">$1690</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body px-0 pb-0">
                      <div class="row">
                        <div class="col-12">
                          <div>
                            <label for="note" class="fw-medium text-heading mb-1">Note:</label>
                            <textarea class="form-control" rows="2" id="note">
It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Invoice Edit-->

                <!-- Invoice Actions -->
                <div class="col-lg-3 col-12 invoice-actions">
                  <div class="card mb-6">
                    <div class="card-body">
                      <button
                        class="btn btn-primary d-grid w-100"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"
                          ><i class="icon-base bx bx-paper-plane icon-sm me-2"></i>Send Invoice</span
                        >
                      </button>
                      <div class="d-flex my-4">
                        <a href="./app-invoice-preview.php" class="btn btn-label-secondary w-100 me-4">Preview</a>
                        <button type="button" class="btn btn-label-secondary w-100">Save</button>
                      </div>
                      <button
                        class="btn btn-success d-grid w-100"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"
                          ><i class="icon-base bx bx-dollar icon-sm me-1"></i>Add Payment</span
                        >
                      </button>
                    </div>
                  </div>
                  <div>
                    <label for="acceptPaymentsVia" class="form-label">Accept payments via</label>
                    <select class="form-select mb-6" id="acceptPaymentsVia">
                      <option value="Bank Account">Bank Account</option>
                      <option value="Paypal">Paypal</option>
                      <option value="Card">Credit/Debit Card</option>
                      <option value="UPI Transfer">UPI Transfer</option>
                    </select>
                    <div class="d-flex justify-content-between mb-2">
                      <label for="payment-terms">Payment Terms</label>
                      <div class="form-check form-switch me-n2">
                        <input type="checkbox" class="form-check-input" id="payment-terms" checked />
                      </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <label for="client-notes">Client Notes</label>
                      <div class="form-check form-switch me-n2">
                        <input type="checkbox" class="form-check-input" id="client-notes" checked />
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <label for="payment-stub">Payment Stub</label>
                      <div class="form-check form-switch me-n2">
                        <input type="checkbox" class="form-check-input" id="payment-stub" checked />
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

              <!-- Add Payment Sidebar -->
              <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title">Add Payment</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                  <div class="d-flex justify-content-between bg-lighter p-2 mb-4">
                    <p class="mb-0">Invoice Balance:</p>
                    <p class="fw-medium mb-0">$5000.00</p>
                  </div>
                  <form>
                    <div class="mb-6">
                      <label class="form-label" for="invoiceAmount">Payment Amount</label>
                      <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input
                          type="text"
                          id="invoiceAmount"
                          name="invoiceAmount"
                          class="form-control invoice-amount"
                          placeholder="100" />
                      </div>
                    </div>
                    <div class="mb-6">
                      <label class="form-label" for="payment-date">Payment Date</label>
                      <input id="payment-date" class="form-control invoice-date" type="text" />
                    </div>
                    <div class="mb-6">
                      <label class="form-label" for="payment-method">Payment Method</label>
                      <select class="form-select" id="payment-method">
                        <option value="" selected disabled>Select payment method</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Paypal">Paypal</option>
                      </select>
                    </div>
                    <div class="mb-6">
                      <label class="form-label" for="payment-note">Internal Payment Note</label>
                      <textarea class="form-control" id="payment-note" rows="2"></textarea>
                    </div>
                    <div class="mb-6 d-flex flex-wrap">
                      <button type="button" class="btn btn-primary me-4" data-bs-dismiss="offcanvas">Send</button>
                      <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /Add Payment Sidebar -->

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
    <script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../assets/vendor/libs/cleave-zen/cleave-zen.js"></script>
    <script src="../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/offcanvas-add-payment.js"></script>
    <script src="../assets/js/offcanvas-send-invoice.js"></script>
    <script src="../assets/js/app-invoice-edit.js"></script>
  </body>
</html>
