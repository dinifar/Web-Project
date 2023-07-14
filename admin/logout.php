<?php 

	session_start();
	$_SESSION['id'] = '';
	echo "<script>window.location.href='indexadmin.php'</script>";

?>