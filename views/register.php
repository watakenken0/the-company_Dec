<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <div style="height: 100vh;" class="">
    <div class="row h-100 m-0">
      <div class="card w-25 my-auto mx-auto">
        <div class="card-header bg-white border-0 py-3">
          <h1 class="text-center">Register</h1>
        </div>

        <div class="card-body">
          <form action="../actions/action-register.php" method="post">
            <div class="mb-3">
              <label for="first-name" class="form-label">First Name</label>
              <input type="text" name="first_name" class="form-control">
            </div>

            <div class="mb-3">
              <label for="last-name" class="form-label">last Name</label>
              <input type="text" name="last_name" class="form-control">
            </div>

            <div class="mb-3">
              <label for="user-name" class="form-label fw-bold">user Name</label>
              <input type="text" name="username" class="form-control" maxlength="15" required>
            </div>

            <div class="mb-5">
              <label for="password" class="form-label fw-bold">password</label>
              <input type="password" name="password" class="form-control" minlength="8" required aria-describedBy="password-info" id="password-info">
              <div class="form-text" id="password-info">
                Password must be atleast 8 characters long.
              </div>
            </div>

            <button type="sumbit" class="btn btn-success w-100">Register</button>
          </form>
          <p class="text-center small">Registered Already <a href="#">Login</a></p>
        </div>
      </div>
    </div>
  </div>
<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>
