<?php
$user_tp = "Willian.Gabriel";
$id_user = "084470";

// dados do usuario

$imagenUser = "../assets/img/elements/12.jpg";
$instEnsino = "Minha Escola ";
$nomeCompleto = "Gabriel Willian Paiva Martins";
$dataNascimento = "23/04/2001";
$pontosUser = 54544;
$userFrase = "\"Ensinar não é transferir conhecimento e sim criar as possibilidades de apreensão ~ Paulo Freire\"";


// frases de avaliação dos professores

$fraseprof1 = "frase professor 01";
$dataprof1 = "04/10/2022";
$prof1 = "professor 01";

$fraseprof2 = "frase professor 02";
$dataprof2 = "04/10/2022";
$prof2 = "professor 02";

$fraseprof3 = "frase professor 03";
$dataprof3 = "04/10/2022";
$prof3 = "professor 03";

// certificado
$certificado01 = "Inglês Way";
$dataInicio01 = "15/12/2022";
$dataFim01 = "16/01/2023";
$hashCertfificado01 = "4dass-23ad-46sd-458a-87wer-45ax";
$porcCurso01 = "100%";

$certificado02 = "Espanhol - NV2";
$dataInicio02 = "15/12/2022";
$dataFim02 = "16/01/2023";
$hashCertfificado02 = "4dass-23ad-46sd-458a-87wer-45ax";
$porcCurso02 = "97%";

$certificado03 = "Gramática portuguesa para concursos";
$dataInicio03 = "15/12/2022";
$dataFim03 = "16/01/2023";
$hashCertfificado03 = "4dass-23ad-46sd-458a-87wer-45ax";
$porcCurso03 = "45%";


// medalhas - pode-se adicionar até 06 medalhas

$medalha01 = "Estudioso NV1";
$descmedal01 = "Cumpriu os estudos pendentes, de todas as matérias relacionadas.";

$medalha02 = "Persistente NV1";
$descmedal02 = "Medalha de persistência ao exercicios com maior dificuldade.";

$medalha03 = "Determinado NV2";
$descmedal03 = "Permanência nos conteúdos mais dificeis da plataforma.";

$medalha04 = "Focado NV3";
$descmedal04 = "Foco, execicio, simulado, estudos. #bora_continuar";

$medalha05 = "Resiliente NV1";
$descmedal05 = "Medalha de resiliência e mérito";

$medalha06 = "Pontual NV2";
$descmedal06 = "Entregou todos os trabalhos a tempo";

// cadernos dos usuarios
$caderno01 = "Escolar";
$idCaderno01 = "3544";
$descricaoCad01 = "Este é meu caderno pessoal escolar, e me ajuda nas minhas atividades escolares";
$imagemCad01 = "../assets/img/elements/12.jpg";
$dataCriacaoCaderno01 = "10/10/2022";

$caderno02 = "Curso de inglês";
$idCaderno02 = "4554";
$descricaoCad02 = "Caderno do cursinho de inglês Alfa, administrado pelos professores Maria e João.";
$imagemCad02 = "../assets/img/elements/17.jpg";
$dataCriacaoCaderno02 = "10/10/2021";

?>
<!DOCTYPE html>

<!-- =========================================================
* Tope app 1.0 - plataforma de estudos
==============================================================

* Product Page: a definir
* Created by: @lol.gabriel
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright Goovel

=========================================================
-->
<!-- beautify ignore:start -->
<html
lang="pt-BR"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../assets/"
data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />

  <title>Tope app - área do aluno</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
  />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg
              width="25"
              viewBox="0 0 25 42"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              >
              <defs>
                <path
                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                id="path-1"
                ></path>
                <path
                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                id="path-3"
                ></path>
                <path
                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                id="path-4"
                ></path>
                <path
                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                id="path-5"
                ></path>
              </defs>
              <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                  <g id="Icon" transform="translate(27.000000, 15.000000)">
                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                      <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                      </mask>
                      <use fill="#696cff" xlink:href="#path-1"></use>
                      <g id="Path-3" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-3"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                      </g>
                      <g id="Path-4" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-4"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                      </g>
                    </g>
                    <g
                    id="Triangle"
                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                    >
                    <use fill="#696cff" xlink:href="#path-5"></use>
                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Tope</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>
<?php require_once "Classes/Menu.php";
$c3 =  new Menu;
$c3->ExibirMenu(); ?>
</aside>
<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar"
  >
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Buscar na plataforma..."
        aria-label="Search..."
        />
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- mostrar ranking. -->
      <li class="nav-item lh-1 me-3">
        <a
        class="github-button"
        href="https://github.com/themeselection/sneat-html-admin-template-free"
        data-icon="octicon-star"
        data-size="large"
        data-show-count="true"
        aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
        >posição</a
        >
      </li>

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">John Doe</span>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Settings</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <span class="d-flex align-items-center align-middle">
                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                <span class="flex-grow-1 align-middle">Billing</span>
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
              </span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="auth-login-basic.html">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>

<!-- / Navbar -->
 <!-- modal de manutenção -->

                         <!-- Modal -->
                         <div class="modal fade" id="manutencao" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <!-- <h5 class="modal-title" id="modalCenterTitle">Manutenção</h5> -->
                                 <p>*questões</p> <br>
                                 <button
                                   type="button"
                                   class="btn-close"
                                   data-bs-dismiss="modal"
                                   aria-label="Close"
                                 ></button>
                               </div>
                               <div class="modal-body">
                                 <div class="row">
                                   <div class="col mb-3">
                                  <img src="../assets/img/backgrounds/manutencao.gif" alt="">
                                   </div>
                                 </div>

                               </div>
                               <div class="modal-footer">

                                     <h5 class="modal-title" id="modalCenterTitle">Retornaremos em:</h5>
                                    <!-- adicionar código da contagem regressiva -->
                                    <div id="demo"></div>


                               </div>
                             </div>
                           </div>
                         </div>


                         <!-- fim do modal de manutenção -->
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Layout Demo -->
    <!--
    ██ ███    ██ ██  ██████ ██  ██████
    ██ ████   ██ ██ ██      ██ ██    ██
    ██ ██ ██  ██ ██ ██      ██ ██    ██
    ██ ██  ██ ██ ██ ██      ██ ██    ██
    ██ ██   ████ ██  ██████ ██  ██████
  -->


  <!-- <div class="col-md-6 col-xl-4">
  <div class="card mb-3">
  <div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">
  This is a wider card with supporting text below as a natural lead-in to additional content. This
  content is a little bit longer.
</p> -->
<!-- <p class="card-text">
<small class="text-muted">Last updated 3 mins ago</small>
</p>
</div>
<img class="card-img-bottom" src="../assets/img/elements/1.jpg" alt="Card image cap" />



</div>
<h1>sdad</h1>
</div> -->

<!-- Horizontal -->
<h5 class="pb-1 mb-4">Meu Portfólio</h5>
<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="<?php echo $imagenUser; ?>" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <center>  <h5 class="card-title"> <h1> <?php echo $nomeCompleto ?></h1></h5> </center>
            <p class="card-text"> <ul>


              <li>     <?php echo "<b>Usuário:</b> $user_tp  <br>"; ?></li>
              <li> <b>Id do Usuário</b> <?php echo "$id_user"; ?> </li>
              <li> <b> Data de Nascimento:</b> <?php echo $dataNascimento; ?> </li>
              <li> <b>Instituição de ensino:</b> <?php echo "$instEnsino"; ?> </li>
              <li><?php echo "<b>Pontos: </b>" . $pontosUser . " 🏆"; ?></li>
            </ul>
          </p>
          <center>   <p class="card-text"><small class="text-muted"><?php echo "$userFrase"; ?></small></p></center>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Masonry -->
<center>  <h4 class="pb-1 mb-4 text-muted">~ Avaliações ~</h4> </center>
<div class="row" data-masonry='{"percentPosition": true }'>

  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card p-3">
      <figure class="p-3 mb-0">
        <blockquote class="blockquote">
          <p><?php echo "\"$fraseprof1\""; ?></p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
          <?php echo "$dataprof1 ~ "; ?> <cite title="Source Title"><?php echo "$prof1"; ?></cite>
          <br>
        </figcaption>
      </figure>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card p-3">
      <figure class="p-3 mb-0">
        <blockquote class="blockquote">
          <p><?php echo "\" $fraseprof2\""; ?></p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
          <?php echo "$dataprof2 ~"; ?><cite title="Source Title"><?php echo "$prof2"; ?></cite>
        </figcaption>
      </figure>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card p-3">
      <figure class="p-3 mb-0">
        <blockquote class="blockquote">
          <p><?php echo "$fraseprof3"; ?></p>
        </blockquote>
        <figcaption class="blockquote-footer mb-0 text-muted">
          <?php echo "$dataprof3 ~ "; ?> <cite title="Source Title"><?php echo "$prof3"; ?></cite>
        </figcaption>
      </figure>
    </div>
  </div>

</div>
<!--/ Card layout -->

<!-- Horizontal -->
<h5 class="pb-1 mb-4">Meus Cadernos:.</h5>
<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="<?php echo $imagemCad01; ?>" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo "$caderno01" . " - " . "$idCaderno01"; ?></h5>
            <p class="card-text">
              <?php echo "$descricaoCad01"; ?>
            </p>
            <p class="card-text"><small class="text-muted">Criado em: <?php echo "$dataCriacaoCaderno01"; ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo "$caderno02" . " - " . "$idCaderno02"; ?></h5>

            <p class="card-text">
              <?php echo "$descricaoCad02"; ?>
            </p>
            <p class="card-text"><small class="text-muted">Criado em: <?php echo "$dataCriacaoCaderno01"; ?></small></p>

            <!--/ barra de carregamento -->
          </div>
        </div>
        <div class="col-md-4">
          <img class="card-img card-img-right" src="<?php echo $imagemCad02; ?>" alt="Card image" />
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Horizontal -->
<!-- barra de carregamento -->

<div class="card mb-4">

  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <h2>🎓<?php echo $certificado01 . " - " . $porcCurso01; ?></h2>
      <p> <b>data de inicio</b> <?php echo $dataInicio01; ?> </p>
      <p> <b>data de término</b> <?php echo $dataFim01 ?> </p>
      <p> <b><?php echo $hashCertfificado01; ?></b> </p>
      <div class="progress">

        <div
        class="progress-bar progress-bar-striped bg-primary"
        role="progressbar"
        style="width: <?php echo $porcCurso01; ?>"
        aria-valuenow="20"
        aria-valuemin="0"
        aria-valuemax="100"
        ></div>
      </div>
    </div>
  </div>

</div>
<div class="card mb-4">

  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <h2>🎓<?php echo $certificado02 . " - " . $porcCurso02; ?></h2>
      <p> <b>data de inicio</b> <?php echo $dataInicio02; ?> </p>
      <p> <b>data de término</b> <?php echo $dataFim02 ?> </p>
      <p> <b><?php echo $hashCertfificado02; ?></b> </p>
      <div class="progress">

        <div
        class="progress-bar progress-bar-striped bg-primary"
        role="progressbar"
        style="width: <?php echo $porcCurso02; ?>"
        aria-valuenow="20"
        aria-valuemin="0"
        aria-valuemax="100"
        ></div>
      </div>
    </div>
  </div>
</div>
<div class="card mb-4">

  <div class="card-body">
    <div class="demo-vertical-spacing demo-only-element">
      <h2>🎓<?php echo $certificado03 . " - " . $porcCurso03; ?></h2>
      <p> <b>data de inicio</b> <?php echo $dataInicio03; ?> </p>
      <p> <b>data de término</b> <?php echo $dataFim03 ?> </p>
      <p> <b><?php echo $hashCertfificado03; ?></b> </p>
      <div class="progress">

        <div
        class="progress-bar progress-bar-striped bg-primary"
        role="progressbar"
        style="width: <?php echo $porcCurso03; ?>"
        aria-valuenow="20"
        aria-valuemin="0"
        aria-valuemax="100"
        ></div>
      </div>
    </div>
  </div>
</div>
<!-- Grid Card -->
<center>  <h4 class="pb-1 mb-4 text-muted">~ Medalhas adquiridas ~</h4> </center>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap" />
      <div class="card-body">
        <center>   <h5 class="card-title">🏅 <?php echo $medalha01; ?></h5></center>
        <p class="card-text">
          <?php echo $descmedal01;  ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="../assets/img/elements/13.jpg" alt="Card image cap" />
      <div class="card-body">
        <center>   <h5 class="card-title">🏅 <?php echo $medalha02; ?></h5></center>
        <p class="card-text">
          <?php echo $descmedal02;  ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="../assets/img/elements/4.jpg" alt="Card image cap" />
      <div class="card-body">
        <center>   <h5 class="card-title">🏅 <?php echo $medalha03; ?></h5></center>
        <p class="card-text">
          <?php echo $descmedal03;  ?>
        </p>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card h-100">
      <img class="card-img-top" src="../assets/img/elements/18.jpg" alt="Card image cap" />
      <div class="card-body">
        <h    <center>   <h5 class="card-title">🏅 <?php echo $medalha04; ?></h5></center>
          <p class="card-text">
            <?php echo $descmedal04;  ?>
          </p>



        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img class="card-img-top" src="../assets/img/elements/19.jpg" alt="Card image cap" />
        <div class="card-body">
          <center>   <h5 class="card-title">🏅 <?php echo $medalha05; ?></h5></center>
          <p class="card-text">
            <?php echo $descmedal05;  ?>
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img class="card-img-top" src="../assets/img/elements/20.jpg" alt="Card image cap" />
        <div class="card-body">
          <center>   <h5 class="card-title">🏅 <?php echo $medalha06; ?></h5></center>
          <p class="card-text">
            <?php echo $descmedal06;  ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Horizontal -->





<!--
███████ ██ ███    ███
██      ██ ████  ████
█████   ██ ██ ████ ██
██      ██ ██  ██  ██
██      ██ ██      ██ -->




<!--/ Layout Demo -->
</div>
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      ©
      <script>
      document.write(new Date().getFullYear());
      </script>
      , desenvolvido ❤️ por
      <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Gabriel Willians</a>
    </div>
    <div>
      <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
      <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">ajuda</a>

      <a
      href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
      target="_blank"
      class="footer-link me-4"
      >Documentation</a
      >

      <a  href="ajuda.php" class="footer-link me-4">suporte</a>
    </div>
  </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now">
  <a href="publico.php"class="btn btn-danger btn-buy-now">Atividades</a>
</div>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<!-- Main JS -->
<script src="../assets/js/main.js"></script>
  <script src="../assets/vendor/js/manutencao.js"></script>
<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>