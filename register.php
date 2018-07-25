<?php 
  require_once 'functions.php';

  $hasErrors = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = register($_POST);
    
    if (!$result) {
      $hasErrors = "The username or email has been already used.";
    }
  }
?>
<?php include 'header.php'; ?>

<div class="container">
<form action="<?php echo pathUrl() . 'register.php'; ?>" method="POST">
  <?php if($hasErrors) { ?>
    <div class="alert alert-danger">
      <?php echo $hasErrors; ?>
    </div>
  <?php } ?>
  <div class="form-group">
    <label for="usr">Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="usr">Email:</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit">Save</button>
</form>
</div>

<?php include 'footer.php'; ?>