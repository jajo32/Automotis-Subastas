<?php 

/*
 * Created on 18/04/2011
 *
 * automotis  Copyright (C) <2011>  Manuel Camargo
 * This program comes with ABSOLUTELY NO WARRANTY; 
 * This is free software, and you are welcome to redistribute it
 * under certain conditions; Read README file for more information

 */


session_start();

//include("topheader.php");
include("config.php");
include("include/gen_functions.php");
include("lang/$lang.php");


if(isset($_REQUEST['exit']))
{
	
	session_destroy();
	
	if(!session_is_registered('nombre'))
	{
		echo "<center><font color=red><strong>$lang_index_logout</strong></font></center><br />";
		echo ("<center><a href='index.php'>$lang_index_back</a></center>");
	}
}
else
{
	if($_SESSION['nivelusuario'] < 1)
	{
		include("login.php");  
	} 
	else 
	{
		echo ("$lang_index_welcome<br><br>");
		echo "<hr>";
			
		if ($_SESSION['nivelusuario'] >= 1)
		{
			echo("<center><a href='subastasv2.php'>Acceso a Subastas</a></center>");
			echo "<hr>";
		}
			
			if($_SESSION['nivelusuario'] >= 5)
			{

				echo("<center>$lang_index_admin_menu:<br>
					<a href='administracion.php'>Administracion</a><br>
					<a href='usuarios.php'>Gestion Usuarios</a><br>
					<a href='vehiculos.php'>Gestion Vehiculos</a>
					</center>");
				echo "<hr>";

			}

		include("footer.php");
	}
}



?>
