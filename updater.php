<?php
	require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{
		$numberName = count($_POST["name"]);
		$numberComp = count($_POST["comp"]);
		if($numberName > 1 && $numberComp > 1){
			for($i = 0; $ $i < $numberName; $i++){
				if(trim($_POST["name"][$i]) != ''){

				}else{
					
				}
			}
		}else{
			echo "Please Enter the name "
		}
	}else{
		header('Location:404.html');
	}
?>