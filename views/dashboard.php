<?php
  session_start();

  require_once '../classes/User.php';

  $user = new User;
  $all_users = $user->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/style.css">

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

  <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 10px;">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The company</h1>
      </a>

      <div class="navbar-nav">
        <span class="navbar-text"><?= $_SESSION['full_name']; ?></span>
        <form action="../actions/logout.php" method="post" class="d-flex ms-2">
          <button type="submit" class="text-danger bg-transparent border-0">
            logout
          </button>
        </form>
      </div>
    </div>
  </nav>


  <!-- display all user -->

  <div class="row justify-content-center gx-0">
    <div class="col-6">
      <h2 class="text-center">User Lists</h2>

      <table class="table hover align-middle">
        <thead>
          <tr>
            <th>Photo</th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>USERNAME</th>
            <!-- For the action button -->
          </tr>
        </thead>

        <tbody>
          <?php
            while($users = $all_users->fetch_assoc()){
          ?>
            <tr>
              <td>
                <?php
                  if($users['photo']){
                ?>
                  <img src="../assets/img/<?= $users['photo'] ?>" alt="<?= $users['photo'] ?>" class="d-block mx-auto dashboard-icon">


                <?php
                  }else{
                ?>
                    <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>

                <?php
                  }
                ?>

              </td>
              <td><?= $users['id'] ?></td>
              <td><?= $users['first_name'] ?></td>
              <td><?= $users['last_name'] ?></td>
              <td><?= $users['username'] ?></td>
              <td>
                <?php
                  if($_SESSION['id'] == $users['id']){
                ?>
                  <a href="edit_user.php" class="btn btn-outline-warning　btn-lg"><i class="fa-solid fa-pen"></i></a>
                  <a href="../views/delete-user.php" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                <?php
                  }
                ?>
              </td>

            </tr>

          <?php
            }
          ?>
        </tbody>

      </table>
    </div>
  </div>


<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
