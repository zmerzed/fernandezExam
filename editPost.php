<?php 
   
    require_once 'functions.php';
    
    $post = NULL;

    if (isset($_GET['p'])) {
        $post = getPost($_GET['p']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = user();

        if ($user) {
            $result = newPost($_POST, $user['id']);
        }
    }
?>

<?php include 'header.php'; ?>

<div class="container">
    <h3>Edit <?php echo $post['title']; ?></h3>

    <form action="<?php echo pathUrl() . 'newPost.php' ?>" METHOD="POST">
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" value="<?php echo $post['title'] ?>"/>
        </div>
        <div class="form-group">
            <label for="usr">Content:</label>
            <textarea name="content" id="" rows="10" class="form-control" placeholder="content"><?php echo $post['content'] ?></textarea>
            <button type="submit">Done</button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>