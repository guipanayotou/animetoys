<?php

if (isset($_SESSION['usuario'])) {
    $logado = unserialize($_SESSION['usuario']);

    if ($logado->getId() == '') {
        header("Location: ./login");
        exit();
    }
} else {
    header("Location: ./login");
    exit();
}
?>