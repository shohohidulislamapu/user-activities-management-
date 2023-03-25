<?php
include("functions.php");


session_start();

$username = $_SESSION['username'];
$usernameid = $_SESSION['user_id'];
if($username==null){
  header("location: index.php");
}
$obj = new todolist();
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    .btn-area-submit {
      display: flex;
      padding-top: 30px;
    }

    .deshboard-area {
      padding-top: 50px;
    }
  </style>
</head>

<body>
  <div class="deshboard-area">
    <div class="container">
      <h1>Welcome <?php echo $usernameid;?> <?php echo $username;?></h1>

      <div class="todolist-area">
      <?php

        if(isset($_POST['todolistbtn'])){

          $resms = $obj->todolistitems($_POST,$usernameid);
          
        }
              
        ?>
        <form action="" method="post">
          <div class="mb-3 btn-area-submit">
            <input type="text" name="todotext" class="form-control" id="exampleFormControlInput1"
              placeholder="Enter some text">
            <input type="submit" name="todolistbtn" value="Submit" class="btn btn-primary btn-area-s">
          </div>
        </form>

      </div>
      <table class="table">
        <thead>
         
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          
          $rowed = $obj->todolistitemsshow($usernameid);

          while($rows = mysqli_fetch_assoc($rowed)){
              ?>
               <tr>
                <th scope="row"><?php echo $rows['id']; ?></th>
                <td><?php echo $rows['textsms']; ?></td>
              </tr>
              <?php
          }
          
          ?>
         
        </tbody>
      </table>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>
