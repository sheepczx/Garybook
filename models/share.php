<?php
class ShareModel extends model{
	public function Index(){
		$this->query('SELECT title, body, create_date, name, shares.id FROM shares JOIN users ON user_id=users.id ORDER BY create_date DESC');
		$rows = $this->resultSet();
		
		//delete
		if(isset($_POST['delete'])){
			if(($_POST['delete'])== 'Delete'){
				$delete_id = $_POST['delete_id'];
				$this->query('DELETE FROM shares WHERE id = :id');
				$this->bind(':id', $delete_id);
				$this->execute();
				header('location: '.ROOT_URL.'shares');
			}
			if(($_POST['delete'])== 'edit'){
				$this->query('SELECT * FROM shares WHERE id =:id');
				$this->bind(':id', $_POST['delete_id']);
				$this->execute();
				$_SESSION['edit'] = $this->single();
				$edit=$_SESSION['edit'];
				//return $edit;
				header('location: '.ROOT_URL.'shares/add');
			}
		}
		return $rows;
	}
	
	public function add() {
		
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if($post['submit']== 'Submit'){
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
		if($post['submit']== 'Update'){
			if($post['title']==''||$post['body']==''||$post['link']==''){
				Messages::setMsg('Please fill in all fields', 'error');
				return;
			}
			print_r($post);
			echo $_SESSION['edit']['id'];
			// update Mysql
			$this->query('UPDATE shares SET title=:title, body=:body, link=:link WHERE id = :id');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':id', $_SESSION['edit']['id']);
			$this->execute();
			unset ($_SESSION['edit']);
			header('location: '.ROOT_URL.'shares');
				
		}
		return;
	}
	
}