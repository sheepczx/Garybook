<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class= "btn btn-success btn-share" href="<?php echo ROOT_PATH?>shares/add">add something</a>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']?></h3>
			<small class="pull-right"><?php echo $item['name'];?></small>
			<small><?php echo $item['create_date']; ?> </small>
			</hr>
			<p> <?php echo $item['body']; ?> </p>
			</br>
			<a class= "btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go to site</a>
			<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
				<input class="btn btn-danger" type="submit" name="delete" value="Delete" />
			</form>
			
			<?php // echo '<pre>'; print_r ($item); echo'</pre>'; ?>
		</div>
	<?php endforeach; ?>
</div>

<?php
/* csak teszt deletehez 
if($_POST['delete']){
			$delete_id = $_POST['delete_id'];
			echo $delete_id;
			
			$delete_id = $_POST['delete_id'];
			$dbh->query('DELETE FROM shares WHERE id = :id');
			$dbh->bind(':id', $delete_id);
			$dbh->execute();
			return;
		}*/