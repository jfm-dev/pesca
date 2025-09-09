<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Departamentos
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Departamentos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Departamentos</li>
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
                    Novo departamento
                </h3>
                <a href="<?= url_to('list_users') ?>" class="btn btn-success btn-xs float-lg-right mr-2" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>><i class="fa fa-eye" aria-hidden="true"></i> Usuários</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <?php echo form_open(url_to('save_department')); ?>

                        <div class="form-group col-md-12">
                            <label for="Name">Nome</label>
                            <input name="name" type="text" class="form-control form-control-sm" id="Name" placeholder="Nome do departamento" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Address">Descrição</label>
                            <textarea class="form-control form-control-sm" name="description" id="" cols="30" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>>Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                        <?= form_close(); ?>
                    </div>
                    <div class="pl-lg-2 col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de departamentos</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($departments as $dep) : ?>
                                            <tr>
                                                <td><?= $dep->id ?></td>
                                                <td><?= $dep->name ?></td>
                                                <td><?= $dep->description ?></td>
                                                <td>
                                                    <button class="btn" data-toggle="modal" data-target="#category-user-<?= $dep->id ?>" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>> <i class="fa fa-user text-success" aria-hidden="true"></i></button>
                                                    <button class="btn" data-toggle="modal" data-target="#category-update-<?= $dep->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                                    <button class="btn" data-toggle="modal" data-target="#category-delete-<?= $dep->id ?>" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<?php foreach ($departments as $sc) : ?>
    <div class="modal fade" id="category-delete-<?= $sc->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_category')); ?>
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

<?php foreach ($departments as $sc) : ?>
    <div class="modal fade" id="category-user-<?= $sc->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Funcionários do departamento - <?=$sc->name?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                <div class="modal-body">
                    <div class="form-group">
                     <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered example2">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $u):
                                    if($u->departmentid == $sc->id):?>
                                <tr class="">
                                    <td scope="row"><?=$u->name?></td>
                                </tr>
                                <?php endif; endforeach;?>
                            </tbody>
                        </table>
                     </div>
                     
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-close" aria-hidden="true"></i></button>
                   
                </div>
              
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>

<?php foreach ($departments as $sc) : ?>
    <div class="modal fade" id="category-update-<?= $sc->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('update_category')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label for="Name">Nome</label>
                            <input value="<?= $sc->name ?>" name="name" type="text" class="form-control form-control-sm" id="Name" placeholder="Nome da categoria" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Address">Descrição</label>
                            <textarea class="form-control form-control-sm" name="description" id="" cols="30" rows="5"><?= $sc->description ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $sc->id ?>" type="submit" class="btn btn-primary">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>