<?php

class Response {

	static function json ($data) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}