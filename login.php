<?php 
  require_once 'functions.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && login($_POST)) {
    header('Location: '. pathUrl());
  }

  if (isset($_SESSION['user'])) {
    header('Location: '. pathUrl());
  }
?>
<?php include 'header.php'; ?>

<div class="container">
  <form action="<?php echo pathUrl() . 'login.php'; ?>" method="POST">
    <div class="form-group">
      <label for="usr">Email:</label>
      <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="usr">Password:</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit">Login</button>
  </form>
</div>

<?php include 'footer.php'; ?>