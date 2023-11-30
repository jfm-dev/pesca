<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Época pesqueira
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Publicações</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Publicações</li>
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
                <h3 class="card-title">Publicações disponíveis</h3>
                <button type="button" class="btn btn-success btn-sm float-lg-right" data-toggle="modal" data-target="#new-account">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nova publicação
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Data da publicação</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($publications as $p) : ?>
                            <tr>
                                <td><?= $p->id ?></td>
                                <td><?= $p->title ?></td>
                                <td><?= $p->description ?></td>
                                <td><?= date("d/m/Y", strtotime($p->start_date)) ?></a> </td>
                                <td><?= date("d/m/Y", strtotime($p->stop_date)) ?></td>
                                <td><?= date("d/m/Y", strtotime($p->created_at))  ?></td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#add-file-<?= $p->id ?>"> <i class="fa fa-plus-circle text-success" aria-hidden="true"></i></button>
                                    <button class="btn" data-toggle="modal" data-target="#edit-session-<?= $p->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                    <button class="btn" data-toggle="modal" data-target="#session-delete-<?= $p->id ?>" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
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
<div class="modal fade" id="new-account" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova publicação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open(url_to('save_session')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Título</label>
                        <input type="text" name="title" id="" required class="form-control" placeholder="Título da publicação" style="text-transform: uppercase;">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Descrição da época</label>
                        <textarea required class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <label>Data início</label>
                        <input type="date" name="start_date" id="" required class="form-control" placeholder="">
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label>Data Término</label>
                        <input type="date" name="stop_date" id="" required class="form-control" placeholder="">
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm">Criar <i class="fa fa-check-circle" aria-hidden="true"></i></button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($publications as $p) : ?>
    <div class="modal fade" id="add-file-<?= $p->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Ficheiros</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open_multipart(url_to('save_files'),); ?>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">

                                </div>
                                <div class="card-body">
                                    <div id="actions" class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Escolhe o ficheiro(.docx, .pdf, .xls, .png, .jpg)</label>
                                            <input class="form-control" type="file" name="file" id="" size="20" required>
                                            <div id="fileHelpId" class="form-text">Help text</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nome do ficheiro</label>
                                                <input required type="text" class="form-control" name="file_name" id="" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Help text</small>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <textarea class="form-control" name="description" id="" cols="5" rows="2"></textarea>
                                            <button name="id" value="<?= $p->id ?>" type="submit" class="btn btn-primary btn-sm mt-2 float-right">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <?= form_close(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome do ficheiro</th>
                                            <th scope="col">Descrição</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($files as $file): 
                                            if($file->fishing_session == $p->id):
                                            ?>
                                        <tr class="">
                                            <td scope="row"><?=$file->id?></td>
                                            <td><?=$file->file_name?></td>
                                            <td><?=$file->description?></td>
                                            <th>
                                                <a download="<?=$file->file_name?>" href="data:file/pdf;docx;xlsx;base64,<?= base64_encode(file_get_contents(WRITEPATH.'sessionfiles/'.$file->file))?>" class="btn-sm"><i class="fa fa-download text-success" aria-hidden="true"></i></a>
                                                <button type="button" class="btn-sm btn" data-toggle="modal" data-target="#file-session-delete-<?= $file->id ?>"> <i class="fa fa-trash text-danger"></i></button>
                                            </th>
                                        </tr>
                                      <?php endif; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="edit-session-<?= $p->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar publicação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open(url_to('update_session')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Título</label>
                        <input type="text" name="title"  required class="form-control" placeholder="Título da publicação" style="text-transform: uppercase;" value="<?=$p->title?>">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Descrição da época</label>
                        <textarea required class="form-control" name="description"  cols="30" rows="5"><?=$p->description?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <label>Data início</label>
                        <input type="date" name="start_date" max="<?=date_create("d/m/Y")?>" required class="form-control" value="<?=date('m/d/Y')?>">
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label>Data Término</label>
                        <input type="date" name="stop_date" required class="form-control" value="<?=$p->stop_date?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm" name="id" value="<?=$p->id?>">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<?php foreach ($files as $fi) : ?>
    <div class="modal fade" id="file-session-delete-<?= $fi->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar ficheiro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_session_file')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $fi->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>



<?php foreach ($publications as $pub) : ?>
    <div class="modal fade" id="session-delete-<?= $pub->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar publicação</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_session')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $pub->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>




<?= $this->endSection() ?>