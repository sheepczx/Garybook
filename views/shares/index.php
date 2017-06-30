<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class= "btn btn-success btn-share" href="<?php echo ROOT_PATH?>shares/add">add something</a>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']?></h3>
			<small class="pull-right"><?php echo $item['name'];?></small>
			<small><?php echo $item['create_date']; ?> </small>
			</br>
			<p> <?php echo $item['body']; ?> </p>
			</br>
			<a class= "btn btn-default float-left" href="<?php echo $item['link']; ?>" target="_blank">Go to site</a>
				<?php if(isset($_SESSION['is_logged_in'])) : ?>
					<form class="float-right" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
						<input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
						<input class="btn btn-danger" type="submit" name="delete" value="Delete" >
						<input class="btn btn-info" type="submit" name="delete" value="Edit" >
						<input type="text" name="comment" placeholder="add a comment">
						<input class="btn btn-primary" type="submit" name="comment" value="Comment">
					</form>
				<?php endif;?>
		</div>
	<?php endforeach; ?>
</div>