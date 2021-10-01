<?php


session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");

if(isset($_POST)) {
	$to  = $_POST['to'];

	$profile = mysqli_real_escape_string($conn, $_POST['profile']);
	$procedure = mysqli_real_escape_string($conn, $_POST['procedure']);
	$prepare = mysqli_real_escape_string($conn, $_POST['prepare']);
	$tips = mysqli_real_escape_string($conn, $_POST['tips']);
	$overall = mysqli_real_escape_string($conn, $_POST['overallexp']);

	$check = "SELECT * FROM experience WHERE id_user = '$_SESSION[id_user]' AND id_company=$to";
	$ans = $conn->query($check);
	if($ans->num_rows>0)
	{
		$sql = "UPDATE experience SET job_profile='$profile',selection_procedure='$procedure',way_to_prepare='$prepare',tips_advise='$tips',overall_exp='$overall' WHERE id_user = '$_SESSION[id_user]' AND id_company=$to";
		if($conn->query($sql)===TRUE)
		{
			header("Location: fill-experience.php");
			exit();
		}
		else
		{
			echo $conn->error;
		}
	}
	else
	{
		$sql = "INSERT INTO experience (id_user, id_company, job_profile, selection_procedure, way_to_prepare, tips_advise, overall_exp) VALUES ('$_SESSION[id_user]', '$to', '$profile', '$procedure', '$prepare', '$tips', '$overall')";

		if($conn->query($sql) == TRUE) 
		{
			header("Location: fill-experience.php");
			exit();
		} 
		else 
		{
		echo $conn->error;
		}
	}
} 
else {
	header("Location: fill-experience.php");
	exit();
}