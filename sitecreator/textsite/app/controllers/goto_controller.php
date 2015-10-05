<?php
class GotoController extends Controller {
	public function index( $params ) {
		$model = $this->model( 'goto' );
		$url = $model->getUrl( $params );
		header( "location: " . $url ); //Redirect to Merchant
		exit(0);
	}

}
