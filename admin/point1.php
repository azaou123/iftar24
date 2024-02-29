<?php
session_start();

include '../action/Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();

if (!isset($_SESSION['user'])){
   header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $idcne = $_POST['idcne'];
    $sql_student = "SELECT id, nom, prenom FROM students WHERE cne = '$idcne' OR id='$idcne'";
    $sql_student_inserted = "SELECT * FROM pointage WHERE ";
    $result_student = $conn->query($sql_student);

    if ($result_student->num_rows > 0){
        $row = $result_student->fetch_assoc();
        $id_student = $row['id'];

        $id_jour = $_GET['id'];
        echo $id_jour. '</br>';

        $sql_insert = "INSERT INTO pointage (id_student, id_jour) VALUES ('$id_student', '$id_jour')";
        $result_insert = $conn->query($sql_insert);
        if ($result_insert){
            $_SESSION['success'] = $row['nom'].' '.$row['prenom'].' is validated successfully.';
        }
        elseif ($result_insert->num_rows > 0){
            $_SESSION['success'] = $row['nom'].' '.$row['prenom'].' is already validated.';
        }
        else {
            $_SESSION['error'] = 'Not Found !';
        }
    }
    $conn->close();
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
                                        <form method="POST" class="form align-items-center text-center justify-content-center">
                                            <fieldset class="float-center">
                                                <?php if (isset($_SESSION['error'])): ?>
                                                    <div class="alert alert-danger text-center">
                                                        <?php echo $_SESSION['error']; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (isset($_SESSION['success'])): ?>
                                                    <div class="alert alert-success text-center">
                                                        <?php echo $_SESSION['success']; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <label for="idcne" class="form-label text-center my-2">
                                                    <strong>Entrer ID ou CNE : </strong>
                                                </label>
                                                <br>
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-6">
                                                        <input class="form-control float-center" type="text" name="idcne" id="idcne" placeholder="idcne" required>
                                                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                                                    </div>
                                                    <div class="col-3"></div>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary my-3">
                                                Aller
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'includes/footer.php'; ?>