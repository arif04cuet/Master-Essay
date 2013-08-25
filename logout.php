<?php

session_start();
unset($_SESSION['frontend']);
header('Location: index.php');
exit;
