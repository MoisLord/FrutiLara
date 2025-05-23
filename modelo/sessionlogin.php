<?php
if (!isset($_SESSION)) {
    session_start();
}

if (@$_SESSION['nivel']) {
    @header('Location: /Frutilara/');
} else {
    $type_user = $_SESSION['nivel'];
}

// if (isset($_GET['close_session'])) {
//     session_unset();
//     session_destroy();
//     @header('Location: /Frutilara/');
// }