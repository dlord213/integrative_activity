<?php
include("../../dB/config.php");
include("./includes/header.php");
include("./includes/topbar.php");
include("./includes/sidebar.php");
?>

<div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Full Name</b>
                    </th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Birthday</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT `firstName`,`lastName`, `email`, `gender`,`birthday` FROM `users`";
                    $query_run = mysqli_query($conn, $query);

                    if (!$query_run) {
                      die("Failed query:" . mysql_error($query_run));
                    }
  
                    if (mysqli_num_rows($query_run)) {
                      foreach ($query_run as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['firstName'] . ' '. $row['lastName'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['gender'] . '</td>';
                        echo '<td>' . $row['birthday'] . '</td>';
                        echo '<td><button class="btn btn-primary"><i class="bi bi-eye"></i></button></td>';
                        echo '</tr>';
                      }
                    }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



<?php
include("./includes/footer.php");
?>