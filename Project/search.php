<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_theaterdb";
    
    // Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }

   

?>

      <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Theater Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
             </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Search Movies</h1>

      <br>

<!-- Portfolio Item Row -->

      <div class="row">
        <div class="col-md-4">
          <h3 class="my-3">Theater:</h3>

          <select>
    <?php  

         // Get all theater names
    $complex_query_result = $conn->query("select distinct ComplexName from Showing");
    while ($row = mysqli_fetch_array($complex_query_result)) {

        $complex = $row['ComplexName'];
        echo "<option value='" . $complex . "'>" . $complex . "</option>";
    }

    ?>
        </select>
      </div>
      </div>

      <!-- /.row -->

<br>

<!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-4">
          <h3 class="my-3">Movie:</h3>
          <select>
          <?php  
            // Get all movie names
    $movie_query_result = $conn->query("select distinct MovieTitle from Showing");
    while ($row = mysqli_fetch_array($movie_query_result)) {

            $movie = $row['MovieTitle'];
            echo "<option value='" . $movie . "'>" . $movie . "</option>";
}
?>
        </select>
      </div>
      </div>

      <!-- /.row -->

<br>

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-4">
          <h3 class="my-3">Day:</h3>
        
        <select>
  <?php
            // Get all showing dates
    $date_query_result = $conn->query("select distinct StartDate from Showing");
    while ($row = mysqli_fetch_array($date_query_result)) {

            $date = $row['StartDate'];
       echo "<option value='" . $date . "'>" . $date . "</option>";
          }
?>
        </select>

        </div>
      </div>
      <!-- /.row -->

<br>
<a class="btn btn-primary" href="showings.php">Search</a>
<br>
<br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Theater 332</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>