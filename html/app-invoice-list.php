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

    <title>Demo: Invoice List - Pages | Sneat - Bootstrap Dashboard PRO</title>

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

    <link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <!-- Page CSS -->

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
              <!-- Invoice List Widget -->

              <div class="card mb-6">
                <div class="card-widget-separator-wrapper">
                  <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                      <div class="col-sm-6 col-lg-3">
                        <div
                          class="d-flex justify-content-between align-items-center card-widget-1 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0">24</h4>
                            <p class="mb-0">Clients</p>
                          </div>
                          <div class="avatar me-sm-6 w-px-42 h-px-42">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                              <i class="icon-base bx bx-user icon-26px"></i>
                            </span>
                          </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-6" />
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div
                          class="d-flex justify-content-between align-items-center card-widget-2 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0">165</h4>
                            <p class="mb-0">Invoices</p>
                          </div>
                          <div class="avatar me-lg-6 w-px-42 h-px-42">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                              <i class="icon-base bx bx-file icon-26px"></i>
                            </span>
                          </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none" />
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div
                          class="d-flex justify-content-between align-items-center border-end pb-4 pb-sm-0 card-widget-3">
                          <div>
                            <h4 class="mb-0">$2.46k</h4>
                            <p class="mb-0">Paid</p>
                          </div>
                          <div class="avatar me-sm-6 w-px-42 h-px-42">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                              <i class="icon-base bx bx-check-double icon-26px"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0">$876</h4>
                            <p class="mb-0">Unpaid</p>
                          </div>
                          <div class="avatar w-px-42 h-px-42">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                              <i class="icon-base bx bx-error-circle icon-26px"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Invoice List Table -->
              <div class="card">
                <div class="card-datatable table-responsive">
                  <table class="invoice-list-table table border-top">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th class="text-truncate">Issued Date</th>
                        <th>Balance</th>
                        <th>Invoice Status</th>
                        <th class="cell-fit">Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
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
    <script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->

    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/app-invoice-list.js"></script>
  </body>
</html>
