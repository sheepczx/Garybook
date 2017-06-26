<?php
class users extends controller{
	protected function register(){
		$viewmodel = new Usermodel();
		$this->returnView($viewmodel->register(), true);
	}
	
	protected function login(){
		$viewmodel = new Usermodel();
		$this->returnView($viewmodel->login(), true);
	}
	
	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy;
		header('Location: ' .ROOT_URL);
	}
}