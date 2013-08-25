<?php

session_start();
unset($_SESSION['order']);
header('Location: place-order.php');
exit;
