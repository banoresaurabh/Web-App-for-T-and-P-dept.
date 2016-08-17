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

    function adminloggedin(){
        if( isset($_SESSION['email']) && isset($_SESSION['branchM']))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
?>	