<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Clientes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Clientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
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
                <h3 class="card-title">Todos clientes</h3>
                <a href="<?= url_to('new_client') ?>" class="btn btn-success btn-xs float-right"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo cliente</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>NUIT</th>
                            <th>Contacto</th>
                            <th>Endereço</th>
                            <th>Email</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><?= $client->id ?></td>
                                <td><?= $client->name ?></td>
                                <td><?= $client->nuit ?></td>
                                <td><?= $client->contact ?></td>
                                <td><?= $client->address ?></td>
                                <td><?= $client->email ?></td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#client-update-<?= $client->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                    <button class="btn" data-toggle="modal" data-target="#client-delete-<?= $client->id ?>"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>NUIT</th>
                            <th>Contacto</th>
                            <th>Endereço</th>
                            <th>Email</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

</div>
</div>

<?php foreach ($clients as $c) : ?>
    <div class="modal fade" id="client-update-<?= $c->id ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('update_client')); ?>
                <div class="modal-body">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Name">Nome</label>
                                <input name="name" type="text" class="form-control" id="Name" placeholder="Nome do cliente" required value="<?= $c->name ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Address">Endereço</label>
                                <input name="address" type="text" class="form-control" id="Address" placeholder="Endereço do cliente" value="<?= $c->address ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Nuit">NUIT</label>
                                <input name="nuit" type="number" class="form-control" id="Nuit" placeholder="NUIT do cliente" value="<?= $c->nuit ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Contact">Contacto</label>
                                <input name="contact" type="number" maxlength="9" class="form-control" id="Contact" placeholder="Contacto do cliente" value="<?= $c->contact ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Email">Email</label>
                                <input name="email" type="email" class="form-control" id="Email" placeholder="Email do cliente" value="<?= $c->email ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                    <button name="id" value="<?= $c->id ?>" type="submit" class="btn btn-primary btn-sm">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($clients as $sc) : ?>
    <div class="modal fade" id="client-delete-<?= $sc->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar serviço</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_client')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $sc->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>