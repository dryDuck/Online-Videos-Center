<!-- View List Movie -->
<h1>Movie</h1>

<!-- Message Bar for Add failed -->
<?php

if (isset($_GET['message'])) {
  switch ($_GET['message']) {
    case 'aSuccess':
      echo "<div class='message message-success'>Successfully added a new movie!</div>";
      break;
    case 'uSuccess':
      echo "<div class='message message-success'>Successfully edited a movie!</div>";
      break;
    case 'dSuccess':
      echo "<div class='message message-success'>Successfully deleted a movie!</div>";
      break;
  }
}

?>

<!-- Link to Add Movie Form -->
<a href="index.php?act=add" id="linkAdd">+ Add Movie</a>

<!-- Table of Movie List -->
<table class="tView">
  <thead>
    <tr>
      <th>No.</th>
      <th>Date</th>
      <th>Category</th>
      <th>Title</th>
      <th>Detail</th>
      <th>Posted By</th>
      <th>Modification</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //Include the Database Connection
    include('connection.php');

    //Declare Looping
    $no = 1;
    $query = 'SELECT * FROM `movie` ORDER BY `date` DESC';
    $data = mysqli_query($conn, $query);
    date_default_timezone_set('Asia/Jakarta');
    //Looping
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars(date('d F Y', $d['date'])) ?></td>
        <td><?= htmlspecialchars($d['category']) ?></td>
        <td><a href="index.php?act=det&id=<?= $d['id']; ?>"><?= htmlspecialchars($d['title']) ?></a></td>
        <td><?= htmlspecialchars($d['detail']) ?></td>
        <td><?= htmlspecialchars($d['posted_by']) ?></td>
        <td><a href="index.php?act=upd&id=<?= $d['id']; ?>" id="eLink">Edit</a> | <a onclick="return confirm ('Confirm to Delete this record?');" href="index.php?act=del&id=<?= $d['id']; ?>" id="dLink">Delete</a> </td>
      </tr>
    <?php }
    //End of Looping
    ?>
  </tbody>
</table>