<?php

include_once './include/session.include.php';
session_destroy();

header("Location: ./login");
exit();
?>