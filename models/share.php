<?php
class ShareModel extends model{
	public function Index(){
		$this->query('SELECT title, body, create_date, name, shares.id FROM shares JOIN users ON user_id=users.id ORDER BY create_date DESC');
		$rows = $this->resultSet();
		
		//delete
		if(isset($_POST['delete'])){
			if($_POST['delete']){
				$delete_id = $_POST['delete_id'];
				$this->query('DELETE FROM shares WHERE id = :id');
				$this->bind(':id', $delete_id);
				$this->execute();
				header('location: '.ROOT_URL.'shares');
			}
		}
		return $rows;
	}
	
	public function add() {
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if($post['submit']){
			if($post['title']==''||$post['body']==''||$post['link']==''){
				Messages::setMsg('Please fill in all fields', 'error');
				return;
			}
			// Insert into Mysql
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->execute();
			
			//Verify
			if($this->lastInsertId()){
				//redirect
				header('location: '.ROOT_URL.'shares');
			}		
		}
		return;
	}
	public function remove() {
		if($_POST['delete']){
			$delete_id = $_POST['delete_id'];
			echo $delete_id;
			/*
			$delete_id = $_POST['delete_id'];
			$dbh->query('DELETE FROM shares WHERE id = :id');
			$dbh->bind(':id', $delete_id);
			$dbh->execute();
			return;*/
		}
	}
}