<?php
require 'ayarlar.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: giris.php");
?>