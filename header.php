<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo pathUrl() ?>">>></a>
    </div>
    <ul class="nav navbar-nav">
	  	<?php if (!isset($_SESSION['user'])) { ?>
			<li><a href="<?php echo pathUrl() . 'register.php'?>">Register</a></li>
			<li><a href="<?php echo pathUrl() . 'login.php'?>">Login</a></li>
		<?php } else { ?>
			<li><a href="<?php echo pathUrl() . 'logout.php'?>">Logout</a></li>
		<?php } ?>
    </ul>
    
    <?php if (user()) {?>
      <span class="pull-right"><?php echo user()['email']; ?></span>
    <?php } ?>
  </div>
</nav>