<?php
session_start();
session_destroy();
header("Location: usuarios/login.php");
exit();
