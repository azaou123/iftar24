

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
?>
   <?php include 'includes/header.php'; ?>
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

                     <div class="jumbotron">
    <div class="row w-100">
        <?php 
        while ($row = $pointage->fetch_assoc()) {
        ?>
        <div class="col-md-3 my-2">
            <div class="card border-info mx-sm-1 p-3">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 card border-info shadow text-info p-3 my-card rounded-circle justify-content-center align-items-center">
                        <i class="fa-solid fa-<?php echo $row['id']; ?> float-center"></i>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="text-info text-center mt-3"><h4>234</h4></div>
                <div class="text-info text-center mt-2">
                  <a href="point1.php">
                     <i class="fa-solid fa-gear fs-3 text-danger"></i>
                  </a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
   <?php include 'includes/footer.php'; ?>