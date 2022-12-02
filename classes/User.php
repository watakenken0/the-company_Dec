<?php
require_once "Database.php";

class User extends Database{

  public function store($request){
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $password = $request['password'];
    $phpto = null;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(first_name,last_name,username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

    // execute the query
      if($this->conn->query($sql)){
        header('location: ../views/');
        exit();
      }else{
        die("error in creating user: ". $this->conn->error);
      }
  }

  public function login($request){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";

    if($result = $this->conn->query($sql)){
      if($result->num_rows == 1){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
          # create session variable
          session_start();
          $_SESSION['id'] = $user['id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['full_name'] = $user['first_name'] . "." .$user['last_name'];

          header('location:../views/dashboard.php');
          exit;
        }else{
          die("password is incoreect");
        }
      }else{
        die("someone use it ");
      }
    }

  }

  public function logout(){
    session_start();
    session_unset();
    session_destroy();

    header('location:../views');
    exit();
  }

  public function getAllUsers(){

    $sql = "SELECT id, first_name, last_name, username, photo FROM users";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("error retrieving the users ". $this->conn->error);
    }
  }

  public function getUser(){
    $id = $_SESSION['id'];

    $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id = $id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
    }else{
      die("error retrieving the user: " . $this->conn->error);
    }

  }

  public function update($request,$files){
    session_start();

    $id = $_SESSION['id'];

    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $photo = $files['photo']['name'];
    $tmp_photo = $files['photo']['tmp_name'];

    $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $id ";

    if($this->conn->query($sql)){
      $_SESSION['username'] = $username;
      $_SESSION['full_name'] = $first_name . " " . $last_name;

      // check if there an uploaded file/photo, if there is a file/photo, save it to the database and move/save the file to the "img" folder
      if($photo){
        $sql_photo = "UPDATE users SET photo = '$photo' WHERE id = $id";
        $destination = "../assets/img/$photo";

        // save the image to the DB
        if($this->conn->query($sql_photo)){
          if(move_uploaded_file($tmp_photo, $destination)){
            header('location: ../views/dashboard.php');
            exit;
          }else{
            die("error moving the file");
          }
        }else{
          die("uploading the photo." . $this->conn->error);
        }
      }
      header('location: ../views/dashboard.php');
      exit;
    }else{
      die('error updating the user '. $this->conn->error);
    }

  }


  public function delete(){
    session_start();

    $id = $_SESSION['id'];

    $sql = "DELETE FROM users WHERE id = '$id' ";

    if($this->conn->query($sql)){
      $this->logout();

      header('location: ../views');
      exit();
    }else{
      die("error in deleting the account");
    }
  }

}

?>
