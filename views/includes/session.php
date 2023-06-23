<?php

	if(!isset($_SESSION['user']) || trim($_SESSION['user']['email']) == ''){
		header('location: ../');
		exit();
	}