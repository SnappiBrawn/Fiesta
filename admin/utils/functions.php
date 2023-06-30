<?php
require_once 'classes/StuUser.php';
require_once 'classes/FacUser.php';

function is_logged_in() {
    start_session();
    return (isset($_SESSION['user']));
}

function start_session() {
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}
?>
