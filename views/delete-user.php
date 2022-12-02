<?php
  session_start();

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

<div class="row justify-content-center gx-0">
  <div class="col-4 text-center">
    <i class="fa-solid fa-triangle-exclamation display-4 d-block mb-2 text-warning"></i>
    <h2 class="text-danger mb-5">Delete Account</h2>
    <p class="fw-bold">Are you sure you want to delete your account?</p>

    <div class="row">
      <div class="col">
        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
      </div>

      <div class="col">
        <form action="../actions/action-delete-user.php">
          <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
