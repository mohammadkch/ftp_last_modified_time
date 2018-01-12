<!DOCTYPE html>
<html lang="en-US">
<head>
<script>
	setTimeout(function(){ location.reload(true); }, 30000);
</script>
<body>
<?php

	$direction = "public_html/example";
	$ftp_server = 'www.example.net';
	$ftp_username = "example_username";
	$ftp_password = "example_password";
	
	
	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, $ftp_username, $ftp_password);
	ftp_chdir($ftp_conn, $direction);
	
	$files1 = ftp_nlist($ftp_conn, ".");
	$cnt = count($files1);
	
	$result = array();
	
	for($i=2; $i < $cnt-1 ; $i++)
	{
		$result[$files1[$i]] = gmdate("Y-m-d H:i:s", ftp_mdtm($ftp_conn, $files1[$i]));
	}
	
	echo '<pre>';
	print_r($result);
?>
