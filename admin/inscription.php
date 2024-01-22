<?php

include '../action/Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();
// Select all registred students 
$sql = "SELECT * FROM students WHERE 1"; // Initial query

// Check if filter options are set and not 'all'
if (isset($_GET['filterOrphelin']) && $_GET['filterOrphelin'] !== 'all') {
    $sql .= " AND orphelin = '" . $_GET['filterOrphelin'] . "'";
}

if (isset($_GET['filterBourse']) && $_GET['filterBourse'] !== 'all') {
    $sql .= " AND etat_bourse = '" . $_GET['filterBourse'] . "'";
}

if (isset($_GET['filterLocation']) && $_GET['filterLocation'] !== 'all') {
    $sql .= " AND location = '" . $_GET['filterLocation'] . "'";
}

if (isset($_GET['filterCite']) && $_GET['filterCite'] !== 'all') {
    $sql .= " AND cite = '" . $_GET['filterCite'] . "'";
}

// Add ORDER BY or any other conditions as needed

$students = $conn->query($sql);

$conn->close();

?>
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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
      <!-- Font Awesome cdn  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <!-- CDN CSS Bootstrap 5  -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <a href="index.php" data-toggle="collapse" aria-expanded="false" class=""><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
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
                           <div class="row">
                              <div class="col-6">
                                 <h3 class="pt-2">Les Etudiants Inscrits :</h3>
                              </div>
                              <div class="col-6">
                                 <form id="SearchForm" onsubmit="searchStudents(event)">
                                    <div class="input-group">
                                       <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Rechercher par nom ou CNE">
                                       <button class="btn" type="submit">Chercher</button>
                                    </div>
                                 </form>
                              </div>
                              <script>
                                 function searchStudents(event) {
                                    event.preventDefault(); // Prevent the default form submission

                                    // Get the search input value
                                    var searchValue = document.getElementById('searchInput').value.toLowerCase();

                                    // Perform your search logic (you can adapt this to your specific needs)
                                    var rows = document.querySelectorAll('tbody tr');

                                    rows.forEach(function (row) {
                                          var name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                          var cne = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                                          if (name.includes(searchValue) || cne.includes(searchValue)) {
                                             row.style.display = ''; // Show the row if it matches the search
                                          } else {
                                             row.style.display = 'none'; // Hide the row if it doesn't match the search
                                          }
                                    });
                                 }
                              </script>
                              <div class="col-12">
                                 <form id="filterForm">
                                       <div class="input-group mb-3">
                                          <label class="input-group-text" for="filterOrphelin">Orphelin</label>
                                          <select class="form-select" id="filterOrphelin" name="filterOrphelin">
                                             <option value="all">Tous</option>
                                             <option value="oui">Orphelins</option>
                                             <option value="non">Non Orphelins</option>
                                          </select>
                                          
                                          <label class="input-group-text" for="filterBourse">Bourse</label>
                                          <select class="form-select" id="filterBourse" name="filterBourse">
                                             <option value="all">Tous</option>
                                             <option value="complet">Complet</option>
                                             <option value="demi">Demi</option>
                                             <option value="non">Non Boursé</option>
                                          </select>

                                          <label class="input-group-text" for="filterLocation">Location</label>
                                          <select class="form-select" id="filterLocation" name="filterLocation">
                                             <option value="all">Tous</option>
                                             <option value="oui">Avec Location</option>
                                             <option value="non">Sans Location</option>
                                          </select>

                                          <label class="input-group-text" for="filterCite">Cité Universitaire</label>
                                          <select class="form-select" id="filterCite" name="filterCite">
                                             <option value="all">Tous</option>
                                             <option value="oui">Avec Cité Universitaire</option>
                                             <option value="non">Sans Cité Universitaire</option>
                                          </select>

                                          <button class="btn btn-outline-success" type="submit">Appliquer</button>
                                       </div>
                                 </form>
                              </div>
                           </div>

                           </div>
                        </div>
                        <div class="container">
                           <table class="table table-hover text-dark fw-bold">
                              <thead>
                                 <tr>
                                    <th scope="col">Num</th>
                                    <th scope="col">Nom & Prénom</th>
                                    <th scope="col">Code Massar</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                 $i=0;
                                 if ($students->num_rows > 0) {
                                    while ($student = $students->fetch_assoc()) {
                                 ?>
                                 <tr <?php 
                                 switch($i%4){
                                    case 0: 
                                       echo "class='table-success'";
                                       break;
                                    case 1: 
                                       echo "class='table-danger'";
                                       break;
                                    case 2: 
                                       echo "class='table-secondary'";
                                       break;
                                    case 3: 
                                       echo "class='table-info'";
                                       break;
                                    default :
                                       break;
                                 }
                                 $i++;
                                 ?>
                                 >
                                    <th scope="row"><?php echo $i ; ?></th>
                                    <td><?php echo $student['prenom'].' '.$student['nom']; ?></td>
                                    <td><?php echo $student['cne']; ?></td>
                                    <td>Oui</td>
                                    <td>
                                       <a data-bs-toggle="modal" data-bs-target="#showInscrit<?php echo $student['id']; ?>">
                                          <i class="fa-solid fa-eye text-success mx-2"></i>
                                       </a>
                                       <!-- Modal -->
                                       <div class="modal fade" id="showInscrit<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="showInscritLabel<?php echo $student['id']; ?>" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="showInscritLabel<?php echo $student['id']; ?>">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="<?php echo $student['photo']; ?>"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><?php echo $student['prenom'].' '.$student['nom']; ?></h5>
              <p><?php echo $student['cne']; ?></p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Informations :</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-8 mb-1">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $student['adresse_email']; ?></p>
                  </div>
                  <div class="col-8 mb-1">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $student['telephone'] ?></p>
                  </div>
                </div>
                <h5>Indices : </h5>
                <hr class="mt-0 mb-1 mt-2">
                <div class="row pt-1">
                  <div class="col-6">Bourse : </div>
                  <div class="col-6"><strong>Etat</strong></div>
                  <hr>
                  <div class="col-6">Cité : </div>
                  <div class="col-6"><strong>Etat</strong></div>
                  <hr>
                  <div class="col-6">Location : </div>
                  <div class="col-6"><strong>Etat</strong></div>
                  <hr>
                  <div class="col-6">Adresse Location : </div>
                  <div class="col-6"><strong>Etat</strong></div>
                  <hr>
                  <div class="col-6">Orphelin : </div>
                  <div class="col-6"><strong>Etat</strong></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <a href="">
                                          <i class="fa-solid fa-trash text-danger mx-2"></i>
                                       </a>
                                    </td>
                                 </tr>
                                 <?php 
                                 }
                              } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
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
      <!-- CDN JS Bootstrap 5  -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>