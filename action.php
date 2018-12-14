<?php
	
	if (isset($_POST["action"])) {
		
		$output = '';
		$connect = mysqli_connect("localhost", "root", "", "ajax_crud");

		if($_POST["action"] == "Add"){
			$first_name = mysqli_real_escape_string($connect, $_POST["firstName"]);
			$last_name = mysqli_real_escape_string($connect, $_POST['lastName']);

			$procedure = "
			CREATE PROCEDURE insertUser(IN firstName varchar(255), lastName varchar(255))
			BEGIN
				INSERT INTO users(first_name, last_name) VALUES (firstName, lastName);
			END;
			";
			if (mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertUser")) {
				# code...
				if (mysqli_query($connect, $procedure)) {
					$query = "CALL insertUser('".$first_name."', '".$last_name."')";
					mysqli_query($connect, $query);
					echo 'Data Inserted';

				}
			}
		}
	}


?>