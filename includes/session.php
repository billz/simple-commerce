<?php

// session_destroy();
// echo 'session destroyed!';
// exit();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
