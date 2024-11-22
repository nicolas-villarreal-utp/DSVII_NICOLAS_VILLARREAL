<?php

session_start();

//logout.php
include('clientegoogle.php');

//Reset OAuth access token
$client->revokeToken();

//Destroy entire session data.
//session_unset();
session_destroy();

//redirect page to index.php
header('location:index.php');

exit;

?>