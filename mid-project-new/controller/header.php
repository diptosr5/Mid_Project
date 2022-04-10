<?php

if (!isset($_COOKIE['flag'])) {
	header('location: ../views/login.html');
}
