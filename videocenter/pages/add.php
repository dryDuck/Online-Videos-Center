<!-- Add Movie Form -->
<!-- Title of Add Movie Form -->
<h1>Add New Movie</h1>

<a href="index.php?act=view" id="linkView">Back</a>
<!-- Message Bar for Add failed -->
<?php

if (isset($_GET['message'])) {
  switch ($_GET['message']) {
    case 'fError':
      echo "<div class='message message-danger'>Add failed! File not found!</div>";
      break;
    case 'fExtErr':
      echo "<div class='message message-danger'>Add failed! File Extension not valid!</div>";
      break;
    case 'fSizeErr':
      echo "<div class='message message-danger'>Add failed! File Size over 2MB</div>";
      break;
  }
}

?>
<!-- Form Start -->
<form action="pages/action.php" method="POST" enctype="multipart/form-data" id="fAdd">

  <!-- Start Table  -->
  <table class="tAdd">

    <!-- First Row -->
    <tr>
      <th>
        <label for="category">Category</label>
      </th>
      <td>
        <select name="category" id="category">
          <option value="Uncategorized">Uncategorized</option>
          <option value="Comedy">Comedy</option>
          <option value="Horror">Horror</option>
          <option value="Thriller">Thriller</option>
          <option value="Romantic">Romantic</option>
        </select>
      </td>
      <th>
        <label for="by">Posted By</label>
      </th>
      <td>
        <input type="text" id="by" name="by" placeholder="Posted By Here..." required>
      </td>
    </tr>
    <!-- End of First Row -->

    <!-- Second Row -->
    <tr>
      <th>
        <label for="title">Title</label>
      </th>
      <td>
        <input type="text" id="title" name="title" placeholder="Title Here..." required>
      </td>
      <th>
        <label for="photo">Photo</label>
      </th>
      <td>
        <input type="file" id="photo" name="photo">
      </td>
    </tr>
    <!-- End of Second Row -->

    <!-- Third Row -->
    <tr>
      <th>
        <label for="detail">Detail</label>
      </th>
      <td>
        <textarea id="detail" name="detail" placeholder="Detail Here..." cols="30" rows="10" required></textarea>
      </td>
      <th colspan="2">
        <button type="submit" name="addAction" id="addAction" class="button">+ Add New Movie</button>
      </th>
    </tr>
    <!-- Submit to Action  -->
    <!-- End of Submit Action -->
    <!-- End of Third Row -->

  </table>
  <!-- End of Table -->



</form>
<!-- End of Form -->

<!-- End of Add Movie Form -->