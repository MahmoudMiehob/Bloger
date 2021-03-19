<?php

    session_start();
    session_unset();
    session_destroy();

    header('REFRESH:1 ; URL=login.php');

?>