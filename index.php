<?php

session_start();
if (isset($_SESSION['status'])) {
  header("location:videocenter/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VC | Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Container -->
  <div class="container-form">


    <!-- Form Container -->
    <div class="container-form-login">


      <!-- Start Form -->
      <form action="login.php" class="formLogin" method="POST">

        <!-- Login Content -->
        <table>

          <!-- Header of Table contains Title of Login Form -->

          <thead>
            <tr>
              <th>
                Online Video Center
                <hr>
              </th>
            </tr>
          </thead>
          <!-- End of Table's Header -->


          <!-- Body of Table contains Input of Login Form -->
          <tbody>

            <!-- Message Bar for Login -->
            <?php
            if (isset($_GET['message'])) {
              switch ($_GET['message']) {
                case 'failed':
                  echo "<tr><td><div class='message message-danger'>Invalid Username or Password</div></td></tr>";
                  break;
                case 'logout':
                  echo "<tr><td><div class='message message-success'>Logged Out</div></td></tr>";
                  break;
                case 'not_in':
                  echo "<tr><td><div class='message message-warning'>Login First!</div></td></tr>";
                  break;
              }
            }
            ?>

            <!-- Username Input -->
            <tr>
              <td>
                <label for="username">Username</label>
              </td>
            </tr>
            <tr>
              <td>
                <input type="text" id="username" name="username" required>
              </td>
            </tr>
            <!-- End of Username Input -->

            <!-- Password Input -->
            <tr>
              <td>
                <label for="password">Password</label>
              </td>
            </tr>
            <tr>
              <td>
                <input type="password" id="password" name="password" required>
              </td>
            </tr>
            <!-- End of Password Input -->

            <!-- Submit Button -->
            <tr>
              <td>
                <button type="submit">Login</button>
              </td>
            </tr>
            <!-- End of Button -->

          </tbody>
          <!-- End of Table's Body -->

        </table>
        <!-- End of Table -->



      </form>
      <!-- End of Login Form -->

    </div>
    <!-- End of Form Container -->

  </div>
  <!-- End of Container -->

</body>

</html>