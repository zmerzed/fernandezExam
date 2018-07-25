<?php 
	require_once 'functions.php'; 
	$posts = posts();
?>
<?php include 'header.php'; ?>

<div class="container">

	<?php if (isset($_SESSION['user'])) { ?>
		<div class="row">
			<a class="btn btn-default" href="<?php echo pathUrl() . 'newPost.php'?>">New Post</a>
		</div>
	<?php } ?>

	<?php if (user()) { ?>
		<div class="row">
		<h1>POSTS</h1>
			<ul class="list-group">
				<?php foreach ($posts as $post) { ?>
					<li class="list-group-item">
						<h4 style="margin:0"><?php echo $post['title'] ?></h4>
						<?php echo $post['content'] ?>
						<hr style="margin:0">
						<small>created at : <?php echo $post['created_at']; ?></small>
						<br>

						<?php if (count($post['comments'])) { ?>
							<strong>Comments</strong>
							<br>
							<ul>
							<?php foreach ($post['comments'] as $comment) { ?>
								<li><?php echo $comment['comment']; ?> </li>
						
							<?php } ?>
							</ul>
						<?php } ?>
					
						<br>
							<span>Posted By <a href="javascript:void(0)"><?php echo $post['username']; ?></a></span>
							<div>
							<?php if (isMyControl($post, user()['id'])) { ?>
									<a href="<?php echo pathUrl() . 'deletePost.php?p=' . $post['id'] ?>">Delete</a>
									<a href="<?php echo pathUrl() . 'editPost.php?p=' . $post['id'] ?>">Edit</a>
							<?php } ?>
							<a href="<?php echo pathUrl() . 'commentPost.php?p=' . $post['id'] ?>">Comment</a>
							<br>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
</div>

<?php include 'footer.php'; ?>