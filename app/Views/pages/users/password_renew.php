<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/adminlte/fontawesome/css/all.min.css") ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Defina nova senha</b></a>
            </div>
            <div class="card-body">

                <?php if (!empty(session('danger'))) : ?>
                    <p class="text-danger text-sm text-center text-bold"><?= session('danger') ?></p>
                <?php endif; ?>

                <?php echo form_open(url_to('password_update')); ?>

                <div class="card-body">
                    <p id="error-message" style="color: red; display: none;">As senhas não coincidem.</p>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nova senha</label>
                        <input required type="text" minlength="4" name="password" class="form-control" id="password" placeholder="Introduza a sua nova senha">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirmar senha</label>
                        <input required type="text" minlength="4" name="password1" class="form-control" id="confirmPassword" placeholder="Confirmar senha">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer float-right">
                    <button type="submit"  class="btn btn-primary btn-sm">Guardar <i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>

                <div class="social-auth-links  mt-2 mb-3  pr-3">

                    <a href="<?= url_to('/') ?>" class=" btn-block text-left pl-4">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar a página
                    </a>

                </div>
                <!-- /.social-auth-links -->
                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    
</body>

</html>

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/adminlte/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>