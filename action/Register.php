<?php
session_start();
include 'Database.php';
include './validator/Validator.php';
$db = Database::getInstance();
$conn = $db->getConnection();

// Other form fields
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$cne = $_POST["cne"];
$appogee = $_POST["appogee"];
$cin = $_POST["cin"];
$adresse_parents = $_POST["adresse_parents"];
$adresse_actuel = $_POST["adresse_actuel"];
$location = $_POST["location"];
$cite = $_POST["cite"];
$etat_bourse = $_POST["etat_bourse"];
$adresse_email = $_POST["adresse_email"];
$telephone = $_POST["telephone"];
$orphelin = $_POST["orphelin"];
$nb_membres_famille = $_POST["nb_membres_famille"];
$abac = $_POST["abac"];
$etablissement = $_POST["etablissement"];
$cycle = $_POST["cycle"];
$agreement = isset($_POST["agreement"]) ? 1 : 0;

// File upload handling for 'photo' field
$uploadDir = '../uploads/students/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
} // Specify the directory where you want to store the uploaded files
$uploadFile = $uploadDir . basename($_FILES['photo']['name']);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
    $sql_students = "INSERT INTO students (nom, prenom, cne, appogee, cin, adresse_parents, adresse_actuel, location, cite, etat_bourse, adresse_email, telephone, photo, orphelin, nb_membres_famille, agreement, abac, etablissement, cycle)
    VALUES ('$nom', '$prenom', '$cne', '$appogee', '$cin', '$adresse_parents', '$adresse_actuel', '$location', '$cite', '$etat_bourse', '$adresse_email', '$telephone', '$uploadFile', '$orphelin', '$nb_membres_famille', '$agreement', '$abac', '$etablissement', '$cycle')";
    if ($conn->query($sql_students) === TRUE) {
        $last_inserted_id = $conn->insert_id;
        // URL for Scraping
        $url = 'https://e-bourse-maroc.onousc.ma/page2.php';  // Adjust the action attribute of the form
        // Define the form data you want to submit
        $formData = [
            'cne' => $cne,
            'abac' => $abac,
            'type' => $cycle,
        ];
        $validator = new Validator($url, $formData);
        $output = $validator->fetchData();
        $data = $validator->extractData($output);
        $residence = 2 ;
        $bource = 2 ;
        var_dump($data);
        switch (count($data)) {
            case 2:
                $residence = 3 ;
                $bource = 3 ;
                break ;
            case 9:
                $residence = 2; 
                if (strcasecmp($data[4], 'Non') === 0) {
                    $residence = 0;
                } elseif (strcasecmp($data[4], 'Oui') === 0) {
                    $residence = 1;
                }
                $bource = 0; 
                if (strcasecmp($data[8], 'DEMI BOURSE') === 0) {
                    $bource = 1;
                } elseif (strcasecmp($data[8], 'BOURSE COMPLETE') === 0) {
                    $bource = 2; 
                }
                break;
            case 7:
                $residence = 2;
                $bource = 0;  
                if (strcasecmp($data[4], 'Bourse non accordée') === 0) {
                    $residence = 0;
                    $bource = 0; 
                } elseif (strcasecmp($data[4], 'Non') === 0) {
                    $residence = 0;
                    $bource = 0; 
                }
                break ;
            default:
                break ;
        }
        $_SESSION['scripted_info']['orphelin'] = $orphelin;
        $_SESSION['scripted_info']['cite'] = $cite;
        $_SESSION['scripted_info']['location'] = $location;
        switch ($bource) {
            case 0:
                $_SESSION['scripted_info']['bource'] = 'Non';
                break;
            case 1:
                $_SESSION['scripted_info']['bource'] = 'Demi';
                break;
            case 2:
                $_SESSION['scripted_info']['bource'] = 'Complet';
            default:
                $_SESSION['scripted_info']['bource'] = 'Error';
                break;
        }
        switch ($residence) {
            case 0:
                $_SESSION['scripted_info']['residence'] = 'Non';
                break;
            case 1:
                $_SESSION['scripted_info']['residence'] = 'Oui';
            default:
                $_SESSION['scripted_info']['residence'] = 'indéfini';
                break;
        }
        if ($orphelin=='oui') $orphelin = 1 ; else $orphelin = 0;
        if ($location=='oui') $location = 1 ; else $location = 0;
        if ($cite=='oui') $cite = 1 ; else $cite = 0;
        $sql_studata = "INSERT INTO studata (id, cne, resident, bourse, orphelin, location, cite)
            VALUES ('$last_inserted_id', '$cne', '$residence', '$bource', '$orphelin', '$location', '$cite')";
        if ($conn->query($sql_studata) === TRUE) {
            $_SESSION["inscription_success"] = "Votre Demandes es Enregistré Avec succès.";
            header("Location: ../inscription.php");
        } else {
            echo "Error: " . $sql_studata . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_students . "<br>" . $conn->error;
    }
} 
else {
    echo "Upload failed.\n";
}

$conn->close();
?>
