<?php
    session_start();
    session_destroy();

    header("Location: Tlogin.php");
    die();