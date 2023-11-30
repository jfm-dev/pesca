<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Notícias
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Notícias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Notícias</li>
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
                <h3 class="card-title">Notícias disponíveis</h3>
                <button type="button" class="btn btn-success btn-sm float-lg-right" data-toggle="modal" data-target="#new-notice">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nova notícia
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
                            <th>Imagem</th>
                            <th>Data da publicação</th>
                            <th>Autor</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($notices as $n) : ?>
                            <tr>
                                <td><?= $n->id ?></td>
                                <td><?= $n->title ?></td>
                                <td> <?= $n->description ?></td>
                                <td><?= $n->image ?></a> </td>
                                <td><?= date("d/m/Y", strtotime($n->created_at)) ?></td>
                                <td><?= $n->username  ?></td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#edit-notice-<?= $n->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                    <button class="btn" data-toggle="modal" data-target="#delete-notice-<?= $n->id ?>"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova notícia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(url_to('save_notice')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Título</label>
                        <input type="text" name="title" id="" required class="form-control" placeholder="Título da publicação" style="text-transform: uppercase;">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Descrição</label>
                        <textarea required class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <label>Imagem</label>
                        <input required type="file" name="image" accept="image/*" class="form-control" placeholder="">
                    </div>
                    <div class="col-sm-12 col-lg-6">

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

<?php foreach ($notices as $n) : ?>
    <div class="modal fade" id="edit-notice-<?= $n->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar notícia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(url_to('update_notice')); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <label>Título</label>
                            <input type="text" name="title"  required class="form-control" placeholder="Título da publicação" style="text-transform: uppercase;" value="<?= $n->title ?>">
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <label>Descrição</label>
                            <textarea required class="form-control" name="description"  cols="30" rows="5"><?= $n->description ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <label>Imagem</label>
                            <input type="file" name="image" accept="image/*" class="form-control" placeholder="">
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <input type="hidden" name="file" value="<?= $n->image ?>">
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="id" value="<?=$n->id?>">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete-notice-<?= $n->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar notícia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_notice')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                        <input type="hidden" name="image" value="<?= $n->image ?>">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $n->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>



<script>
    imgInput.onchange = evt => {
        const [file] = imgInput.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection() ?>