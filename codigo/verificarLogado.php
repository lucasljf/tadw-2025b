<?php
    session_start();
    if (!isset($_SESSION['logado'])) {
        header("Location: index.php");
    }
?>