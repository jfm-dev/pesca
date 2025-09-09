<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Mensages
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: none;
    }

    .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Mensages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Mensages</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div id="loading-overlay">
    <div class="spinner"></div>
</div>

<!-- Your page content -->
<div id="content">
    <!-- Content goes here -->
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
                <h3 class="card-title">Mensagens disponíveis</h3>
                <button type="button" class="btn btn-success btn-sm float-lg-right" data-toggle="modal" data-target="#new-message">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nova mensagem
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mensagem</th>
                            <th>Tipo</th>
                            <th>Estado do envio</th>
                            <th>Autor</th>
                            <th>Data</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $m) : ?>
                            <tr>
                                <td><?= $m->id ?></td>
                                <td> <?= $m->message ?></td>
                                <td><?= $m->type ?></td>
                                <td> <?php if ($m->send == 0) : echo 'Não enviada';
                                        else : echo 'Enviada (' . $m->send . ' vezes)';
                                        endif; ?></td>
                                <td><?= $m->username ?></a> </td>
                                <td><?= date("d/m/Y", strtotime($m->created_at)) ?></td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#edit-message-<?= $m->id ?>"> <i class="fa fa-edit text-primary" aria-hidden="true"></i></button>
                                    <button class="btn" data-toggle="modal" data-target="#delete-message-<?= $m->id ?>"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                    <select name="send" class="form-control-sm" onchange="Send(this)">
                                        <option value="0">--Escolher--</option>
                                        <option value="<?= $m->id ?>">Enviar</option>
                                    </select>
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
<div class="modal fade" id="new-message" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova menssagem</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(url_to('save_message')); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <label>Mensagem</label>
                        <textarea required class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <label>Tipo de envio</label>
                        <select name="type" class="form-control">
                            <option disabled selected value="">--Escolher--</option>
                            <option value="E-mail">E-mail</option>
                            <option value="Mensagem">Mensagem</option>
                            <option value="E-mail e Mensagem">E-mail e Mensagem</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar <i class="fa fa-check-circle" aria-hidden="true"></i></button>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($messages as $m) : ?>
    <div class="modal fade" id="edit-message-<?= $m->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar menssagem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(url_to('update_message')); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <label>Mensagem</label>
                            <textarea required class="form-control" name="message" id="" cols="30" rows="5"><?= $m->message ?></textarea>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <label>Tipo de envio</label>
                            <select name="type" class="form-control">
                                <option disabled selected value="">--Escolher--</option>
                                <option <?php if ($m->type == "E-mail") : echo 'selected';
                                        endif; ?> value="E-mail">E-mail</option>
                                <option <?php if ($m->type == "Mensagem") : echo 'selected';
                                        endif; ?> value="Mensagem">Mensagem</option>
                                <option <?php if ($m->type == "E-mail e Mensagem") : echo 'selected';
                                        endif; ?> value="E-mail e Mensagem">E-mail e Mensagem</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="id" value="<?= $m->id ?>">Guardar <i class="fa fa-check-circle" aria-hidden="true"></i></button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete-message-<?= $m->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar mensagem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_message')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $m->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php endforeach; ?>



<script>
    $(document).ready(function() {

    });

    function Send(value) {
        // alert(value.value);
        if (value.value != 0) {
            $.ajax({
                url: '<?= url_to('send_message') ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    send: 1,
                    id: value.value
                },
                success: function(response) {
                    // Tratar a resposta do servidor
                    alert(response);
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Tratar erros de requisição
                    console.error(error);
                }
            });
        }
    }

    $(document).ready(function() {
        // Show the loading indicator when making AJAX requests
        $(document).ajaxStart(function() {
            $('#loading-overlay').show();
        });

        // Hide the loading indicator when AJAX requests are completed
        $(document).ajaxStop(function() {
            $('#loading-overlay').hide();
        });
    });
</script>


<?= $this->endSection() ?>