<?php

include("functions.php");
$object = new todolist();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    .login-title h4 {
    padding: 25px 0px;
}
.btn-area {
    display: flex;
    justify-content: space-between;
}
.btn-area input {
    width: 50%;
    border: none;
    border-radius: 0px;
}
.btn-area > a {
    width: 50%;
    border: none;
    border-radius: 0px;
}
  </style>
  </head>
  <body>
    <div class="login-area">
        <div class="container">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-4 offset-3 login-title">
              <h4>Login</h4>
              <?php if(isset($_POST['submitlogin'])){
                  $resms= $object->login($_POST);
              }
              ?>
              <form action="" method="post">
                
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                          <input type="email" name="lemail" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Password</label>
                          <input type="password" name="lpass" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="btn-area">
                    <input type="submit" name="submitlogin" value="Login" class="btn btn-primary">
                    <a class="btn btn-warning" href="signup.php">Signup</a>
                  </div>
                  </form>
                </div>
               </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>