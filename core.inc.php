<?php
require "connection.php";
	session_start();
    function loggedin()
    {
        if(isset($_SESSION['id']) && isset($_SESSION['br']))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
?>	