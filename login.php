<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $connect->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: index.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">

 

<div class="row">

<div class="col-sm-12">

  <h1 class="text-center">login</h1>

  <?php if(!empty($message)): ?>
      <p> <?php echo $message; ?></p>
    <?php endif; ?>
<form clas action="login.php" method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="email" placeholder="Enter your mail">
    </div>
    <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Enter you password">
    </div>
    
    <input class="btn btn-primary w-100" type="submit" value="send">
  </form>

</div>
  
</div>



<div class="row">
  <div class="col-sm-12 text-center">

    <a class="text-center" href="./signup.php">Singup</a>    

  </div>
  
</div>




</div>
  
</body>
</html>