<?php
 $dbhost     = "localhost";
 $dbname     = "Portfolio";
 $dbuser     = "root";
 $dbpass     = "root";
	

try {
 $databaseConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
 $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if ($databaseConnection) {
 	echo "connected";
 }
} catch(PDOException $e) {
 echo 'ERROR: ' . $e->getMessage();
}
?>