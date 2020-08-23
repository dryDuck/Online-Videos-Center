<!-- Detail of Movie -->
<h1>Details</h1>

<!-- Link to View Movie List -->
<a href="index.php?act=view" id="linkView">Back</a>
<!-- End of View Link -->

<!-- Retrieve Data by GET ID -->
<?php
// Include the Database Connection
include('connection.php');

// Catch the ID
$id = $_GET['id'];

// Query
$query = "SELECT * FROM `movie` WHERE `id` = $id";

// Execute and Retrieve
$data = mysqli_query($conn, $query);
date_default_timezone_set('Asia/Jakarta');
$d = mysqli_fetch_assoc($data);
?>
<div class="detailContainer">
  <div class="title">
    <h2><?= $d['title']; ?></h2>
  </div>
  <div class="data">
    <div class="thumbnail">
      <img src="../img/<?= $d['photo']; ?>" style="width: 100%">
    </div>
    <div class="description">
      <div class="date">
        Added on <?= date('d F Y', $d['date']); ?>
      </div>
      <div class="detail">
        This is a movie of <?= $d['detail']; ?>
      </div>
      <div class="posted">
        This movie was posted by <?= $d['posted_by']; ?>
      </div>
    </div>
  </div>
</div>