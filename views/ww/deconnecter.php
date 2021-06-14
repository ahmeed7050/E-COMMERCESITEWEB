<?php
session_start();
unset($_SESSION['connecte']);
unset($_SESSION['pseudo']);
header('location: ' . $router->url('home'));
