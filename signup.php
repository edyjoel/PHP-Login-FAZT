<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Signup</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php if( !empty( $message ) ): ?>

<p><?php echo $message; ?></p>

<?php endif; ?>

  <div class="container">

  	<div class="row">
      <div class="col-sm-12 text-center">
        <h1>Registrate</h1> 
      </div>
  		
  	</div>

	<div class="row">
    <div class="col-md-12 text-center">
      <a href="login.php">Login</a>   
    </div>
		
	</div>

  <div class="row">

<div class="col-sm-12">

<form action="signup.php" method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="email" placeholder="Enter your mail">
    </div>
    <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Enter you password">
    </div>

    <div class="form-group">
    <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm you password">
    </div>
    
    <input class="btn btn-primary w-100" type="submit" value="send">
  </form>

</div>
  
</div>


    
    
  </div>
  

</body>
</html>