<?php
session_start();
include '../action/Database.php';

if (!isset($_SESSION['user'])) {
   header('Location: index.php');
}

$db = Database::getInstance();
$conn = $db->getConnection();
// Select all registred students 
$sql = "SELECT students.*, studata.* FROM students INNER JOIN studata ON students.cne = studata.cne WHERE students.show=1"; // Initial query
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-student'])) {

   $query = "UPDATE `students` SET `show`= 0 WHERE cne = ?";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("s", $_POST['student_cne']);
   if (!$stmt->execute()) {
      // echo "<script>alert('Student with cne ". $_POST['student_cne'] . " deleted successfully');</script>";
      echo "<script>alert('Error');</script>";
   }
}

$students = $conn->query($sql);

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
                           <h2><strong>Inscription</strong></h2>

                        </div>
                     </div>
                     <div class="container">
                        <div class="row">
                           <div class="col-6">
                              <h3 class="pt-2">Les Etudiants Inscrits</h3>
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

                                 rows.forEach(function(row) {
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
                              $i = 0;
                              if ($students->num_rows > 0) {
                                 while ($student = $students->fetch_assoc()) {

                                    switch ($student['bourse']) {
                                       case 0:
                                          $student['bourse'] = 'Non';
                                          break;
                                       case 1:
                                          $student['bourse'] = 'Demi';
                                          break;
                                       case 2:
                                          $student['bourse'] = 'Complet';
                                       default:
                                          $student['bourse'] = 'Error';
                                          break;
                                    }
                                    switch ($student['resident']) {
                                       case 0:
                                          $student['resident'] = 'Non';
                                          break;
                                       case 1:
                                          $student['resident'] = 'Oui';
                                       default:
                                          $student['resident'] = 'indéfini';
                                          break;
                                    }
                                    if ($student['s_orphelin']) $student['s_orphelin'] = 'Oui';
                                    else $student['s_orphelin'] = 'Non';
                                    if ($student['s_location']) $student['s_location'] = 'Oui';
                                    else $student['s_location'] = 'Non';
                                    if ($student['s_cite']) $student['s_cite'] = 'Oui';
                                    else $student['s_cite'] = 'Non';
                              ?>
                                    <tr <?php
                                          switch ($i % 4) {
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
                                             default:
                                                break;
                                          }
                                          $i++;
                                          ?>>
                                       <form method="post" style="display: inline-block; margin-left: 10px;">
                                          <th scope="row"><?php echo $i; ?></th>
                                          <td><?php echo strtoupper($student['nom']) . ' ' . ucfirst($student['prenom']); ?></td>
                                          <td><?php echo ucfirst($student['cne']); ?></td>
                                          <td>Oui</td>
                                          <td class="action-part">
                                             <a data-bs-toggle="modal" data-bs-target="#showInscrit<?php echo $student['id']; ?>">
                                                <i class="fa-solid fa-eye text-success mx-2"></i>
                                             </a>
                                             <!-- Modal -->
                                             <div class="modal fade" id="showInscrit<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="showInscritLabel<?php echo $student['id']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 60%;">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <h5 class="modal-title" id="showInscritLabel<?php echo $student['id']; ?>">Modal title</h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                         <div class="card mb-3" style="border-radius: .5rem;">
                                                            <div class="row g-0">
                                                               <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                                  <img src="<?php echo $student['photo']; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                                                  <h5><?php echo ucfirst($student['nom']) . ' ' . ucfirst($student['prenom']); ?></h5>
                                                                  <p><?php echo ucfirst($student['cne']); ?></p>
                                                                  <i class="far fa-edit mb-5"></i>
                                                               </div>
                                                               <div class="col-md-8">
                                                                  <div class="card-body p-4">
                                                                     <h6>Informations</h6>
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
                                                                        <div class="col-6"><strong><?php echo '<span style="color: red;">' . ucfirst($student['etat_bourse']) . '</span> | <span style="color: green;">' . ucfirst($student['bourse']) . '</span>' ?></strong></div>
                                                                        <hr>
                                                                        <div class="col-6">Cité : </div>
                                                                        <div class="col-6"><strong><?php echo '<span style="color: red;">' . ucfirst($student['cite']) . '</span> | <span style="color: green;">' . ucfirst($student['s_cite']) . '</span>' ?></strong></div>
                                                                        <hr>
                                                                        <div class="col-6">Location : </div>
                                                                        <div class="col-6"><strong><?php echo '<span style="color: red;">' . ucfirst($student['location']) . '</span> | <span style="color: green;">' . ucfirst($student['resident']) . '</span>' ?></strong></div>
                                                                        <hr>
                                                                        <div class="col-6">Adresse Location : </div>
                                                                        <div class="col-6"><strong><?php echo '<span style="color: red;">' . ucfirst($student['adresse_actuel']) ?></strong></div>
                                                                        <hr>
                                                                        <div class="col-6">Orphelin : </div>
                                                                        <div class="col-6"><strong><?php echo '<span style="color: red;">' . ucfirst($student['orphelin']) . '</span> | <span style="color: green;">' . ucfirst($student['s_orphelin']) . '</span>' ?></strong></div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                         <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>

                                             <button class="delete_icon" name="delete-student" type="submit">
                                                <i class="fa-solid fa-trash text-danger mx-2"></i>
                                             </button>
                                             <input type='hidden' name='student_cne' value=<?php echo $student['cne']; ?>>
                                          </td>
                                       </form>
                                    </tr>
                              <?php
                                 }
                              } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               
               <?php include 'includes/footer.php'; ?>
