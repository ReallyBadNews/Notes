<html>
	<head>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=0.95">
		<title>Alex Bergin: Notes</title>
	</head>
	<body onload="startCover(); scaleCover()" onresize="scaleCover()" onkeyup="openCover()">
		<div id="header">NOTES<div class="button" onmouseup="togglePosCover();">+POST</div></div>
		<div id="noteArea">
		<?php				
			$con = mysql_connect("localhost","alexberg_submit","perswerd");
			if (!$con) {
				die('Could not connect: ' . mysql_error());
				}
		
		    mysql_select_db("alexberg_notes", $con); 							    							    							  							  					    							    
	    							
		    $result = mysql_query("SELECT * FROM `notelist` ORDER BY `idnumber` DESC LIMIT 0, 256 ");
		    $idGen = 0;
		while($row = mysql_fetch_array($result)) {
			$messageString = $row['message'];
			$deathTime = $row['deadtime'];
			$idGen = $idGen + 1;
			$livetime = ( intval($deathTime) - time() ) * 1000;
			if ( $deathTime > time() ){
				if ( substr($messageString,0,3) == substr("http",0,3) ){
					if ( substr($messageString,-3) == substr(".gif",-3) or substr($messageString,-3) == substr(".png",-3) or substr($messageString,-3) == substr(".jpg",-3) or substr($messageString,-3) == substr(".jpe",-3) or substr($messageString,-3) == substr(".tif",-3)){
						echo '<script>setTimeout("hidePost(\'post'.$idGen.'\')",'.$livetime.')</script><a href="'.$messageString.'"><div id="post'.$idGen.'" class="note" style="background-image:url('.$messageString.')"></div></a>';
					} else {
						echo '<script>setTimeout("hidePost(\'post'.$idGen.'\')",'.$livetime.')</script><a href="'.$messageString.'"><div id="post'.$idGen.'" class="note" style="background-color:rgba(231,207,255,1); text-decoration:underline;">'.$messageString.'</div></a>';
					}
				} else {
					echo '<script>setTimeout("hidePost(\'post'.$idGen.'\')",'.$livetime.')</script><div id="post'.$idGen.'" class="note">'.$messageString.'</div>';	
				}
			}
		} ?>
		</div>
		<div id="cover" onmouseup="togglePosCover()"></div>
		<div id="postForm">
			<form id="submitpost" name="submitpost" method="post" action="submit.php">
				<textarea id="textToPost" name="textToPost" placeholder="note:" autocomplete="off" style="height:236px;"></textarea><br />
				<input id="expireTime" name="expireTime" autocomplete="off" placeholder="lifetime:(min)" /><br />
				<input id="password" name="password" autocomplete="off" type="password" placeholder="password:" style="height:38px;"/><br />
				<div class="submitButton s1" onmouseup="submitForm()">Post</div><div class="submitButton" onmouseup="togglePosCover()">Cancel</div>
			</form>
		</div>
	</body>
</html>
