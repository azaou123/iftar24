<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>IFTAR 24 UCA</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <!-- data-toggle="collapse" aria-expanded="false"  -->
                        <a href="index.php" class=""><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li><a href="inscription.php"><i class="fa fa-map purple_color2"></i> <span>Inscription</span></a></li>
                     <li><a href="pointage.php"><i class="fa fa-bar-chart-o green_color"></i> <span>Pointage</span></a></li>
                     <li><a href="parametres.php"><i class="fa fa-cog yellow_color"></i> <span>Paramètres</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Paramètres : </h2>
                           </div>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info my-1">
                        <div class="table-responsive-sm">
                           <div class="row my-1">
                              <div class="col-10">
                                 <h5>Partenaires & Associations :</h5>
                              </div>
                              <div class="col-2">
                                 <button class="btn btn-primary float-end">Ajouter</button>
                              </div>
                           </div>
                           
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Lebelle</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Association 1</td>
                                    <td>
                                       <img src="images/logo/logo.png" alt="" width="80">
                                    </td>
                                    <td>
                                       <button class="btn btn-danger mx-1">Supprimer</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info my-1">
                        <div class="table-responsive-sm">
                           <h3>Inscription & Badge :</h3>
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Paramètre</th>
                                    <th>Situation</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Inscription</td>
                                    <td>Active</td>
                                    <td>
                                       <button class="btn btn-success mx-1">Activer</button>
                                       <button class="btn btn-danger mx-1">Désactiver</button>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Badge</td>
                                    <td>Active</td>
                                    <td>
                                       <button class="btn btn-success mx-1">Activer</button>
                                       <button class="btn btn-danger mx-1">Désactiver</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                     <div class="table_section padding_infor_info my-1">
                        <div class="table-responsive-sm">
                           <h3>Communication :</h3>
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Paramètre</th>
                                    <th>Situation</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Réclamation</td>
                                    <td>Active</td>
                                    <td>
                                       <button class="btn btn-success mx-1">Activer</button>
                                       <button class="btn btn-danger mx-1">Désactiver</button>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Email</td>
                                    <td>email@uca.ac.ma</td>
                                    <td>
                                       <button class="btn btn-success mx-1">Modifier</button>
                                       <button class="btn btn-danger mx-1">Supprimer</button>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Téléphone</td>
                                    <td>0000000000</td>
                                    <td>
                                       <button class="btn btn-success mx-1">Modifier</button>
                                       <button class="btn btn-danger mx-1">Supprimer</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2024 - IFTAR 24</p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>