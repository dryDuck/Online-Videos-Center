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

<!-- Update Movie Form -->

<!-- Title of Update Movie Form -->
<h1>Update Movie</h1>

<a href="index.php?act=view" id="linkView">Back</a>
<!-- Message Bar for Update failed -->
<?php

if (isset($_GET['message'])) {
  switch ($_GET['message']) {
    case 'fError':
      echo "<div class='message message-danger'>Update failed! File not found!</div>";
      break;
    case 'fExtErr':
      echo "<div class='message message-danger'>Update failed! File Extension not valid!</div>";
      break;
    case 'fSizeErr':
      echo "<div class='message message-danger'>Update failed! File Size over 2MB</div>";
      break;
  }
}

?>
<!-- Form Start -->
<form action="pages/action.php" method="POST" enctype="multipart/form-data" id="fEdit">

  <!-- Start Table  -->
  <table class="tEdit">
    <input type="hidden" name="id" value="<?= $d['id']; ?>">
    <!-- First Row -->
    <tr>
      <th>
        <label for="category">Category</label>
      </th>
      <td>
        <select name="category" id="category" required>
          <option <?php if ($d['category'] == 'Uncategorized') echo "selected"; ?> value="Uncategorized">Uncategorized</option>
          <option <?php if ($d['category'] == 'Comedy') echo "selected"; ?> value="Comedy">Comedy</option>
          <option <?php if ($d['category'] == 'Horror') echo "selected"; ?> value="Horror">Horror</option>
          <option <?php if ($d['category'] == 'Thriller') echo "selected"; ?> value="Thriller">Thriller</option>
          <option <?php if ($d['category'] == 'Romantic') echo "selected"; ?> value="Romantic">Romantic</option>
        </select>
      </td>
      <th>
        <label for="title">Title</label>
      </th>
      <td>
        <input type="text" id="title" name="title" value="<?= $d['title']; ?>" required>
      </td>
    </tr>
    <!-- End of First Row -->

    <!-- Second Row -->
    <tr>
      <th>
        <label for="detail">Detail</label>
      </th>
      <td>
        <textarea id="detail" name="detail" cols="30" rows="10" required><?= $d['detail']; ?></textarea>
      </td>
      <th>
        <label for="photo">Photo</label>
      </th>
      <td>
        <img src="../img/<?= $d['photo']; ?>">
        <input type="file" id="photo" name="photo">
      </td>
    </tr>
    <!-- End of Second Row -->

    <!-- Third Row -->
    <tr>
      <th>
        <label for="by">Posted By</label>
      </th>
      <td>
        <input type="text" id="by" name="by" value="<?= $d['posted_by']; ?>" required>
      </td>
      <th colspan="2"><button type="submit" name="updateAction">Update</button></th>
    </tr>
    <!-- End of Third Row -->

  </table>
  <!-- End of Table -->

  <!-- Submit to Action  -->
  <!-- End of Submit Action -->

</form>
<!-- End of Form -->

<!-- End of Add Movie Form -->