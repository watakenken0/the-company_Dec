<?php
  session_start();

  require "../classes/User.php";

  $user_obj = new User;

  $user = $user_obj->getUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit user</title>
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

  <div class="row justify-content-center gx-0">
    <div class="col-4">
      <h2 class="text-center mb-4">Edit User</h2>
        <!-- MIMES  -->

      <form action="../actions/action-edit-user.php" method="post" enctype="multipart/form-data">

        <div class="row justify-content-center mb-3">
          <div class="col-6">
            <?php
              if($user['photo']){
            ?>

              <img src="../assets/img/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?> " class="d-block mx-auto edit-photo edit-icon">

            <?php
              }else{
            ?>

            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>

            <?php
              }
            ?>
            <input type="file" name="photo" class="form-control mt-2" accept="image/*">
          </div>

          <div class="row mb-3">
              <label for="first_name">First name</label>
              <input type="text" name="first_name" class="form-control" required value="<?= $user['first_name'] ?>">
          </div>

          <div class="mb-3">
            <label for="last_name">last name</label>
            <input type="text" name="last_name" class="form-control" required value="<?= $user['last_name'] ?>">
          </div>

          <div class="mb-3">
            <label for="username">username</label>
            <input type="text" name="username" class="form-control" required value="<?= $user['username'] ?>">
          </div>

          <div class="text-end">
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm px-5">Submit</button>
          </div>

        </div>
      </form>
    </div>
  </div>

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
