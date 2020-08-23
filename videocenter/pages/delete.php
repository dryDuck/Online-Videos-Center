<?php
// Delete Movie

// Include the Connection File
include('connection.php');

if ($_GET['id']) {
  // Catch the ID
  $id = $_GET['id'];

  // Query
  $query = "DELETE FROM `movie` WHERE id = $id";
  // Unlink photo
  $unlink = mysqli_query($conn, "SELECT * FROM `movie` WHERE id = $id");
  $ul = mysqli_fetch_assoc($unlink);

  $photo = $ul['photo'];
  unlink('../img/' . $photo);
  mysqli_query($conn, $query);
  header('location: index.php?act=view&message=dSuccess');
} else {
  header('location: index.php?act=view');
}
