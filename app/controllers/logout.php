<?php
session_start();

include("../../src/path.php");

unset($_SESSION["user_id"]);
unset($_SESSION["login"]);
unset($_SESSION["password"]);
unset($_SESSION['user_type_id']);
header('location: ' . BASE_URL);