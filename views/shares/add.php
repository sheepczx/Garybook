<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Share something</h3>
	</div>
	<div class="panel-body">
		<form method="post" action= "<?php $_SERVER['PHP_SELF']?>">
			<div class="form-group">
				<label> Share Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo (isset($_SESSION['edit']['title']) ?($_SESSION['edit']['title']): "")?>"/> 
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"><?php echo (isset($_SESSION['edit']['body']) ?($_SESSION['edit']['body']): "")?></textarea>
			</div>
			<div class="form-group">
				<label> Link</label>
				<input type="text" name="link" class="form-control" value="<?php echo (isset($_SESSION['edit']['link']) ?($_SESSION['edit']['link']): "")?>" /> 
			</div>
			<?php if(!isset($_SESSION['edit'])): ?>
			<input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
			<?php else:?>
			<input class="btn btn-primary" name="submit" type="submit" value="Update"/>
			<?php endif;?>
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
		</form>
	</div>
	<?php  
	//print_r ($_SESSION['edit']);
	//echo $edit;
	//unset ($_SESSION['edit']);?>
</div>