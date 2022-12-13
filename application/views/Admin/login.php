<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Log in</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?= base_url("_assets/") ?>plugins/fontawesome-free/css/all.min.css">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="<?= base_url("_assets/") ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url("_assets/") ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
      <div class="login-box">
            <div class="login-logo">
                  <a href="../../index2.html"><b>Admin</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                  <div class="card-body login-card-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <?=
                        $this->session->flashdata('pesan');
                        ?>

                        <form action="<?= base_url() ?>Auth/Cek" method="post">
                              <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name="username" value="<?= set_value('username') ?>">
                                    <div class="text-danger"><?= form_error('username') ?></div>
                                    <div class="input-group-append">
                                          <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                          </div>
                                    </div>
                              </div>
                              <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                                    <div class=" text-danger"> <?= form_error('password') ?>
                                    </div>
                              
                              <div class="input-group-append">
                                    <div class="input-group-text">
                                          <span class="fas fa-lock"></span>
                                    </div>
                              </div>
                        </div>
                  <div class="row">
                        <div class="col-8">
                              <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                          Remember Me
                                    </label>
                              </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                       
                        <!-- /.col -->
                  </div>
                  </form>
            </div>
      </div>
            <!-- /.login-card-body -->
      </div>
      </div>
      <!-- /.login-box -->

      <!-- jQuery -->
      <script src="<?= base_url("_assets/") ?>plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?= base_url("_assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?= base_url("_assets/") ?>dist/js/adminlte.min.js"></script>
</body>

</html>