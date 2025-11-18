<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sys | Log in</title>
    
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
                <a href="#" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicie nova sessão</p>
                <?php if (!empty(session('danger'))) : ?>
                    <p class="text-danger text-sm text-center text-bold"><?= session('danger') ?></p>
                <?php endif; ?>

                <?php echo form_open(url_to('user_login'), 'id="quickForm"'); ?>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuário/e-mail/número</label>
                        <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Seu nome do usuário" value="<?=old('user');?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Sua senha" value="<?=old('password');?>">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer float-right">
                    <button type="submit" class="btn btn-primary btn-sm">Login <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>


                <?php echo form_close(); ?>

                <div class="social-auth-links  mt-2 mb-3  pr-3">
                    <a  hidden href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a  href="<?=url_to('/')?>" class=" btn-block text-left pl-4">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar a página
                    </a>
                
                </div>
                <!-- /.social-auth-links -->

             
                <p class="mb-0">
                    <a  href="<?=url_to('password_reset')?>" class="text-center pl-4"><i class="fa-solid fa-key"></i> Recuperar senha</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

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


    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    user: {
                        required: true,
                        user: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    user: {
                        required: "Porfavor! introduza o seu nome do usuário",
                        user: "Please enter a valid user address"
                    },
                    password: {
                        required: "Profavor! insira a senha",
                        minlength: "Your senha must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>