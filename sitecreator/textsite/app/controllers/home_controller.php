<?php
class HomeController extends Controller {
	function index() {
		$this->layout = HOME_LAYOUT;
		$this->view = 'index';
		$this->currentPage = 'home-page';
		$this->homeMenuState = true;
	}
}
