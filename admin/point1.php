<?php
session_start();

include '../action/Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();

if (!isset($_SESSION['user'])){
   header('Location: index.php');
}

// Select all registred students 
$sql = "SELECT * FROM pointage"; // Initial query
$pointage = $conn->query($sql);

$conn->close();
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
                              <h2>Pointage </h2>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="full_container">
                    <div class="container">
                        <div class="center verticle_center full_height">
                        <div class="login_section">
                            <div class="logo_login">
                                <div class="center">
                                    <img width="210" src="images/logo/logo.png" alt="#" />
                                </div>
                            </div>
                            <div class="login_form">
                                <form class="form align-items-center text-center justify-content-center">
                                    <fieldset class="float-center">
                                    <label for="idcne" class="form-label text-center my-2">
                                        <strong>Entrer ID ou CNE : </strong>
                                    </label>
                                    <br>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <input class="form-control float-center" type="text" name="idcne" id="idcne" placeholder="idcne" required>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary my-3">
                                        Aller
                                    </button>
                                    <button class="btn btn-primary my-3" onclick="alert('use camera!')">
                                    <i class="fa fa-table purple_color2 mx-3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <?php include 'includes/footer.php'; ?>