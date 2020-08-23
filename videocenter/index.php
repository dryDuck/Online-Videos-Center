<?php
ob_start();
session_start();
if ($_SESSION['status'] != 'loggedin') {
  header('location:../index.php?message=not_in');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Online Video Center</title>
</head>

<body>
  <!-- Container for Dynamic Page -->
  <div class="container">

    <!-- Left-Side of Dynamic Page -->
    <div class="left-sidebar">

      <!-- Title -->
      <div class="logo">
        <h1>OVC</h1>
      </div>
      <!-- Navbar -->
      <ul>
        <li><a href="">New Movie</a></li>
        <li><a href="">Comedy</a></li>
        <li><a href="">Horror</a></li>
        <li><a href="">Thriller</a></li>
        <li><a href="">Romantic</a></li>
      </ul>
      <div class="logout">
        <a href="../logout.php">Logout</a>
      </div>
    </div>
    <!-- End of Left Side -->

    <!-- Right Side  -->
    <div class="right-side">
      <!-- Topbar of Dynamic Page -->
      <div class="topbar">

        <h1>Online Video Center WPUIB</h1>
        <!-- Search Bar -->
        <div class="searchbar">
          <!-- Form for Search Bar -->
          <form action="">
            <input type="text" id="search" name="search" placeholder="Search here...">
            <button disabled>Search</button>
          </form>
          <!-- End of Form for Search Bar -->

        </div>
        <!-- End of Search Bar -->

      </div>
      <!-- End of Topbar -->

      <!-- Start of Content => In this division we Change the Content According to url-->
      <div class="content">
        <?php
        include 'connection.php';
        if (isset($_GET['act'])) {
          switch ($_GET['act']) {
            case 'view':
              include 'pages/view.php';
              break;
            case 'add':
              include 'pages/add.php';
              break;
            case 'upd':
              include 'pages/update.php';
              break;
            case 'del':
              include 'pages/delete.php';
              break;
            case 'det':
              include 'pages/detail.php';
              break;

            default:
              include 'pages/view.php';
              break;
          }
        } else {
          include 'pages/view.php';
        }

        ?>
      </div>
      <!-- End of Content -->

      <!-- Footer -->
      <div class="footer">
        <p>© Andry 2020. All Rights Reserved </p>
      </div>
      <!-- End of Footer -->
    </div>
    <!-- End of Right side -->
  </div>
  <!-- End of Container -->

</body>

</html>