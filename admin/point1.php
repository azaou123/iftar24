<?php
session_start();

include '../action/Database.php';

$db = Database::getInstance();
$conn = $db->getConnection();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $function = $_POST['function'];
    $id_jour = $_SESSION['id-j'];

    if ($function == 'seeuser') {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        if (isset($_POST['idcne'])) $idcne = $_POST['idcne'];

        $sql_student = "SELECT * FROM students WHERE cne = '$idcne' OR id='$idcne'";
        $result_student = $conn->query($sql_student);

        if ($result_student->num_rows > 0) {
            $row = $result_student->fetch_assoc();
            $_SESSION['std_pointage'] = $row;
            $id_student = $_SESSION['std_pointage']['id'];
            $sql_pointage = "SELECT * FROM pointage WHERE id_student='$id_student' AND id_jour='$id_jour'";
            $result_pointage = $conn->query($sql_pointage);

            if ($result_pointage->num_rows > 0) {
                $_SESSION['success'] = $_SESSION['std_pointage']['nom'] . ' ' . $_SESSION['std_pointage']['prenom'] . ' is already validated.';
                header("Location: point1.php");
                exit();
            } else {
                header("Location: point1.php");
                exit();
            }
        } else {
            $_SESSION['error'] = 'Not Found !';
            unset($_SESSION['success']);
            header("Location: point1.php");
            exit();
        }
    } elseif ($function == 'vuser') {

        unset($_SESSION['success']);
        unset($_SESSION['error']);
        if (!isset($_SESSION['std_pointage'])) {
            header("Location: point1.php");
            exit();
        }
        $id_student = $_SESSION['std_pointage']['id'];
        // $id_jour = $_SESSION['id-j'];
        $sqlpointage = "INSERT INTO pointage (id_student, id_jour) VALUES ('$id_student', '$id_jour')";
        $result_insert = $conn->query($sqlpointage);

        if ($result_insert) {
            $_SESSION['success'] =  $_SESSION['std_pointage']['nom'] . ' ' . $_SESSION['std_pointage']['prenom'] . ' is validated successfully.';
            unset($_SESSION['std_pointage']);
            unset($_SESSION['error']);
            header("Location: point1.php");
            exit();
        } else {
            header("Location: point1.php");
            exit();
        }
    } elseif ($function == 'ignore') {
        $_SESSION['error'] = $_SESSION['std_pointage']['nom'] . ' ' . $_SESSION['std_pointage']['prenom'] . ' is ignored !';
        unset($_SESSION['std_pointage']);
        header("Location: point1.php");
        exit();
    }
    $conn->close();
}
include 'includes/header.php';
?>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php include 'includes/sidebar.php';
            ?>
            <!-- right content -->
            <div id="content">
                <?php include 'includes/topbar.php';
                ?>
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
                                    <?php if (!isset($_SESSION['std_pointage'])) { ?>
                                        <div class="login_form">
                                            <form method="POST" class="form align-items-center text-center justify-content-center">
                                                <?php if (isset($_SESSION['error'])) : ?>
                                                    <div class="alert alert-danger text-center">
                                                        <?php echo $_SESSION['error']; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (isset($_SESSION['success'])) : ?>
                                                    <div class="alert alert-success text-center">
                                                        <?php echo $_SESSION['success']; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <fieldset class="float-center">
                                                    <label for="idcne" class="form-label text-center my-2">
                                                        <strong>Entrer ID ou CNE : </strong>
                                                    </label>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-3"></div>
                                                        <div class="col-6">
                                                            <input class="form-control float-center" type="text" name="idcne" id="idcne" placeholder="idcne" required>
                                                            <input type="hidden" name="function" value="seeuser">
                                                        </div>
                                                        <div class="col-3"></div>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-primary my-3">
                                                    Aller
                                                </button>
                                            </form>
                                        </div>
                                    <?php } else { ?>
                                        <div class="login_form">
                                            <form method="POST" class="form align-items-center text-center justify-content-center">
                                                <img class="card-img-top" src="<?php echo $_SESSION['std_pointage']['photo']; ?>" alt="Photo" loading="lazy" style="height:300px;">
                                                <p class="text-center">
                                                    <strong>
                                                        <?php echo $_SESSION['std_pointage']['nom'] . ' ' . $_SESSION['std_pointage']['prenom']; ?>
                                                    </strong><br>
                                                    <?php echo $_SESSION['std_pointage']['cne']; ?><br>
                                                </p>
                                                <input type="hidden" name="function" value="vuser">
                                                <div class="row mb-3">
                                                    <div class="col-3"></div>
                                                    <div class="col-6">
                                                        <button class="btn btn-primary w-100" type="submit">
                                                            Validate
                                                        </button>
                                                    </div>
                                                    <div class="col-3"></div>
                                                </div>
                                            </form>
                                            <div class="row mb-3">
                                                <div class="col-3"></div>
                                                <div class="col-6">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="function" value="ignore">
                                                        <button class="btn btn-danger w-100" type="submit">
                                                            Ignore
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-3"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'includes/footer.php'; ?>