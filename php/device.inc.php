<?php

     include 'config.inc.php';
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['device']) && isset($_POST['jenis'])&& isset($_POST['pemakai']))
     {
		  // Innitialize Variable
		  $result='';
	   	  $device = $_POST['device'];
          $jenis = $_POST['jenis'];
            $pemakai = $_POST['pemakai'];
		  
		  // Query database for row exist or not
          $sql = 'SELECT * FROM device WHERE  device = :device AND jenis = :jenis AND pemakai = :pemakai';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':device', $device, PDO::PARAM_STR);
          $stmt->bindParam(':jenis', $jenis, PDO::PARAM_STR);
          $stmt->bindParam(':pemakai', $pemakai, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$stmt->rowCount())
          {
			  	$result="false";
          }
		  
		  // send result back to android
   		  echo $result;
  	}
	
?>