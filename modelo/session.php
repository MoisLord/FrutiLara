<?php
if (!isset($_SESSION)) {
    session_start();
}

if (@$_SESSION['nivel']) {
    $type_user = $_SESSION['nivel'];
} else {
    @header('Location: .');
}

// if (isset($_GET['close_session'])) {
//     session_unset();
//     session_destroy();
//     @header('Location: /Frutilara/');
// }