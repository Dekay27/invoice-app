<?php

$invoiceNumber = $_GET['invoiceNumber'] ?? '#0001';

$companyLogo = $_GET['companyLogo'] ?? '#0001';
$companyName = $_GET['companyName'] ?? 'Company Name';
$companyLocation = $_GET['companyLocation'] ?? 'Company Location';
$companyCity = $_GET['companyCity'] ?? 'City';
$companyState = $_GET['companyState'] ?? 'State';
$companyZip = $_GET['companyZip'] ?? 'ZipCode';
$companyCountry = $_GET['companyCountry'] ?? 'Country';

$companyAddress = $companyCity . ", " . $companyState . ", " . $companyCountry;

$companyPhone = $_GET['companyPhone'] ?? '+1 (***) *** ****';
$companyPhone2 = $_GET['companyPhone2'] ?? '+44 (***) *** ****';
$companyEmail = $_GET['companyEmail'] ?? 'Email';

// give me js that dynamically produces value for price from realtime cost, quantity and discount
?>

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
              <!-- Wrap the entire invoice content in a form -->
              <form id="invoiceForm" method="POST" action="save.php">
                  <div class="container-xxl flex-grow-1 container-p-y">
                      <div class="row invoice-add">
                          <!-- Invoice Add-->
                          <div class="col-lg-9 col-12 mb-lg-0 mb-6">
                              <div class="card invoice-preview-card p-sm-12 p-6">
                                  <div class="card-body invoice-preview-header rounded">
                                      <div class="d-flex flex-wrap flex-column flex-sm-row justify-content-between text-heading">
                                          <div class="mb-md-0 mb-6">
                                              <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                                    <span class="app-brand-logo demo">
                                        <span class="text-primary">
                                            <?php echo htmlspecialchars($companyLogo); ?>
                                        </span>
                                    </span>
                                                  <span class="app-brand-text demo fw-bold ms-50"><?php echo htmlspecialchars($companyName); ?></span>
                                              </div>
                                              <p class="mb-2"><?php echo htmlspecialchars($companyLocation); ?></p>
                                              <p class="mb-2"><?php echo htmlspecialchars($companyAddress); ?></p>
                                              <p class="mb-3"><?php echo htmlspecialchars($companyPhone); ?>, <?php echo htmlspecialchars($companyPhone2); ?></p>
                                              <input type="hidden" name="companyName" value="<?php echo htmlspecialchars($companyName); ?>">
                                              <input type="hidden" name="companyLocation" value="<?php echo htmlspecialchars($companyLocation); ?>">
                                              <input type="hidden" name="companyAddress" value="<?php echo htmlspecialchars($companyAddress); ?>">
                                              <input type="hidden" name="companyPhone" value="<?php echo htmlspecialchars($companyPhone); ?>">
                                              <input type="hidden" name="companyPhone2" value="<?php echo htmlspecialchars($companyPhone2); ?>">
                                              <input type="hidden" name="companyEmail" value="<?php echo htmlspecialchars($companyEmail); ?>">
                                              <input type="hidden" name="companyLogo" value="<?php echo htmlspecialchars($companyLogo); ?>">
                                          </div>
                                          <div class="col-md-5 col-8 pe-0 ps-0 ps-md-2">
                                              <dl class="row mb-0 gx-4">
                                                  <dt class="col-sm-5 mb-2 d-md-flex align-items-center justify-content-end">
                                                      <span class="h5 text-capitalize mb-0 text-nowrap">Invoice</span>
                                                  </dt>
                                                  <dd class="col-sm-7">
                                                      <input type="text" class="form-control" name="invoiceId" id="invoiceId" value="<?php echo htmlspecialchars($invoiceNumber); ?>" readonly />
                                                  </dd>
                                                  <dt class="col-sm-5 mb-1 d-md-flex align-items-center justify-content-end">
                                                      <span class="fw-normal">Date Issued:</span>
                                                  </dt>
                                                  <dd class="col-sm-7">
                                                      <input type="text" class="form-control flatpickr" name="dateIssued" id="dateIssued" placeholder="Month DD, YYYY" data-flatpickr data-alt-input="true" data-alt-format="F j, Y" data-date-format="Y-m-d"/>
                                                  </dd>
                                                  <dt class="col-sm-5 d-md-flex align-items-center justify-content-end">
                                                      <span class="fw-normal">Due Date:</span>
                                                  </dt>
                                                  <dd class="col-sm-7 mb-0">
                                                      <input type="text" class="form-control flatpickr" name="dateDue" id="dateDue" placeholder="Month DD, YYYY" data-flatpickr data-alt-input="true" data-alt-format="F j, Y" data-date-format="Y-m-d"/>
                                                  </dd>
                                              </dl>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card-body px-0">
                                      <div class="row">
                                          <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-6">
                                              <h6>Invoice To:</h6>
                                              <p class="mb-1"><?php echo htmlspecialchars($_GET['clientName'] ?? 'Shelby Company Limited'); ?></p>
                                              <p class="mb-1"><?php echo htmlspecialchars($_GET['clientAddress'] ?? 'Small Heath, B10 0HF, UK'); ?></p>
                                              <p class="mb-1"><?php echo htmlspecialchars($_GET['clientPhone'] ?? '718-986-6062'); ?></p>
                                              <p class="mb-0"><?php echo htmlspecialchars($_GET['clientEmail'] ?? 'peakyFBlinders@gmail.com'); ?></p>
                                              <input type="hidden" name="clientName" value="<?php echo htmlspecialchars($_GET['clientName'] ?? 'Shelby Company Limited'); ?>">
                                              <input type="hidden" name="clientAddress" value="<?php echo htmlspecialchars($_GET['clientAddress'] ?? 'Small Heath, B10 0HF, UK'); ?>">
                                              <input type="hidden" name="clientPhone" value="<?php echo htmlspecialchars($_GET['clientPhone'] ?? '718-986-6062'); ?>">
                                              <input type="hidden" name="clientEmail" value="<?php echo htmlspecialchars($_GET['clientEmail'] ?? 'peakyFBlinders@gmail.com'); ?>">
                                          </div>
                                          <div class="col-md-6 col-sm-7">
                                              <h6>Payment Information:</h6>
                                              <table>
                                                  <tbody>
                                                  <tr>
                                                      <td class="pe-4">Account Number:</td>
                                                      <td><?php echo htmlspecialchars($_GET['accountNumber'] ?? '12911055'); ?></td>
                                                  </tr>
                                                  <tr>
                                                      <td class="pe-4">Bank name:</td>
                                                      <td><?php echo htmlspecialchars($_GET['bankName'] ?? 'American Bank'); ?></td>
                                                  </tr>
                                                  <tr>
                                                      <td class="pe-4">Country:</td>
                                                      <td><?php echo htmlspecialchars($_GET['country'] ?? 'United States'); ?></td>
                                                  </tr>
                                                  <tr>
                                                      <td class="pe-4">IBAN:</td>
                                                      <td><?php echo htmlspecialchars($_GET['iban'] ?? 'ETD95476213874685'); ?></td>
                                                  </tr>
                                                  <tr>
                                                      <td class="pe-4">SWIFT code:</td>
                                                      <td><?php echo htmlspecialchars($_GET['swiftCode'] ?? 'BR91905'); ?></td>
                                                  </tr>
                                                  </tbody>
                                              </table>
                                              <input type="hidden" name="accountNumber" value="<?php echo htmlspecialchars($_GET['accountNumber'] ?? '12911055'); ?>">
                                              <input type="hidden" name="bankName" value="<?php echo htmlspecialchars($_GET['bankName'] ?? 'American Bank'); ?>">
                                              <input type="hidden" name="country" value="<?php echo htmlspecialchars($_GET['country'] ?? 'United States'); ?>">
                                              <input type="hidden" name="iban" value="<?php echo htmlspecialchars($_GET['iban'] ?? 'ETD95476213874685'); ?>">
                                              <input type="hidden" name="swiftCode" value="<?php echo htmlspecialchars($_GET['swiftCode'] ?? 'BR91905'); ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <hr class="mt-0 mb-6" />
                                  <div class="card-body pt-0 px-0">
                                      <div class="mb-4" data-repeater-list="group-a">
                                          <div class="repeater-wrapper pt-0 pt-md-9" data-repeater-item>
                                              <div class="d-flex border rounded position-relative pe-0">
                                                  <div class="row w-100 p-6 g-6">
                                                      <div class="col-md-6 col-12 mb-md-0 mb-4">
                                                          <p class="h6 repeater-title">Item</p>
                                                          <input type="text" class="form-control item-details mb-6" name="group-a[0][item-details]" placeholder="(Enter item details)" />
                                                          <textarea class="form-control" name="group-a[0][extra-details]" rows="2" placeholder="(Any extra details)"></textarea>
                                                      </div>
                                                      <div class="col-md-3 col-12 mb-md-0 mb-4">
                                                          <p class="h6 repeater-title">Cost</p>
                                                          <input type="text" class="form-control invoice-item-price mb-5" name="group-a[0][cost]" placeholder="25" min="12" />
                                                          <div class="text-heading">
                                                              <div class="mb-1">Discount:</div>
                                                              <input type="text" class="form-control discount" name="group-a[0][discount]" placeholder="$0.00"/>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-2 col-12 mb-md-0 mb-4">
                                                          <p class="h6 repeater-title">Qty</p>
                                                          <input type="text" class="form-control invoice-item-qty" name="group-a[0][quantity]" placeholder="1" min="1" max="50" />
                                                      </div>
                                                      <div class="col-md-1 col-12 pe-0 mt-8">
                                                          <p class="h6 repeater-title">Price</p>
                                                          <p class="mb-0 text-heading invoice-item-total-price"></p>
                                                          <input type="hidden" class="invoice-item-total-price-hidden" name="group-a[0][total_price]" />
                                                      </div>
                                                  </div>
                                                  <div class="d-flex flex-column align-items-center justify-content-between border-start p-2">
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
                                  </div>
                                  <hr class="my-0" />
                                  <div class="card-body px-0">
                                      <div class="row row-gap-4">
                                          <div id="paymentTerms" class="col-md-6 mb-md-0 mb-4">
                                              <i class="icon-base bx bx-wallet icon-xs me-1"></i>Payment Terms
                                              <textarea class="form-control mt-2" name="invoiceMsg" id="invoiceMsg" rows="3" placeholder="The project starts once full payment is made."></textarea>
                                          </div>
                                          <div class="col-md-6 d-flex justify-content-end">
                                              <div class="invoice-calculations">
                                                  <div class="d-flex justify-content-between mb-2">
                                                      <span class="w-px-100">Subtotal:</span>
                                                      <span class="fw-medium text-heading invoice-subtotal">$0.00</span>
                                                      <input type="hidden" name="subtotal" class="invoice-subtotal-hidden" />
                                                  </div>
                                                  <div class="d-flex justify-content-between mb-2">
                                                      <span class="w-px-100">Discount:</span>
                                                      <span class="fw-medium text-heading invoice-total-discount">$0.00</span>
                                                      <input type="hidden" name="discount" class="invoice-total-discount-hidden" />
                                                  </div>
                                                  <hr class="my-2" />
                                                  <div class="d-flex justify-content-between">
                                                      <span class="w-px-100">Total:</span>
                                                      <span class="fw-medium text-heading invoice-grand-total">$0.00</span>
                                                      <input type="hidden" name="grand_total" class="invoice-grand-total-hidden" />
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
                                                  <label for="note" class="text-heading mb-1 fw-medium">Note:</label>
                                                  <textarea class="form-control" name="note" id="note" rows="2" placeholder="Invoice note">Thanks for your business.</textarea>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /Invoice Add-->

                          <!-- Invoice Actions -->
                          <div class="col-lg-3 col-12 invoice-actions">
                              <div class="card mb-6">
                                  <div class="card-body">
                                      <button class="btn btn-primary d-grid w-100 mb-4" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                                          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="icon-base bx bx-paper-plane icon-xs me-2"></i>Send Invoice</span>
                                      </button>
                                      <a href="./app-invoice-preview.php" class="btn btn-label-secondary d-grid w-100 mb-4">Preview</a>
                                      <button type="submit" class="btn btn-label-secondary d-grid w-100">Save</button>
                                  </div>
                              </div>
                              <div>
                                  <label for="acceptPaymentsVia" class="form-label">Accept payments via</label>
                                  <select id="selectpickerMultiple" class="form-select mb-6 selectpicker w-100" name="acceptPaymentsVia[]" multiple data-style="btn-default" data-icon-base="icon-base bx" data-tick-icon="bx-check text-primary">
                                      <option data-icon="icon-base bx bx-mobile-alt mb-50">Mobile Money</option>
                                      <option data-icon="icon-base bx bx-building-house mb-50">Bank Account</option>
                                      <option data-icon="icon-base bx bx-bitcoin mb-50">Crypto</option>
                                      <option data-icon="icon-base bx bx-money-withdraw mb-50">Cash Delivery</option>
                                  </select>
                                  <div class="d-flex justify-content-between mb-2">
                                      <label for="payment-terms">Payment Terms</label>
                                      <div class="form-check form-switch me-n2">
                                          <input type="checkbox" class="form-check-input" name="payment-terms" id="payment-terms" checked />
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between mb-2">
                                      <label for="client-notes">Client Notes</label>
                                      <div class="form-check form-switch me-n2">
                                          <input type="checkbox" class="form-check-input" name="client-notes" id="client-notes" checked />
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /Invoice Actions -->
                      </div>

                      <!-- Send Invoice Offcanvas -->
                      <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                          <div class="offcanvas-header mb-6 border-bottom">
                              <h5 class="offcanvas-title">Send Invoice</h5>
                              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body pt-0 flex-grow-1">
                              <div class="mb-6">
                                  <label for="invoice-from" class="form-label">From</label>
                                  <input type="text" class="form-control" name="invoice-from" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                              </div>
                              <div class="mb-6">
                                  <label for="invoice-to" class="form-label">To</label>
                                  <input type="text" class="form-control" name="invoice-to" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                              </div>
                              <div class="mb-6">
                                  <label for="invoice-subject" class="form-label">Subject</label>
                                  <input type="text" class="form-control" name="invoice-subject" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                              </div>
                              <div class="mb-6">
                                  <label for="invoice-message" class="form-label">Message</label>
                                  <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated, Thank you for your business...</textarea>
                              </div>
                              <div class="mb-6">
                    <span class="badge bg-label-primary">
                        <i class="icon-base bx bx-link icon-xs"></i>
                        <span class="align-middle">Invoice Attached</span>
                    </span>
                                  <input type="hidden" name="attachment_path" value="/invoices/<?php echo htmlspecialchars($invoiceNumber); ?>.pdf" />
                              </div>
                              <div class="mb-6 d-flex flex-wrap">
                                  <button type="button" class="btn btn-primary me-4" data-bs-dismiss="offcanvas">Send</button>
                                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                              </div>
                          </div>
                      </div>
                      <!-- /Send Invoice Offcanvas -->
                  </div>
              </form>
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
  </body>
</html>
