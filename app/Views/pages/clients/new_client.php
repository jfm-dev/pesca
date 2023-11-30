<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Novo cliente
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Novo cliente</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Novo Cliente</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
    <div class="col-12">
        <!-- /.card -->
        <?php if (!empty(session('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show msgalert" role="alert">
                <?= session('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif (!empty(session('success'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show msgalert" role="alert">
                <?= session('danger') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?php
                    if (session('type')) :
                        session()->remove('type');
                    endif;
                    ?>
                </h3>
                <a href="<?= url_to('list_clients') ?>" class="btn btn-primary btn-xs float-right"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open(url_to('save_client')); ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Name">Nome</label>
                        <input name="name" type="text" class="form-control form-control-sm" id="Name" placeholder="Nome do cliente" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Address">Endereço</label>
                        <input name="address" type="text" class="form-control form-control-sm" id="Address" placeholder="Endereço do cliente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Nuit">NUIT</label>
                        <input name="nuit" type="number" class="form-control form-control-sm" id="Nuit" placeholder="NUIT do cliente">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Contact">Contacto</label>
                        <input name="contact" type="number" maxlength="9" class="form-control form-control-sm" id="Contact" placeholder="Contacto do cliente">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control form-control-sm" id="Email" placeholder="Email do cliente">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-right">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                <?= form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<?= $this->endSection() ?>