<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['nivel']) && $_SESSION['nivel']) {
    header('Location: /Frutilara/');
    exit;
}

// if (isset($_GET['close_session'])) {
//     session_unset();
//     session_destroy();
//     @header('Location: /Frutilara/');
// }