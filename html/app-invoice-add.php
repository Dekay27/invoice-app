
<!DOCTYPE HTML>

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

    <title>Demo: Add - Invoice | Sneat - Bootstrap Dashboard PRO</title>

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
      <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
      <link rel="stylesheet" href="../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
      <link rel="stylesheet" href="../assets/vendor/libs/pickr/pickr-themes.css" />
      <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />

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

        <?php include_once('aside.html') ?>

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

            <?php include_once('nav.html') ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row invoice-add">
                <!-- Invoice Add-->
                <div class="col-lg-9 col-12 mb-lg-0 mb-6">
                  <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                      <div class="d-flex flex-wrap flex-column flex-sm-row justify-content-between text-heading">
                        <div class="mb-md-0 mb-6">
                          <div class="d-flex svg-illustration mb-2 gap-2 align-items-center">
                            <span class="app-brand-logo demo">
                                <!-- Where logo shows -->
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

                            <button type="button" class="btn btn-sm btn-primary mt-4" id="senderDetailsBtn" data-bs-toggle="modal" data-bs-target="#senderModal">
                                <i class="bx bx-pencil icon-xs me-1_5"></i>Enter Company Details
                            </button>
                        </div>
                        <div class="col-md-5 col-8 pe-0 ps-0 ps-md-2">
                          <dl class="row mb-0 gx-4">
                            <dt class="col-sm-5 mb-2 d-md-flex align-items-center justify-content-end">
                              <span class="h5 text-capitalize mb-0 text-nowrap">Invoice #</span>
                            </dt>
                            <dd class="col-sm-7">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter invoice number"
                                value=""
                                id="invoiceId" />
                            </dd>
                            <dt class="col-sm-5 mb-1 d-md-flex align-items-center justify-content-end">
                              <span class="fw-normal">Date Issued:</span>
                            </dt>
                            <dd class="col-sm-7">
                              <input type="text"
                                     class="form-control date-picker"
                                     id="dateIssued"
                                     value=""
                                     placeholder="Month DD, YYYY"
                                     data-flatpickr
                                     data-alt-input="true"
                                     data-alt-format="F j, Y"
                                     data-date-format="Y-m-d"/>
                            </dd>
                            <dt class="col-sm-5 d-md-flex align-items-center justify-content-end">
                              <span class="fw-normal">Due Date:</span>
                            </dt>
                            <dd class="col-sm-7 mb-0">
                              <input type="text"
                                     class="form-control date-picker"
                                     id="dateDue"
                                     placeholder="Month DD, YYYY"
                                     data-flatpickr
                                     data-alt-input="true"
                                     data-alt-format="F j, Y"
                                     data-date-format="Y-m-d"/>
                            </dd>
                          </dl>
                        </div>
                      </div>
                    </div>

                    <div class="card-body px-0">
                      <div class="row">
                        <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-6">
                          <h6>Invoice To:</h6>
                            <button type="button" class="btn btn-sm btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#companyModal">
                                Edit Company Info
                            </button>
                            <div id="companyInfo">
                                <p class="mb-1" id="displayName"></p>
                                <p class="mb-1" id="displayAddress"></p>
                                <p class="mb-1" id="displayContact"></p>
                                <p class="mb-0" id="displayEmail"></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-7">
                              <h6>Payment Information:</h6>
                              <button type="button" class="btn btn-sm btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                  Edit Payment Info
                              </button>

                              <!-- Bank details -->
                            <div id="bankAccountSection" style="display:none;">
                                <table>
                                  <tbody>
                                  <tr>
                                      <td class="pe-4">Account Number:</td>
                                      <td id="displayBankAccountNumber">12911055</td>
                                  </tr>
                                  <tr>
                                      <td class="pe-4">Bank name:</td>
                                      <td id="displayBankName">American Bank</td>
                                  </tr>
                                  </tbody>
                                </table>
                            </div>

                              <!-- Momo details -->
                            <div id="mobileMoneySection" style="display:none;">
                                <hr class="my-4" />
                              <table>
                                  <tbody>
                                  <tr>
                                      <td class="pe-4">Number:</td>
                                      <td id="displayMomoNumber">0241304040</td>
                                  </tr>
                                  <tr>
                                      <td class="pe-4">Account Name:</td>
                                      <td id="displayMomoAccountName">Odogwu Ventures</td>
                                  </tr>
                                  <tr>
                                      <td class="pe-4">Network</td>
                                      <td id="displayMomoNetwork">MTN Mobile Money</td>
                                  </tr>
                                  </tbody>
                              </table>
                            </div>

                              <!-- Crypto details -->
                            <div id="cryptoSection" style="display:none;">
                                <hr class="my-4" />
                              <table>
                                  <tbody>
                                  <tr>
                                      <td class="pe-4">Crypto Token:</td>
                                      <td id="displayCryptoToken">USDT</td>
                                  </tr>
                                  <tr>
                                      <td class="pe-4">Address:</td>
                                      <td id="displayCryptoAddress">0x5745…</td>
                                  </tr>
                                  <tr>
                                      <td class="pe-4">Network</td>
                                      <td id="displayCryptoNetwork">Ethereum (ERC-20)</td>
                                  </tr>
                                  </tbody>
                              </table>
                            </div>

                            <!-- Cash Delivery Table -->
                            <div id="cashDeliverySection" style="display:none;">
                                <hr class="my-4" />
                                <p>Cash Delivery Instructions...</p>
                                <p id="displayCashInstructions"></p>
                            </div>



                              <!-- Alternate Momo details -->
<!--                              <table>-->
<!--                                  <tbody>-->
<!--                                  <tr>-->
<!--                                      <td class="pe-4">Number:</td>-->
<!--                                      <td id="displayAltMomoNumber">0241304040</td>-->
<!--                                  </tr>-->
<!--                                  <tr>-->
<!--                                      <td class="pe-4">Account Name:</td>-->
<!--                                      <td id="displayAltMomoAccountName">Odogwu Ventures</td>-->
<!--                                  </tr>-->
<!--                                  <tr>-->
<!--                                      <td class="pe-4">Network</td>-->
<!--                                      <td id="displayAltMomoNetwork">MTN Mobile Money</td>-->
<!--                                  </tr>-->
<!--                                  </tbody>-->
<!--                              </table>-->
                          </div>
                      </div>
                    </div>
                    <hr class="mt-0 mb-6" />
                      <!-- Invoice Item  -->
                    <div class="card-body pt-0 px-0">
                      <form class="source-item">
                        <div class="mb-4" data-repeater-list="group-a">
                          <div class="repeater-wrapper pt-0 pt-md-9" data-repeater-item>
                            <div class="d-flex border rounded position-relative pe-0">
                              <div class="row w-100 p-6 g-6">
                                <div class="col-md-6 col-12 mb-md-0 mb-4">
                                  <p class="h6 repeater-title">Item</p>
                                    <input
                                            type="text"
                                            class="form-control item-details mb-6"
                                            placeholder="(Enter item details)"
                                    />
                                  <textarea
                                    class="form-control"
                                    rows="2"
                                    placeholder="(Any extra details)"></textarea>
                                </div>
                                <div class="col-md-2 col-12 mb-md-0 mb-4">
                                  <p class="h6 repeater-title">Cost</p>
                                  <input
                                    type="text"
                                    class="form-control invoice-item-price mb-5"
                                    placeholder="25"
                                    min="12" />
                                  <div class="text-heading">
                                    <div class="mb-1">Discount:</div>
                                      <input
                                              type="text"
                                              class="form-control discount"
                                              placeholder="$0.00"/>
                                  </div>
                                </div>
                                <div class="col-md-2 col-12 mb-md-0 mb-4">
                                  <p class="h6 repeater-title">Qty</p>
                                  <input
                                    type="text"
                                    class="form-control invoice-item-qty"
                                    placeholder="1"
                                    min="1"
                                    max="50" />
                                </div>
                                <div class="col-md-2 col-12 pe-0 mt-8">
                                  <p class="h6 repeater-title">Price</p>
                                  <p class="mb-0 text-heading invoice-item-total-price"></p>

                                </div>
                              </div>
                              <div
                                class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                <i class="icon-base bx bx-x icon-lg cursor-pointer" data-repeater-delete></i>

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
                      <!-- /Invoice Item  -->
                    <hr class="my-0" />
                      <!-- Invoice Total & Payment Terms-->
                    <div class="card-body px-0">
                      <div class="row row-gap-4">
                        <div id="paymentTermsSection"
                             class="col-md-6 mb-md-0 mb-4">
                            <div id="paymentTerms">
                                <i class="icon-base bx bx-wallet icon-xs me-1"></i>Payment Terms

                                <textarea
                                    class="form-control mt-2"
                                    id="invoiceMsg"
                                    rows="3"
                                    placeholder="(Enter any payment terms or instructions.)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="invoice-calculations">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Subtotal:</span>
                                    <span class="fw-medium text-heading invoice-subtotal"></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Discount:</span>
                                    <span class="fw-medium text-heading invoice-total-discount"></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Tax:</span>
                                    <span class="fw-medium text-heading">
                                        <span class="invoice-tax-percent" id="totalTaxRatePct"></span>%
                                    </span>
                                </div>
                                <hr class="my-2" />
                                <div class="d-flex justify-content-between">
                                    <span class="w-px-100">Total:</span>
                                    <span class="fw-medium text-heading invoice-grand-total"></span>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                      <!-- /Invoice Total -->
                    <hr class="my-0" />
                      <!-- Invoice Note -->
                    <div class="card-body px-0 pb-0">
                      <div class="row">
                        <div class="col-12">
                          <div id="noteSection">
                            <label for="note" class="text-heading mb-1 fw-medium">Note:</label>
                            <textarea class="form-control" rows="4" id="note" placeholder="Invoice note"></textarea
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                        <!-- /Invoice Note -->
                  </div>
                </div>
                <!-- /Invoice Add-->

                <!-- Invoice Actions -->
                <div class="col-lg-3 col-12 invoice-actions">
                  <div class="card mb-6">
                    <div class="card-body">
                      <button
                        class="btn btn-primary d-grid w-100 mb-4"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"
                          ><i class="icon-base bx bx-paper-plane icon-xs me-2"></i>Send Invoice</span
                        >
                      </button>
                      <a href="./app-invoice-preview.php" class="btn btn-label-secondary d-grid w-100 mb-4">Preview</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-4" data-bs-toggle="modal" data-bs-target="#taxModal">
                            Add Tax Info
                        </button>
<!--                      <button type="button" class="btn btn-label-secondary d-grid w-100">Save</button>-->
                    </div>
                  </div>
                  <div>
                      <label for="acceptPaymentsVia" class="form-label">Accept payments via</label>
                      <select
                              class="form-select mb-2 selectpicker w-100"
                              id="acceptPaymentsVia"
                              data-style="btn-default"
                              multiple
                              data-icon-base="icon-base bx"
                              data-tick-icon="bx-check text-primary">
                          <option data-icon="icon-base bx bx-mobile-alt mb-50">Mobile Money</option>
                          <option data-icon="icon-base bx bx-building-house mb-50">Bank Account</option>
                          <option data-icon="icon-base bx bx-bitcoin mb-50">Crypto</option>
                          <option data-icon="icon-base bx bx-money-withdraw mb-50">Cash Delivery</option>
                      </select>

                      <div class="mb-6">
                          <label class="form-label fw-medium mb-3">Select Payment Currency</label>
                          <div class="row g-3" id="paymentCurrencyGroup">

                              <!-- Ghana Cedis -->
                              <div class="col-sm-6 col-md-3">
                                  <input type="radio" class="btn-check" name="paymentCurrency" id="ghs" value="GHS" autocomplete="off">
                                  <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="ghs">
<!--                                      <i class="bx bx-money fs-1 mb-1"></i>-->
                                      <span>GHS</span>
                                  </label>
                              </div>

                              <!-- US Dollar -->
                              <div class="col-sm-6 col-md-3">
                                  <input type="radio" class="btn-check" name="paymentCurrency" id="usd" value="USD" autocomplete="off">
                                  <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="usd">
<!--                                      <i class="bx bx-dollar fs-2 mb-1"></i>-->
                                      <span>USD</span>
                                  </label>
                              </div>

                              <!-- Euro -->
                              <div class="col-sm-6 col-md-3">
                                  <input type="radio" class="btn-check" name="paymentCurrency" id="eur" value="EUR" autocomplete="off">
                                  <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="eur">
<!--                                      <i class="bx bx-euro mb-1"></i>-->
                                      <span>EUR</span>
                                  </label>
                              </div>

                              <!-- Pounds -->
                              <div class="col-sm-6 col-md-3">
                                  <input type="radio" class="btn-check" name="paymentCurrency" id="gbp" value="GBP" autocomplete="off">
                                  <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="gbp">
<!--                                      <i class="bx bx-pound fs-2 mb-1"></i>-->
                                      <span>GBP</span>
                                  </label>
                              </div>

                          </div>
                      </div>




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
                        value="shelbyCompany@email.com"
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
                      | built by
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

    <!-- Company Modal -->
    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyModalLabel">Company Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="companyForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" placeholder="Shelby Company Limited">
                        </div>
                        <div class="mb-3">
                            <label for="companyAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="companyAddress" placeholder="Small Heath, B10 0HF, UK">
                        </div>
                        <div class="mb-3">
                            <label for="companyContact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="companyContact" placeholder="718-986-6062">
                        </div>
                        <div class="mb-3">
                            <label for="companyEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="companyEmail" placeholder="peakyFBlinders@gmail.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Company Modal -->

    <!-- Payment Info Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="paymentForm">
                    <div class="modal-body">
                        <!-- Bank Section -->
                        <h6 class="mb-3">Bank Details</h6>
                        <div class="mb-3">
                            <label class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="bankAccountNumber" placeholder="12911055">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bankName" placeholder="American Bank">
                        </div>

                        <hr class="my-4">

                        <!-- Mobile Money Section -->
                        <h6 class="mb-3">Mobile Money Details</h6>
                        <div class="mb-3">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control" id="momoNumber" placeholder="0241304040">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control" id="momoAccountName" placeholder="Odogwu Ventures">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Network</label>
                            <input type="text" class="form-control" id="momoNetwork" placeholder="MTN Mobile Money">
                        </div>

                        <hr class="my-4">

                        <!-- Crypto Section -->
                        <h6 class="mb-3">Crypto Details</h6>
                        <div class="mb-3">
                            <label class="form-label">Token</label>
                            <input type="text" class="form-control" id="cryptoToken" placeholder="USDT">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="cryptoAddress" placeholder="0x5745...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Network</label>
                            <input type="text" class="form-control" id="cryptoNetwork" placeholder="Ethereum (ERC-20)">
                        </div>


                        <!-- Cash Section -->
                        <hr class="my-4">
                        <h6 class="mb-3">Cash Instructions</h6>
                        <div class="mb-3">
                            <label class="form-label" for="cashInstructions">Instructions</label>
                            <textarea class="form-control" id="cashInstructions" rows="3" placeholder="">Pay full amount on delivery</textarea>
                        </div>

<!--                        <hr class="my-4">-->

                        <!-- Another Section Example -->
<!--                        <h6 class="mb-3">Alternate Mobile Money</h6>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label">Number</label>-->
<!--                            <input type="text" class="form-control" id="altMomoNumber" placeholder="0241304040">-->
<!--                        </div>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label">Account Name</label>-->
<!--                            <input type="text" class="form-control" id="altMomoAccountName" placeholder="Odogwu Ventures">-->
<!--                        </div>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label">Network</label>-->
<!--                            <input type="text" class="form-control" id="altMomoNetwork" placeholder="MTN Mobile Money">-->
<!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Payment Info Modal -->

    <!-- Sender Info Modal -->
    <div class="modal fade" id="senderModal" tabindex="-1" aria-labelledby="senderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="senderModalLabel">Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="senderForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="inputSenderName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="inputSenderLocation">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control" id="inputSenderContact">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputSenderEmail">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control" id="inputSenderWebsite">
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <label class="form-label">Upload Logo</label>
                            <input type="file" class="form-control" id="inputSenderLogo" accept="image/*">
                            <div class="mt-2">
                                <img id="logoPreview" src="../assets/img/branding/hanover.svg" alt="preview" width="60">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Sender Info Modal -->

    <!-- Tax Info Modal -->
    <div class="modal fade" id="taxModal" tabindex="-1" aria-labelledby="taxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="taxModalLabel">Add Tax Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="taxForm">
                        <!-- Tax Checkbox List -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Select Applicable Taxes</label>
                            <div id="taxCheckboxContainer" class="row g-3">
                                <!-- Auto-generated checkboxes go here -->
                            </div>
                        </div>

                        <!-- Add New Tax -->
                        <hr class="my-4">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">New Tax Name</label>
                                <input type="text" id="newTaxName" class="form-control" placeholder="e.g. Environmental Levy">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Rate (%)</label>
                                <input type="number" id="newTaxRate" class="form-control" inputmode="decimal" placeholder="e.g. 5">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary w-100" id="addNewTaxBtn">
                                    <i class="bx bx-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveTaxBtn">Save Tax Info</button>
                </div>

            </div>
        </div>
    </div>
    <!-- / Tax Info Modal -->

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

    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="../assets/vendor/libs/pickr/pickr.js"></script>

    <script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/offcanvas-send-invoice.js"></script>
    <script src="../assets/js/app-invoice-add.js"></script>
    <script src="../js/invoice/invoice-calculator.js"></script>
    <script src="../js/invoice/invoice-totals.js"></script>

    <!-- Invoice ID & Datepicker Scripts -->
    <script>
        // Reinitialize Flatpickr with onChange
        flatpickr("#dateIssued", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr) {
                localStorage.setItem('dateIssued', dateStr);
            }
        });

        flatpickr("#dateDue", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr) {
                localStorage.setItem('dateDue', dateStr);
            }
        });

        // Prefill values on page load
        document.addEventListener('DOMContentLoaded', () => {
            const invoiceId = localStorage.getItem('invoiceId');
            if (invoiceId) document.getElementById('invoiceId').value = invoiceId;

            const savedIssued = localStorage.getItem('dateIssued');
            if (savedIssued) document.getElementById('dateIssued').value = savedIssued;

            const savedDue = localStorage.getItem('dateDue');
            if (savedDue) document.getElementById('dateDue').value = savedDue;
        });

        // Save invoiceId as user types
        document.getElementById('invoiceId').addEventListener('input', e => {
            localStorage.setItem('invoiceId', e.target.value);
        });
    </script>

    <!-- Client/Company Info Scripts -->
    <script>
        // Prefill company info form from localStorage when modal opens
        const form = document.getElementById('companyForm');
        const fields = ['companyName', 'companyAddress', 'companyContact', 'companyEmail'];

        document.getElementById('companyModal').addEventListener('show.bs.modal', () => {
            fields.forEach(id => {
                document.getElementById(id).value = localStorage.getItem(id) || '';
            });
        });

        // Save to localStorage on submit
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            fields.forEach(id => {
                localStorage.setItem(id, document.getElementById(id).value);
            });
            // close modal
            bootstrap.Modal.getInstance(document.getElementById('companyModal')).hide();
        });
    </script>

    <!-- Company Display Scripts -->
   <script>
        // load company data from localStorage
        document.addEventListener('DOMContentLoaded', () => {
            // Read from localStorage (with default text if nothing saved yet)
            document.getElementById('displayName').textContent =
                localStorage.getItem('companyName') || 'Company / Client Name';
            document.getElementById('displayAddress').textContent =
                localStorage.getItem('companyAddress') || 'Client Address';
            document.getElementById('displayContact').textContent =
                localStorage.getItem('companyContact') || 'Client Contact';
            document.getElementById('displayEmail').textContent =
                localStorage.getItem('companyEmail') || 'Client Email';
        });
    </script>

    <!-- Payment Display Scripts -->
    <script>
        // const paymentFields = [
        //     'bankAccountNumber','bankName',
        //     'momoNumber','momoAccountName','momoNetwork',
        //     'cryptoToken','cryptoAddress','cryptoNetwork',
        //     'altMomoNumber','altMomoAccountName','altMomoNetwork',
        //     'cashInstructions'
        // ];
        const paymentFields = [
            'bankAccountNumber','bankName',
            'momoNumber','momoAccountName','momoNetwork',
            'cryptoToken','cryptoAddress','cryptoNetwork',
            'cashInstructions'
        ];

        // Map each input field id to its display td id
        const displayMap = {
            bankAccountNumber: 'displayBankAccountNumber',
            bankName: 'displayBankName',

            momoNumber: 'displayMomoNumber',
            momoAccountName: 'displayMomoAccountName',
            momoNetwork: 'displayMomoNetwork',

            cryptoToken: 'displayCryptoToken',
            cryptoAddress: 'displayCryptoAddress',
            cryptoNetwork: 'displayCryptoNetwork',

            cashInstructions: 'displayCashInstructions'
        };

        // Prefill modal from localStorage
        document.getElementById('paymentModal').addEventListener('show.bs.modal', () => {
            paymentFields.forEach(id => {
                document.getElementById(id).value = localStorage.getItem(id) || '';
            });
        });

        // Save + update display immediately
        document.getElementById('paymentForm').addEventListener('submit', (e) => {
            e.preventDefault();
            paymentFields.forEach(id => {
                const value = document.getElementById(id).value;
                localStorage.setItem(id, value);

                // update visible table
                document.getElementById(displayMap[id]).textContent = value || '-';
            });

            bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();
        });

        // (Optional) Populate display on page load from localStorage
        document.addEventListener('DOMContentLoaded', () => {
            paymentFields.forEach(id => {
                const saved = localStorage.getItem(id);
                if (saved && displayMap[id]) {
                    document.getElementById(displayMap[id]).textContent = saved;
                }
            });
        });
    </script>

    <!-- Payment Options Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('acceptPaymentsVia');

            // Avoid re-binding if the script somehow runs twice
            if (select.dataset.initialized === 'true') return;
            select.dataset.initialized = 'true';

            // Map each option text to the section ID
            const sectionMap = {
                'Mobile Money': 'mobileMoneySection',
                'Bank Account': 'bankAccountSection',
                'Crypto': 'cryptoSection',
                'Cash Delivery': 'cashDeliverySection'
            };

            // --- Function to show/hide sections ---
            function updateSections() {
                const selectedValues = Array.from(select.selectedOptions).map(opt => opt.textContent.trim());
                for (const [optionText, sectionId] of Object.entries(sectionMap)) {
                    const section = document.getElementById(sectionId);
                    if (!section) continue;
                    section.style.display = selectedValues.includes(optionText) ? 'block' : 'none';
                }
            }

            // --- Save selections + update sections on change ---
            select.addEventListener('change', () => {
                const selected = Array.from(select.selectedOptions).map(opt => opt.textContent.trim());
                localStorage.setItem('acceptPaymentsVia', JSON.stringify(selected));
                updateSections();
            });

            // --- Initial display ---
            updateSections();
        });
    </script>


    <!-- Sender Info Scripts -->
    <script>
        // Fill modal inputs with saved values when opened
        document.getElementById('senderModal').addEventListener('show.bs.modal', () => {
            document.getElementById('inputSenderName').value = localStorage.getItem('senderName') || '';
            document.getElementById('inputSenderLocation').value = localStorage.getItem('senderLocation') || '';
            document.getElementById('inputSenderContact').value = localStorage.getItem('senderContact') || '';
            document.getElementById('inputSenderEmail').value = localStorage.getItem('senderEmail') || '';
            document.getElementById('inputSenderWebsite').value = localStorage.getItem('senderWebsite') || '';

            const savedLogo = localStorage.getItem('companyLogo');
            if (savedLogo) {
                document.getElementById('logoPreview').src = savedLogo;
            } else {
                document.getElementById('logoPreview').src = '../assets/img/branding/hanover.svg';
            }
        });

        // Handle logo upload immediately (preview + store temporarily)
        document.getElementById('inputSenderLogo').addEventListener('change', () => {
            const file = document.getElementById('inputSenderLogo').files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Save details to localStorage on submit
        document.getElementById('senderForm').addEventListener('submit', (e) => {
            e.preventDefault();

            // Text fields
            localStorage.setItem('senderName', document.getElementById('inputSenderName').value);
            localStorage.setItem('senderLocation', document.getElementById('inputSenderLocation').value);
            localStorage.setItem('senderContact', document.getElementById('inputSenderContact').value);
            localStorage.setItem('senderEmail', document.getElementById('inputSenderEmail').value);
            localStorage.setItem('senderWebsite', document.getElementById('inputSenderWebsite').value);

            // Logo (grab from preview src)
            localStorage.setItem('companyLogo', document.getElementById('logoPreview').src);

            // Update visible display immediately
            document.getElementById('senderName').textContent = localStorage.getItem('senderName') || '';
            document.getElementById('senderLocation').textContent = localStorage.getItem('senderLocation') || '';
            document.getElementById('senderContact').textContent = localStorage.getItem('senderContact') || '';
            document.getElementById('senderEmail').textContent = localStorage.getItem('senderEmail') || '';
            document.getElementById('senderWebsite').textContent = localStorage.getItem('senderWebsite') || '';
            document.getElementById('companyLogo').src = localStorage.getItem('companyLogo') || '../assets/img/branding/hanover.svg';

            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('senderModal')).hide();
        });

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

    <!-- Payment and Client Notes -->
    <script>
        // Save payment terms and notes to localStorage on type
        document.addEventListener('DOMContentLoaded', () => {
            // Restore saved values on load
            const savedInvoiceMsg = localStorage.getItem('invoiceMsg') || '';
            const savedNote = localStorage.getItem('note') || '';

            document.getElementById('invoiceMsg').value = savedInvoiceMsg;
            document.getElementById('note').value = savedNote;

            // Save to localStorage whenever user types
            document.getElementById('invoiceMsg').addEventListener('input', e => {
                localStorage.setItem('invoiceMsg', e.target.value);
            });

            document.getElementById('note').addEventListener('input', e => {
                localStorage.setItem('note', e.target.value);
            });
        });
    </script>

    <!-- Payment Notes Toggle -->
    <script>
        // Toggle the payment info section on and off
        const toggle = document.getElementById('payment-terms');
        const paymentTermsDiv = document.getElementById('paymentTerms');

        // Load saved state on page load
        document.addEventListener('DOMContentLoaded', () => {
            const savedState = localStorage.getItem('paymentTermsToggle');
            if (savedState !== null) {
                // Convert string "true"/"false" to boolean
                const isChecked = savedState === 'true';
                toggle.checked = isChecked;
                paymentTermsDiv.style.display = isChecked ? 'block' : 'none';
            } else {
                // If no saved state yet, match initial checkbox
                paymentTermsDiv.style.display = toggle.checked ? 'block' : 'none';
            }
        });

        // Save and show/hide on toggle change
        toggle.addEventListener('change', () => {
            const isChecked = toggle.checked;
            localStorage.setItem('paymentTermsToggle', isChecked); // save state
            paymentTermsDiv.style.display = isChecked ? 'block' : 'none'; // show/hide
        });
    </script>
    <!-- Client Notes Toggle -->
    <script>
        // Toggle the client notes section on and off
        const noteToggle = document.getElementById('client-notes');
        const noteSectionDiv = document.getElementById('noteSection');

        // Load saved state on page load
        document.addEventListener('DOMContentLoaded', () => {
            const savedState = localStorage.getItem('clientNotesToggle');
            if (savedState !== null) {
                // Convert string "true"/"false" to boolean
                const isChecked = savedState === 'true';
                noteToggle.checked = isChecked;
                noteSectionDiv.style.display = isChecked ? 'block' : 'none';
            } else {
                // If no saved state yet, match initial checkbox
                noteSectionDiv.style.display = noteToggle.checked ? 'block' : 'none';
            }
        });

        // Save and show/hide on toggle change
        noteToggle.addEventListener('change', () => {
            const isChecked = noteToggle.checked;
            localStorage.setItem('clientNotesToggle', isChecked); // save state
            noteSectionDiv.style.display = isChecked ? 'block' : 'none'; // show/hide
        });
    </script>

    <!-- Tax Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('taxCheckboxContainer');
            const modalEl   = document.getElementById('taxModal');
            if (!container || !modalEl) return; // guard if modal isn't on this page

            // ---- CSS.escape fallback (older Safari/Android) ----
            if (typeof CSS === 'undefined' || typeof CSS.escape !== 'function') {
                window.CSS = window.CSS || {};
                CSS.escape = function (sel) {
                    return String(sel).replace(/([ #;?%&,.+*~':"!^$[\]()=>|/@])/g,'\\$1');
                };
            }

            // ---- notifier helper (Swal > Notyf > alert) ----
            function notify({ type = 'success', title = '', text = '' }) {
                if (window.Swal?.fire) {
                    Swal.fire({ icon: type, title: title || undefined, text: text || undefined, timer: 1500, showConfirmButton: false });
                    return;
                }
                if (window.Notyf) {
                    window._notyf = window._notyf || new Notyf({ duration: 2000, ripple: true, dismissible: true });
                    if (type === 'error' || type === 'warning') _notyf.error(title || text || 'Oops');
                    else _notyf.success(title || text || 'Done');
                    return;
                }
                alert(title || text || (type === 'error' ? 'Error' : 'Done'));
            }

            // ✅ Default Ghana taxes (initial list shown every time)
            const defaultTaxes = [
                { name: "None",        rate: 0 },
                { name: "VAT",         rate: 15 },
                { name: "NHIL",        rate: 2.5 },
                { name: "GETFund",     rate: 2.5 },
                { name: "Withholding", rate: 7.5 }
            ];

            // Merge defaults with any saved full catalog (keeps custom taxes + saved rate edits)
            function getMergedTaxes() {
                const savedList = JSON.parse(localStorage.getItem('taxInfoList') || '[]');
                const map = new Map();

                // Always include defaults
                defaultTaxes.forEach(t => map.set(t.name, { ...t }));

                // Normalize and overlay saved items: support {name, rate} and {taxName, taxRate}
                savedList.forEach(t => {
                    const name = t.name ?? t.taxName;
                    const rate = Number(t.rate ?? t.taxRate) || 0;
                    if (name) map.set(name, { name, rate });
                });

                // Sort: defaults (fixed order) then customs (alphabetically)
                const defaultNames = defaultTaxes.map(t => t.name);
                const customs = [];
                map.forEach((val, key) => { if (!defaultNames.includes(key)) customs.push(val); });
                customs.sort((a, b) => a.name.localeCompare(b.name));

                return [...defaultTaxes.map(t => map.get(t.name)), ...customs];
            }

            // Render the checkbox + rate rows
            function renderTaxes() {
                const taxes = getMergedTaxes();

                // Restore previously selected taxes + rates
                const selected = JSON.parse(localStorage.getItem('selectedTaxes') || '[]'); // [{taxName, taxRate}]
                const selectedMap = new Map(selected.map(t => [t.taxName, Number(t.taxRate)]));

                container.innerHTML = '';
                taxes.forEach((t, i) => {
                    const rateValue = selectedMap.has(t.name) ? selectedMap.get(t.name) : Number(t.rate) || 0;
                    const block = `
        <div class="col-md-6 col-lg-4">
          <div class="border rounded p-3 h-100">
            <div class="form-check d-flex justify-content-between align-items-center">
              <input class="form-check-input tax-check" type="checkbox" id="tax_${i}" data-name="${t.name}">
              <label class="form-check-label fw-medium" for="tax_${i}">${t.name}</label>
            </div>
            <div class="mt-2">
              <label class="form-label small text-muted mb-1">Rate (%)</label>
              <input type="number" class="form-control form-control-sm tax-rate" data-name="${t.name}" value="${rateValue}" step="0.1" inputmode="decimal">
            </div>
          </div>
        </div>
      `;
                    container.insertAdjacentHTML('beforeend', block);
                });

                // Check previously selected items
                document.querySelectorAll('.tax-check').forEach(cb => {
                    if (selectedMap.has(cb.dataset.name)) cb.checked = true;
                });
            }

            // Add new tax to the catalog and re-render
            document.getElementById('addNewTaxBtn').addEventListener('click', () => {
                const nameEl = document.getElementById('newTaxName');
                const rateEl = document.getElementById('newTaxRate');
                const name = nameEl.value.trim();
                const rate = Number(rateEl.value);

                if (!name || isNaN(rate)) {
                    notify({ type: 'warning', title: 'Enter a valid tax name and rate' });
                    return;
                }

                const merged = getMergedTaxes();
                const exists = merged.some(t => t.name.toLowerCase() === name.toLowerCase());
                if (exists) {
                    notify({ type: 'warning', title: 'That tax already exists' });
                    return;
                }

                merged.push({ name, rate });
                localStorage.setItem('taxInfoList', JSON.stringify(merged));

                // Reset + re-render
                nameEl.value = '';
                rateEl.value = '';
                renderTaxes();

                // Autoselect the new one and set its rate
                const cb = [...document.querySelectorAll('.tax-check')].find(x => x.dataset.name === name);
                if (cb) cb.checked = true;
                const rateInput = [...document.querySelectorAll('.tax-rate')].find(x => x.dataset.name === name);
                if (rateInput) rateInput.value = rate;


                notify({ type: 'success', title: 'New tax added' });
            });

            // Save selected taxes
            document.getElementById('saveTaxBtn').addEventListener('click', () => {
                const selected = [];
                document.querySelectorAll('.tax-check').forEach(cb => {
                    if (cb.checked) {
                        const name = cb.dataset.name;
                        const rateInput = document.querySelector(`.tax-rate[data-name="${CSS.escape(name)}"]`);
                        selected.push({ taxName: name, taxRate: Number(rateInput?.value || 0) });
                    }
                });

                if (selected.length === 0) {
                    notify({ type: 'warning', title: 'Select at least one tax' });
                    return;
                }

                // Persist current selection and full catalog
                localStorage.setItem('selectedTaxes', JSON.stringify(selected));
                localStorage.setItem('taxInfoList', JSON.stringify(getMergedTaxes()));

                document.getElementById('totalTaxRatePct').textContent = getCombinedTaxRate().toFixed(2);

                const modal = bootstrap.Modal.getInstance(modalEl);
                modal?.hide();
                notify({ type: 'success', title: 'Tax info saved' });
            });

            // Render (defaults + customs + previous selections) every time the modal opens
            modalEl.addEventListener('show.bs.modal', renderTaxes);
        });
    </script>
    <script>
        function getSelectedTaxes() {
            try { return JSON.parse(localStorage.getItem('selectedTaxes') || '[]'); }
            catch { return []; }
        }

        function getCombinedTaxRate() {
            const taxes = getSelectedTaxes();
            return taxes.reduce((sum, t) => sum + (Number(t.taxRate) || 0), 0);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const totalTaxRatePct = document.getElementById('totalTaxRatePct');
            if (totalTaxRatePct) {
                const rate = getCombinedTaxRate();
                totalTaxRatePct.textContent = `${rate.toFixed(2)}`;
            }
        });
    </script>

    <!-- Currency Selection Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const storageKey = 'paymentCurrency';
            const radios = document.querySelectorAll('input[name="paymentCurrency"]');

            // Load saved currency or default to GHS
            const saved = localStorage.getItem(storageKey) || 'GHS';
            radios.forEach(r => {
                if (r.value === saved) r.checked = true;
            });

            // Save selection on change
            radios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.checked) {
                        localStorage.setItem(storageKey, this.value);
                    }
                });
            });

        });
    </script>

  </body>
</html>
