<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/fontawesome/css/all.min.css") ?>">
    <script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




    <title>Pesca</title>

    <style>
        @media (max-width: 767px) {
            .carousel-image {
                height: 350px;
            }

        }

        @media (max-height:350px) {
            .navbar {
                background-color: darkred;
            }
        }

        .carousel-caption {
            top: 55%;
            transform: translateY(-50%);

        }

        .carousel-image {
            opacity: 0.9;
        }

        .carousel-title {
            font-size: 30px;

        }

        .card-image {
            width: 100%;
            height: auto;
            position: sticky;
            top: 50%;

        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .transparent-bottom {
            position: relative;
        }

        .transparent-bottom::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            /* altura da transparência na parte inferior */
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.5));
        }
    </style>
</head>

<body>

    <section>
        <nav class="navbar navbar-expand-md bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" style="font-weight: bold;" href="javascript:void()">Pesca</a>
                <button class="navbar-toggler bg-light btn-sm " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#carousel"><i class="fa-solid fa-house"></i> Pesca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#information"><i class="fa-solid fa-circle-info"></i> Informações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#regulamentation"><i class="fa-brands fa-docker"></i> Regulamentações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#contact"><i class="fa-solid fa-envelope"></i> Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= url_to('login') ?>"><i class="fa-solid fa-right-to-bracket"></i> Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>



    <section id="carousel" class="pb-4">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: none;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="<?= base_url('assets/image/f1.jpeg') ?>" class="d-block w-100 carousel-image" alt="..." height="550px">
                    <div class="carousel-caption d-none d-md-block text-center">
                        <h1 class="carousel-title">Chamada de atenção para a importância da proteção de algumas espécies marinhas que estão em via de extinção e são protegidas por lei.</h1>
                        <p> Nossos oceanos abrigam uma grande diversidade de habitats e seres vivos, e é nosso dever garantir a sua sustentabilidade e saúde para as gerações futuras.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="<?= base_url('assets/image/f2.jpeg') ?>" class="d-block w-100 carousel-image" alt="..." height="550px">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="carousel-title">Espécies protegidas por lei.</h1>
                        <p>Em caso da sua captura devem ser devolvidas ao seu habitati.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="<?= base_url('assets/image/f3.jpeg') ?>" class="d-block w-100 carousel-image" alt="..." height="550px">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="carousel-title">Aumente a conscientização sobre a importância da proteção da vida aquática.</h1>
                        <p>Por meio de educação e engajamento, podemos preservar os habitats, evitar a pesca durante o periodo de veda, para garantir a reprodução e o crescimento dos juvenis.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </section>

    <div class="b-example-divider"></div>

    <section class="mt-4" id="information">
        <div class="container">
            <div class="row align-items-center">
                <?php foreach ($notices as $n) : ?>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;"><?= strtoupper($n->title) ?></h5>
                                        <p class="card-text  text-truncate" style="max-width: 900px;"><?= $n->description ?></p>
                                        <p class="card-text"><small class="text-muted" style="font-size: small; font-style: italic;">Por <?= $n->username . ' aos ' . date('d/m/Y H:i', strtotime($n->created_at)) ?></small></p>
                                        <a class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#read-more-<?= $n->id ?>"> Ver mais... <i class="fa-brands fa-readme"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="data:image/jpeg;png;jpg;base64,<?= base64_encode(file_get_contents(WRITEPATH . 'notices/' . $n->image)) ?>" class="card-image rounded-start " alt="...">
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="read-more-<?= $n->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="image-container">
                                            <img class="rounded-3 transparent-bottom center" src="data:image/jpeg;png;jpg;base64,<?= base64_encode(file_get_contents(WRITEPATH . 'notices/' . $n->image)) ?>" alt="Imagem" sizes="" srcset="" height="auto" width="500px">
                                        </div>

                                        <h3 class="pt-3"><?= $n->title ?></h3>
                                        <p class="" style=" text-align: justify;"><?= $n->description ?></p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal"> <i class="fa fa-close" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="bg-light pt-4" id="regulamentation">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading" style="text-transform: uppercase;">Documentos e Regulamentações</h4>
                <p>Aqui estão disponíveis documentos que regulam todas actividades da pesca, podem ser baixados a qualquer momento.</p>
            </div>

            <?php foreach ($session as $sess) : ?>
                <div class="accordion accordion-flush" id="accordionFlushExample-<?= $sess->id ?>">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne-<?= $sess->id ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?= $sess->id ?>" aria-expanded="false" aria-controls="flush-collapseOne-<?= $sess->id ?>">
                                <?= strtoupper($sess->title) ?>
                            </button>
                        </h2>
                        <div id="flush-collapseOne-<?= $sess->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne-<?= $sess->id ?>" data-bs-parent="#accordionFlushExample-<?= $sess->id ?>">
                            <div class="accordion-body"><?= $sess->description ?> | <?= $sess->file_name . '#' . $sess->file ?>
                                <a class="btn btn-primary btn-sm" download="<?= $sess->file ?>" href="data:file/pdf;docx;xlsx;base64,<?= base64_encode(file_get_contents(WRITEPATH . 'sessionfiles/' . $sess->file)) ?>">Baixar <i class="fa-solid fa-file-arrow-down"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-4 bg-light">
        <div class="container pt-4 pb-4">

            <div class="section-title" data-aos="zoom-out">
                <h2 class="text-success">Contacto</h2>
                <p>Contact nos</p>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4><i class="fa-solid fa-map-location-dot"></i> Localização:</h4>
                            <p>Av, Karl Max, Beira, Matacuane</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4><i class="fa-solid fa-envelope"></i> Email:</h4>
                            <p>info@pesca.co.mz</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4><i class="fa-solid fa-phone"></i> Telefone:</h4>
                            <p>+ 258 84 123 4567</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    <?php echo form_open(url_to('contact_us'), 'class="php-email-form" role="form" id="form-contact"') ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Seu nome" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="sent-message">Obrigado por nos contactar!</div>
                        <p id="message" style="font-weight: bold;"></p>
                    </div>
                    <div class="text-center "><button class="btn btn-primary" id="btn-submit-contact" type="submit">Enviar Mensagem <i class="fa-solid fa-paper-plane"></i></button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
    <section class="mt-3">
        <div class="container">
            <h4>Assine aqui para receber informações a qualquer momento.</h4>
            <?php echo form_open(url_to('subscriber'), 'id="form-newsletter1"') ?>
            <div class="row g-3">
                <div class="col-lg-4 col-md-12">
                    <input required type="text" name="name" class="form-control" placeholder="Seu nome" aria-label="First name">
                </div>
                <div class="col-lg-3 col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Seu email" aria-label="Last name">
                </div>
                <div class="col-lg-3 col-md-12">
                    <input required type="number" name="contact" min="0" minlength="9" maxlength="9" class="form-control" placeholder="Seu número do telemóvel" aria-label="Last name">
                </div>
                <div class="col-lg-2 col-md-12">
                    <button class="btn btn-warning" type="submit" id="button-addon2">Subscrever-se <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
            <p id="msg"></p>

            <?php echo form_close() ?>
        </div>
    </section>

    <section class="mt-5">
        <div class="b-example-divider"></div>
        <div class="container-fluid">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Pesca</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"> <i class="fa-brands fa-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </footer>
        </div>

    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script>
        $(document).ready(function() {
            $('#form-contact').submit(function(event) {
                event.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    url: this.action,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        $('#message').text(response.message);
                        if (response.type == 'success') {
                            $('#message').css({
                                'color': 'green'
                            });
                        } else {
                            $('#message').css({
                                'color': 'red'
                            });
                        }

                    },
                    error: function(response) {
                        $('#message').text(response.message);
                        $('#message').css({
                            'color': 'red'
                        });
                    }
                })


            });

            $('#form-newsletter').submit(function(event) {
                event.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    url: this.action,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        $('#msg').text(response.message);
                        if (response.type == 'success') {
                            $('#msg').css({
                                'color': 'green'
                            });
                        } else {
                            $('#msg').css({
                                'color': 'red'
                            });
                        }

                    },
                    error: function(response) {
                        $('#msg').text(response.message);
                        $('#msg').css({
                            'color': 'red'
                        });
                    }
                });
            });

        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            // if (scroll > 500) {
            //     $('.navbar').addClass("bg-dark");
            // } else {
            //     $('.navbar').removeClass("bg-dark");
            // }
        });



        // Recolher o menu ao clicar em um link
        var navbarToggler = document.querySelector('.navbar-toggler');
        var navbarCollapse = document.querySelector('.navbar-collapse');

        navbarCollapse.addEventListener('click', function() {
            navbarToggler.click();
        });
    </script>

    <!-- <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/bootstrap/fontawesome/js/all.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>