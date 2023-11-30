<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Contactos / Inscritos
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contactos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contactos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
    <div class="col-12">
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
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Inscritos disponíveis</h3>
                <button type="button" class="btn btn-success btn-sm float-lg-right" data-toggle="modal" data-target="#new-notice">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo contacto
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telemóvel</th>
                            <th>Tipo de cadastro</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subscribed as $sub) : ?>
                            <tr>
                                <td><?= $sub->id ?></td>
                                <td><?= $sub->name ?></td>
                                <td> <?= $sub->email ?></td>
                                <td><?= $sub->contact ?> </td>
                                <td><?php if($sub->register ==0): echo "Auto registo"; else: echo"Usuário"; endif; ?></td>
                                <td>
                                    <button  class="btn" data-toggle="modal" data-target="#edit-contact-<?= $sub->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                    <button  class="btn" data-toggle="modal" data-target="#delete-contact-<?= $sub->id ?>"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- /.content-wrapper -->
<div class="modal fade" id="new-notice" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo contacto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(url_to('save_contact')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Nome</label>
                        <input required type="text" name="name"  class="form-control" placeholder="Introduza o nome">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Introduza um email válido">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Contacto</label>
                        <input required type="tel" name="contact" class="form-control" placeholder="Introduza número telefonico">
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12 col-lg-6">

                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($subscribed as $sub) : ?>
    <div class="modal fade" id="edit-contact-<?= $sub->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo contacto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(url_to('update_contact')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Nome</label>
                        <input required type="text" name="name"  class="form-control" placeholder="Introduza o nome" value="<?= $sub->name ?>">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Introduza um email válido" value="<?= $sub->email ?>">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Contacto</label>
                        <input required type="tel" name="contact" class="form-control" placeholder="Introduza número telefonico" value="<?= $sub->contact ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12 col-lg-6">

                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm" name="id" value="<?=$sub->id?>">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete-contact-<?= $sub->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_contact')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $sub->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php endforeach; ?>


<?= $this->endSection() ?>