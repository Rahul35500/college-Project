<?php


session_start();


require_once("db.php");

if(isset($_POST)) {

	//Escape Special Characters In String First
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);

	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);


	//sql query to check if email already exists or not
	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);

	//if email not found then we can insert new data
	if($result->num_rows == 0) {

			
		$uploadOk = true;

		//Folder where you want to save your image. 
		$folder_dir = "uploads/logo/";

		//Getting Basename of file. 
		$base = basename($_FILES['image']['name']); 

		//This will get us extension of your file. 
		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		//Setting a random non repeatable file name. 
		$file = uniqid() . "." . $imageFileType; 
	  
		//This is where your files will be saved so in this case it will be uploads/image/newfilename
		$filename = $folder_dir .$file;  

		//We check if file is saved to our temp location or not.
		if(file_exists($_FILES['image']['tmp_name'])) { 

			//check if file type is of our allowed extention or not.
			if($imageFileType == "jpg" || $imageFileType == "png")  {

				//check file size with our limit size
				if($_FILES['image']['size'] < 5000000) { // File size is less than 5MB

					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);

				} else {
					//Size Error
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					$uploadOk = false;
				}
			} else {
				//Format Error
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				$uploadOk = false;
			}
		} else {
				//File not copied to temp location error.
				$_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
				$uploadOk = false;
			}

		//If there is any error then redirect back.
		if($uploadOk == false) {
			//header("Location: register-company.php");
			//exit();
			
		}

		//sql new registration insert query
		$sql = "INSERT INTO company(name, companyname, country, state, city, contactno, website, email, password, aboutme, logo) VALUES ('$name', '$companyname', '$country', '$state', '$city', '$contactno', '$website', '$email', '$password', '$aboutme', '$file')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully then Set some session variables 
			$_SESSION['registerCompleted'] = true;
			header("Location: login-company.php");
			exit();

		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: register-company.php");
		exit();
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: register-company.php");
	exit();
}