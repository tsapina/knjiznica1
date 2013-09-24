<?php
session_start();
function upit($sql)
{
	mysql_set_charset('utf8');
	$rez = mysql_query($sql);
	$rezultat = array();
	while($item = mysql_fetch_array($rez))
	{
		$rezultat[] = $item;
	}
	return $rezultat;
}

function zapis($sql)
{
	mysql_set_charset('utf8');
	$zapis = mysql_query($sql) or die(mysql_error());
	if($zapis)
	{
		return true;
	}
	else 
	{
		return false;
	}
}

function isLogiran()
{
	$logiran = true;
	if (!isset($_SESSION['logiran'])) 
	{
		$logiran = false;
	}
	return $logiran;
}

function checkLogin()
{
	if (isLogiran() == false) 
	{
		header('location: index.php');
	}
}
?>