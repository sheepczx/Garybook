<?php
class home extends controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->ReturnView($viewmodel->Index(), true);
	}
}