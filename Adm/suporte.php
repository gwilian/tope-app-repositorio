<?php
require_once "../app/Classes/Auth.php";
require_once "../app/Classes/CriarCaderno.php";
$c2 = new Auth;
$c2->Conectado();
$user_tp = $_SESSION['sobrenome'] . "." . $_SESSION['nome'];
$id_user = $_SESSION['id'];
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
 lang="en"
 class="light-style layout-menu-fixed"
 dir="ltr"
 data-theme="theme-default"
 data-assets-path="../assets/"
 data-template="vertical-menu-template-free" >
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

   <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

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
               
       <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
       <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       	 viewBox="0 0 359.585 359.585" style="enable-background:new 0 0 359.585 359.585;" xml:space="preserve">
       <g id="XMLID_450_">
       	<path id="XMLID_451_" style="fill:#1F2C47;" d="M78.057,301.043c-2.112,1.484-4.116,0.723-4.88,0.326
       		c-0.763-0.396-2.538-1.597-2.538-4.179v-67.712l60.513-67.74v-30.021l-76.15,85.246c-2.813,3.152-4.362,7.214-4.362,11.438v68.79
       		c0,9.259,5.104,17.661,13.32,21.928c3.602,1.871,7.508,2.795,11.399,2.795c4.986,0,9.946-1.519,14.2-4.509l8.424-5.922
       		l-11.502-16.361L78.057,301.043z"/>
       	<path id="XMLID_452_" style="fill:#1F2C47;" d="M304.581,216.959l-77.788-87.079v30.021l62.153,69.577v67.712
       		c0,2.582-1.775,3.782-2.538,4.179c-0.764,0.396-2.768,1.158-4.88-0.326l-8.424-5.922l-11.502,16.361l8.424,5.922
       		c4.254,2.991,9.214,4.509,14.2,4.509c3.891,0,7.798-0.924,11.399-2.795c8.216-4.267,13.32-12.669,13.32-21.928V228.4
       		C308.946,224.177,307.397,220.115,304.581,216.959z"/>
       	<g id="XMLID_453_">
       		<path id="XMLID_454_" style="fill:#1F2C47;" d="M179.792,359.585l-5.389-3.446c-1.766-1.129-43.252-28.073-43.252-63.624
       			c0-35.138,20.494-63.748,46.657-65.135c0.726-0.038,1.352-0.066,1.983-0.066c3.57,0,7.134,0.513,10.593,1.523
       			c8.017,2.343,15.49,7.396,21.612,14.613c10.445,12.316,16.436,30.199,16.436,49.064c0,35.551-41.486,62.495-43.252,63.624
       			L179.792,359.585z M179.792,247.313c-0.278,0-0.555,0.02-0.831,0.034c-15.376,0.814-27.81,21.074-27.81,45.167
       			c0,17.21,17.486,34.339,28.641,42.936c11.154-8.597,28.641-25.726,28.641-42.936c0-14.201-4.26-27.369-11.688-36.128
       			c-3.581-4.223-7.721-7.111-11.97-8.353C183.138,247.556,181.462,247.313,179.792,247.313z"/>
       	</g>
       	<g id="XMLID_459_">
       		<path id="XMLID_460_" style="fill:#7f81ff;" d="M179.81,10c-11.533,0-84.62,62.685-84.62,125.87
       			c0,21.51,25.754,156.644,25.754,156.644c43.893,0,69.719,0,117.696,0c0,0,25.755-135.131,25.755-156.641
       			C264.395,72.334,190.643,10,179.81,10z M223.522,149.735c-0.892,4.359-2.419,8.486-4.48,12.281
       			c-0.687,1.265-1.434,2.493-2.236,3.68c-3.209,4.75-7.307,8.848-12.057,12.057c-1.187,0.802-2.415,1.549-3.68,2.236
       			c-3.795,2.062-7.922,3.589-12.281,4.481c-2.906,0.594-5.914,0.907-8.996,0.907c-24.652,0-44.637-19.985-44.637-44.637
       			s19.984-44.637,44.637-44.637c3.082,0,6.09,0.313,8.996,0.907c4.359,0.892,8.486,2.419,12.281,4.48
       			c1.897,1.031,3.712,2.195,5.43,3.48c4.01,2.999,7.499,6.656,10.307,10.812c4.813,7.124,7.623,15.712,7.623,24.957
       			C224.429,143.821,224.117,146.829,223.522,149.735z"/>
       		<path id="XMLID_463_" style="fill:#1F2C47;" d="M179.792,195.376c-30.127,0-54.637-24.51-54.637-54.637
       			s24.51-54.638,54.637-54.638c3.699,0,7.4,0.374,11.001,1.11c5.26,1.076,10.323,2.923,15.049,5.49
       			c2.308,1.254,4.543,2.687,6.646,4.259c4.926,3.684,9.166,8.133,12.604,13.224c6.108,9.042,9.337,19.607,9.337,30.555
       			c0,3.697-0.373,7.397-1.108,10.997c-1.078,5.264-2.925,10.326-5.49,15.051c-0.838,1.542-1.759,3.057-2.738,4.507
       			c-3.945,5.839-8.906,10.801-14.745,14.744c-1.443,0.976-2.959,1.896-4.502,2.736c-4.729,2.568-9.792,4.415-15.053,5.491
       			C187.193,195.002,183.492,195.376,179.792,195.376z M179.792,106.102c-19.099,0-34.637,15.538-34.637,34.638
       			c0,19.099,15.538,34.637,34.637,34.637c2.355,0,4.708-0.237,6.991-0.704c3.324-0.68,6.524-1.848,9.512-3.471
       			c0.978-0.531,1.939-1.115,2.854-1.734c3.712-2.507,6.864-5.659,9.371-9.369c0.622-0.922,1.206-1.883,1.736-2.858
       			c1.621-2.984,2.789-6.186,3.47-9.511c0.467-2.281,0.703-4.634,0.703-6.989c0-6.942-2.044-13.637-5.909-19.359
       			c-2.186-3.234-4.88-6.062-8.01-8.402c-1.334-0.997-2.753-1.906-4.217-2.702c-2.985-1.622-6.186-2.79-9.509-3.47
       			C184.5,106.339,182.148,106.102,179.792,106.102z"/>
       	</g>
       	<path id="XMLID_467_" style="fill:#1F2C47;" d="M129.228,282.514h101.128c7.92-42.046,24.039-130.879,24.039-146.641
       		c0-55.3-61.037-108.785-74.631-115.474c-5.884,2.927-23.498,16.183-41.078,37.88c-21.601,26.658-33.496,54.215-33.496,77.591
       		C105.19,151.634,121.308,240.468,129.228,282.514z M246.915,302.514H112.669l-1.549-8.128
       		c-2.654-13.927-25.931-136.69-25.931-158.516c0-37.065,21.923-71.057,40.314-93.045C139.353,26.268,166.342,0,179.81,0
       		c13.191,0,40.127,26.174,54.007,42.672c18.512,22.004,40.578,56.034,40.578,93.201c0,21.825-23.277,144.587-25.932,158.513
       		L246.915,302.514z"/>
       </g><g></g><g></g><g>  </g><g>  </g>  <g></g><g>  </g>  <g></g><g>  </g>  <g>  </g><g></g><g></g><g></g>  <g>  </g><g></g><g>  </g>
       </svg>

         </span>

         <span class="app-brand-text demo menu-text fw-bolder ms-2"> Tope</span>
       </a>

       <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
         <i class="bx bx-chevron-left bx-sm align-middle"></i>
       </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
 <!-- Dashboard -->
 <li class="menu-item ">
  <a href="index.php" class="menu-link">
    <i class="menu-icon tf-icons bx bxs-home"></i>
    <div data-i18n="Analytics">Inicio</div>
  </a>
 </li>

 <li class="menu-item active">
  <a href="suporte.php" class="menu-link">
    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
    <div data-i18n="Analytics">Suporte</div>
  </a>
 </li>


 </ul>
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
         placeholder="Pesquisar..."
         aria-label="Pesquisar..."
         />
       </div>
     </div>
     <!-- /Search -->

     <ul class="navbar-nav flex-row align-items-center ms-auto">
       <!-- Place this tag where you want the button to render. -->


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
                   <span class="fw-semibold d-block"><?php echo $user_tp; ?></span>
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
               <span class="align-middle">Perfil</span>
             </a>
           </li>

           <li>
             <a class="dropdown-item" href="#">
               <span class="d-flex align-items-center align-middle">
                 <i class="flex-shrink-0 bx bx-chat"></i>
                 <span class="flex-grow-1 align-middle">&nbsp Mensagens</span>
                 <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
               </span>
             </a>
           </li>
           <li>
             <div class="dropdown-divider"></div>
           </li>
           <li>
             <a class="dropdown-item" href="auth-login-basic.html" data-bs-toggle="modal"
                           data-bs-target="#modalCenter">
               <i class="bx bx-power-off me-2"></i>
               <span class="align-middle">Sair</span>
             </a>
           </li>
         </ul>
       </li>
       <!--/ User -->
     </ul>
   </div>
 </nav>

 <!-- / Navbar -->

 <!-- Modal -->
                         <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="modalCenterTitle">Sair</h5>
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
                                   <p>Tem certeza que deseja sair do app?</p>
                                   </div>
                                 </div>

                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                   Fechar
                                 </button>
                                 <form class="" action="a/auth2.php" method="post">
                                 <button type="submit" class="btn btn-primary">Sair do app</button>
                                 <input type="hidden" name="id_post" value="3">
                                   </form>
                               </div>
                             </div>
                           </div>
                         </div>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
        <!--
            ██ ███    ██ ██  ██████ ██  ██████
            ██ ████   ██ ██ ██      ██ ██    ██
            ██ ██ ██  ██ ██ ██      ██ ██    ██
            ██ ██  ██ ██ ██ ██      ██ ██    ██
            ██ ██   ████ ██  ██████ ██  ██████
        -->


                    <div class="container-xxl flex-grow-1 container-p-y">
                      <!-- Layout Demo -->
                      <div class="container-xxl container-p">
                <div class="row">

                     
                      <div class="col-lg-6 mb-4 mb-xl-0">
                      <div class="demo-inline-spacing mt-3">
                        <div class="list-group">

                         <?php
                          require_once "Classes/Adm.php";
                          $c2 = new Adm;
                          $c2->ListarChamados();
                          ?>
                          <!-- <a href="editar_chamado.php" class="list-group-item list-group-item-action ">Bear claw cake biscuit</a> -->
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                </div>

         <!--

  ███████ ██ ███    ███     ██████   ██████       ██████  ██████  ██████  ██  ██████   ██████
  ██      ██ ████  ████     ██   ██ ██    ██     ██      ██    ██ ██   ██ ██ ██       ██    ██
  █████   ██ ██ ████ ██     ██   ██ ██    ██     ██      ██    ██ ██   ██ ██ ██   ███ ██    ██
  ██      ██ ██  ██  ██     ██   ██ ██    ██     ██      ██    ██ ██   ██ ██ ██    ██ ██    ██
  ██      ██ ██      ██     ██████   ██████       ██████  ██████  ██████  ██  ██████   ██████
-->



         

           
         
         

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
      <a href="questoes.php"class="btn btn-danger btn-buy-now">Atividades</a>
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
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>