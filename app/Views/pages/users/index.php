<!-- app/Views/dashboard.php -->
<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
Usuários
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuários</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
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
        <?php elseif (!empty(session('danger'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show msgalert" role="alert">
                <?php foreach (session('danger') as $error) : ?>
                    <?= $error ?><br>
                <?php endforeach; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de usuários</h3>
                <button type="button" class="btn btn-success btn-xs float-lg-right " data-toggle="modal" data-target="#new-user">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo usuário
                </button>
                <a href="<?= url_to('list_departments') ?>" class="btn btn-success btn-xs float-lg-right mr-2"><i class="fa fa-eye" aria-hidden="true"></i> Departamentos</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuário</th>
                            <th>Nome</th>
                            <th>Género</th>
                            <th>Data nascimento</th>
                            <th>Nível escolar</th>
                            <th>Departamento</th>
                            <th>Nível</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <td><?= $u->id ?></td>
                                <td><?= $u->username ?></td>
                                <td><?= $u->name ?></td>
                                <td><?= $u->gender ?></td>
                                <td><?= $u->born_day ?></td>
                                <td><?= $u->school_level ?></td>
                                <td><?= $u->department ?></td>
                                <td><?= $u->level ?></td>
                                <td><?= $u->contact ?></td>
                                <td><?= $u->email ?></td>
                                <td><?php if ($u->status == 1) : echo "Activo";
                                    else : echo "Desactivado";
                                    endif ?></td>
                                <td>
                                    <button type="button" class="btn btn-xs " data-toggle="modal" data-target="#edit-user-<?= $u->id ?>">
                                        <i class="fa fa-edit text-primary" aria-hidden="true"></i>
                                    </button>
                                    <button <?php if ($u->id == 1) : echo 'hidden';
                                            endif; ?> class="btn" data-toggle="modal" data-target="#user-delete-<?= $u->id ?>">
                                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-xs " data-toggle="modal" data-target="#edit-passowrd-<?= $u->id ?>">
                                        <i class="fa fa-lock text-warning" aria-hidden="true"></i>
                                    </button>
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


<div class="modal fade" id="new-user" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open(url_to('save_user')); ?>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="NameS">Nome</label>
                            <input required name="name" type="text" class="form-control" id="NameS" placeholder="Nome completo" value="<?= old('name') ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="User">Data de nascimento</label>
                            <input required name="born_day" type="date" class="form-control" id="BornDay" max="2010-01-01" placeholder="" value="<?= old('born_day') ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="User">Género</label>
                            <select class="form-control" required name="gender">
                                <option value="" selected disabled>--Escolher--</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="User">Nível escolar</label>
                            <select class="form-control" required name="school_level">
                                <option value="" selected disabled>--Escolher--</option>
                                <option value="Básico">Básico</option>
                                <option value="Médio">Médio</option>
                                <option value="Profissional">Profissional</option>
                                <option value="Superior">Superior</option>
                                <option value="Mestre">Mestre</option>
                                <option value="PHD">PHD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="User">Usuário</label>
                            <input required name="username" type="text" class="form-control" id="User" placeholder="Nome do usuário" value="<?= old('user') ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="Password">Senha</label>
                            <input required name="password" type="password" class="form-control" id="Password" placeholder="Introduza a senha" minlength="4">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="ConfirmPassword">Confirmar senha</label>
                            <input required name="confirmpassword" type="password" class="form-control" id="ConfirmPassword" placeholder="Confirme a sua senha" minlength="4">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input required name="email" type="email" class="form-control" id="Email" placeholder="Email do usuário" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="Contact">Contacto</label>
                            <input required name="contact" type="text" class="form-control" id="Contact" placeholder="Introduza o contacto" value="<?= old('contact') ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="Status">Estado</label>
                        <select required id="Status" name="status" class="form-control select2bs4" style="width: 100%;">
                            <option value="1">Activo</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- /.card-header -->
                        <label for="Departemnt">Departamento</label>
                        <select id="Departemnt" name="department" required class="form-control select2bs4" style="width: 100%;">
                            <?php foreach ($departments as $dep) : ?>
                                <option value="<?= $dep->id ?>"><?= $dep->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <!-- /.card-header -->
                        <label for="Level">Nível do usuário</label>
                        <select id="Level" name="user_level" required class="form-control select2bs4" style="width: 100%;">
                            <?php foreach ($levels as $le) : ?>
                                <option value="<?= $le->id ?>"><?= $le->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default  btn-sm" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($users as $u) : ?>
    <div class="modal fade" id="edit-user-<?= $u->id ?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('update_user')); ?>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                <label for="NameS">Nome</label>
                                <input required name="name" type="text" class="form-control" id="NameS" placeholder="Nome completo" value="<?= $u->name ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="User">Data de nascimento</label>
                                <input required name="born_day" type="date" class="form-control" id="BornDay" max="2010-01-01" placeholder="" value="<?= $u->born_day ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="User">Género</label>
                                <select class="form-control" required name="gender">
                                    <option value="" selected disabled>--Escolher--</option>
                                    <option <?php if ($u->gender == "Masculino") : echo "selected";
                                            endif; ?> value="Masculino">Masculino</option>
                                    <option <?php if ($u->gender == "Femenino") : echo "selected";
                                            endif; ?> value="Femenino">Femenino</option>
                                    <option <?php if ($u->gender == "Outro") : echo "selected";
                                            endif; ?> value="Outro">Outro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="User">Nível escolar</label>
                                <select class="form-control" required name="school_level">
                                    <option value="" selected disabled>--Escolher--</option>
                                    <option <?php if ($u->school_level == "Básico") : echo "selected";
                                            endif; ?> value="Básico">Básico</option>
                                    <option <?php if ($u->school_level == "Médio") : echo "selected";
                                            endif; ?> value="Médio">Médio</option>
                                    <option <?php if ($u->school_level == "Profissional") : echo "selected";
                                            endif; ?> value="Profissional">Profissional</option>
                                    <option <?php if ($u->school_level == "Superior") : echo "selected";
                                            endif; ?> value="Superior">Superior</option>
                                    <option <?php if ($u->school_level == "Mestre") : echo "selected";
                                            endif; ?> value="Mestre">Mestre</option>
                                    <option <?php if ($u->school_level == "PHD") : echo "selected";
                                            endif; ?> value="PHD">PHD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="User">Usuário</label>
                                <input required name="username" type="text" class="form-control" id="User" placeholder="Nome do usuário" value="<?= $u->username  ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input name="email" type="email" class="form-control" id="Email" placeholder="Email do usuário" value="<?= $u->email ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="Contact">Contacto</label>
                                <input name="contact" type="text" class="form-control" id="Contact" placeholder="Introduza o contacto" value="<?= $u->contact ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <label for="Status">Estado</label>
                            <select required id="Status" name="status" class="form-control select2bs4" style="width: 100%;">
                                <option <?php if ($u->status == 1) : echo 'selected';
                                        endif; ?> value="1">Activo</option>
                                <option <?php if ($u->status == 0) : echo 'selected';
                                        endif; ?> value="0">Desactivado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- /.card-header -->
                            <label for="Departemnt">Departamento</label>
                            <select id="Departemnt" name="department" required class="form-control select2bs4" style="width: 100%;">
                                <?php foreach ($departments as $dep) : ?>
                                    <option <?php if ($u->department == $dep->id) : echo 'selected';
                                            endif; ?> value="<?= $dep->id ?>"><?= $dep->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <!-- /.card-header -->
                            <label for="Level">Nível do usuário</label>
                            <select id="Level" name="user_level" required class="form-control select2bs4" style="width: 100%;">
                                <?php foreach ($levels as $le) : ?>
                                    <option <?php if ($u->user_level == $le->id) : echo 'selected';
                                            endif; ?> value="<?= $le->id ?>"><?= $le->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default  btn-sm" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="id" value="<?= $u->id ?>" class="btn btn-primary btn-sm">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>

<?php foreach ($users as $u) : ?>
    <div class="modal fade" id="user-delete-<?= $u->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('delete_user')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Deseja eliminar?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button name="id" value="<?= $u->id ?>" type="submit" class="btn btn-primary">Sim <i class="fa fa-save" aria-hidden="true"></i></button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>

<?php foreach ($users as $u) : ?>
    <div class="modal fade" id="edit-passowrd-<?= $u->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mudar senha - <?= $u->name ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open(url_to('update_password')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descount">Nova senha</label>
                        <input required type="text" name="password" minlength="4" id="NovaSenha" onchange="Senhaconfirm()" class="form-control" placeholder="Nova senha">
                        <label for="Descount">Confirmar senha</label>
                        <input required type="text" name="passwordconfirm" minlength="4" id="ConfirmarSenha" class="form-control" placeholder="Confirmar senha">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button name="id" value="<?= $u->id ?>" type="submit" id="UpdateSenha" class="btn btn-primary">Guardar <i class="fa fa-save" aria-hidden="true"></i></button>
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
        // $('#UpdateSenha').attr('disabled', 'disabled');

    });

    imgInput.onchange = evt => {
        const [file] = imgInput.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection() ?>