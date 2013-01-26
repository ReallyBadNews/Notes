<?php

$password = $_POST['password'];
if ( $password == "publicaccess" ){
	
	function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href","$");
      return str_replace($bad,"",$string);
    }

	$con = mysql_connect("localhost","alexberg_submit","perswerd");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
		}

    mysql_select_db("alexberg_notes", $con);

    $cleanThis = $_POST['textToPost'];
    $cleanThis2 = $_POST['expireTime'];
    $addThis = clean_string($cleanThis);
    $addThis2 = intval(clean_string($cleanThis2)) * 60 + time();
    if ( $addThis2 - time() > 21600 ){ $addThis2 = 21600 + time(); }
    
    if ( strlen($addThis) == 0 ){
	    header('location:index.php');
	    die();
    }
    
    if ( strlen($addThis2) == 0 ){
	    header('location:index.php');
	    die();
    }
        
    $sql = "INSERT INTO `notelist`(`message`,`deadtime`)
              VALUES ('$addThis','$addThis2')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
}

header('location:index.php');

die();


	
?>