<?php 
   session_start();
   
   if (!isset($_SESSION['user'])){
      header('Location: index.php');
      exit();
   }
   include 'includes/header.php'; 
   ?>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php include 'includes/sidebar.php'; ?>
            <!-- right content -->
            <div id="content">
               <?php include 'includes/topbar.php'; ?>
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
   <?php include 'includes/footer.php'; ?>