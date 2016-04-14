<?php
	$login = new Login();
	
	if(action){
		switch(action){
			case 'logar':
				$login->logar($_POST['user'],$_POST['pass']);
			break;
			
			case 'logout':
				$login->logout();
			break;
		}
	}
?>