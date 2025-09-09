  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">

          <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/adminlte/dist/img/avatar5.png') ?>" class="img-circle elevation-5" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= session('userData')->name ?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="<?= url_to('start') ?>" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Painel
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item ">


                  <li hidden class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Outros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= url_to('') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Moeda</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= url_to('') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categorias</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= url_to('') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Unidades</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>>
                      <a href="<?= url_to('list_users') ?>" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Usuários
                          </p>
                      </a>
                  </li>
                  <li class="nav-item" <?php if(session('userData')->user_level != 1): echo 'hidden' ; endif;?>>
                      <a href="<?= url_to('list_departments') ?>" class="nav-link">

                          <i class="nav-icon fa-solid fa-cogs"></i>
                          <p>
                              Departamentos
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= url_to('list_sessions') ?>" class="nav-link">
                          <i class="nav-icon fa-solid fa-circle-info"></i>
                          <p>
                              Regulementações
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= url_to('list_notice') ?>" class="nav-link">
                          <i class="nav-icon fa-solid fa-file-circle-plus"></i>
                          <p>
                              Noticias
                          </p>
                      </a>
                  </li>
                  <li hidden class="nav-item">
                      <a href="<?= url_to('list_message') ?>" class="nav-link">
                          <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                          <p>
                              Mensagens
                          </p>
                      </a>
                  </li>
                  <li  class="nav-item">
                      <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                          <p>
                              Contactos / Mensagens
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?= url_to('list_contacts') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contactos inscritos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?= url_to('list_message') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Mensagens</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>