<?php

// Include the Connection File
include('../connection.php');

// Declare variables
$date = time();
$category = $_POST['category'];
$title = $_POST['title'];
$detail = $_POST['detail'];
$by = $_POST['by'];

// Add Movie
if (isset($_POST['addAction'])) {

  $fileName = $_FILES['photo']['name'];
  $fileSize = $_FILES['photo']['size'];
  $fileError = $_FILES['photo']['error'];
  $fileTmpName = $_FILES['photo']['tmp_name'];
  $validPhotoExtension = ['jpg', 'jpeg', 'png'];
  $photoExtension = explode('.', $fileName);
  $photoExtension = strtolower(end($photoExtension));

  // Check is there any image upload
  if ($fileError == 4) {
    header('location: ../index.php?act=add&message=fError');
    exit;
  }

  // Check is there any extension error
  if (!in_array($photoExtension, $validPhotoExtension)) {
    header('location: ../index.php?act=add&message=fExtErr');
    exit;
  }

  // Check is the file oversize
  if ($fileSize > 2048000) {
    header('location: ../index.php?act=add&message=fSizeErr');
    exit;
  }

  // Rename the File
  $fileNameNew = uniqid();
  $fileNameNew .= '.';
  $fileNameNew .= $photoExtension;

  // IF PASS THROUGH CHECKING, PHOTO IS READY TO BE UPLOAD
  move_uploaded_file($fileTmpName, '../../img/' . $fileNameNew);

  $query = "INSERT INTO movie (`date`,`category`, `title`, `detail`, `posted_by`, `photo`) VALUES ($date,'$category', '$title', '$detail', '$by', '$fileNameNew')";
  mysqli_query($conn, $query);

  header('location: ../index.php?act=view&message=aSuccess');
  exit;
}

// Update Movie
if (isset($_POST['updateAction'])) {

  $id = $_POST['id'];
  $ufileName = $_FILES['photo']['name'];
  $ufileSize = $_FILES['photo']['size'];
  $ufileError = $_FILES['photo']['error'];
  $ufileTmpName = $_FILES['photo']['tmp_name'];
  $uvalidPhotoExtension = ['jpg', 'jpeg', 'png'];
  $uphotoExtension = explode('.', $ufileName);
  $uphotoExtension = strtolower(end($uphotoExtension));

  $data = mysqli_query($conn, "SELECT * FROM `movie` WHERE `id` = '$id'");
  $d = mysqli_fetch_assoc($data);
  $old_photo = $d['photo'];
  // PHOTO
  if ($ufileError === 0) {

    // Check is there any extension error
    if (!in_array($uphotoExtension, $uvalidPhotoExtension)) {
      header("location: ../index.php?act=upd&message=fExtErr&id=$id");
      exit;
    }

    // Check is the file oversize
    if ($ufileSize > 2048000) {
      header("location: ../index.php?act=upd&message=fSizeErr&id=$id");
      exit;
    }

    // Rename the File
    $ufileNameNew = uniqid();
    $ufileNameNew .= '.';
    $ufileNameNew .= $uphotoExtension;

    // IF PASS THROUGH CHECKING, PHOTO IS READY TO BE UPLOAD
    move_uploaded_file($ufileTmpName, '../../img/' . $ufileNameNew);

    $query = "UPDATE `movie` SET `category` = '$category', `title` = '$title', `detail` = '$detail', `posted_by` = '$by', `photo` = '$ufileNameNew' WHERE `id` = '$id'";

    unlink('../../img/' . $old_photo);
  } else if ($ufileError === 4) {
    $query = "UPDATE `movie` SET `category` = '$category', `title` = '$title', `detail` = '$detail', `posted_by` = '$by', `photo` = '$old_photo' WHERE `id` = '$id'";
  }
  mysqli_query($conn, $query);
  header('location: ../index.php?act=view&message=uSuccess');
  exit;
}
