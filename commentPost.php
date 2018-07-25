<?php 
   
    require_once 'functions.php';
    
    $post = NULL;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        commentPost($_POST['comment'], $_POST['post_id'], user()['id']);
        //header('Location: '. pathUrl());
    }

    if (isset($_GET['p'])) {
        $post = getPost($_GET['p']);
    } else {
        header('Location: '. pathUrl());
    }

?>

<?php include 'header.php'; ?>

<div class="container">
    <h4><?php echo $post['title']; ?></h4>
    <p>
        <?php echo $post['content'] ?>
    </p>
    <hr>
    <form action="<?php echo pathUrl() . 'commentPost.php?p=' . $post['id'] ?>" METHOD="POST">
        <div class="form-group">
            <label for="usr">New Comment:</label>
            <textarea name="comment" id="" rows="10" class="form-control" placeholder="comment"></textarea>
            <button type="submit">Done</button>
        </div>
        <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>" />
    </form>
    <hr>
    Comments
    <ul>
    </ul>
</div>

<?php include 'footer.php'; ?>