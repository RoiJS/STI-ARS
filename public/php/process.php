<?php 

require_once('../../functions/sqlQuery.function.php');
require_once('../../functions/system.function.php');
require_once('../../library/directoryPath.php');

$PATH_ADMIN = '../../views/admin/';
$PATH_USER = '../../views/user/';
$PATH_GENERAL = '../../views/';	


if(isset($_POST["import-student-file"])){
	uploadFile($_FILES['file-import-file']['tmp_name']);
	header("location: ../../?pg=user");
	exit;
}

if(isset($_POST["showComponents"])){
	$components = $_POST["components"];
	if($components == "studentList"){
		$studentList = query("SELECT * FROM tbl_students a ORDER BY studentName ASC;","","","variable");
		include_once($PATH_USER."registration/studentList.php");
	}
	
	if($components == "teacherList"){
		$teacherList = query("SELECT * FROM tbl_teachers a ORDER BY teacherName ASC","","","variable");
		include_once($PATH_USER."registration/teacherList.php");
	}
}

if(isset($_POST["action"])){
	
	// =============== Student =================
	if($_POST["action"] == "searchStudent"){
		$studentData = $_POST["studentData"];
		
		$studentList = query("SELECT * FROM tbl_students a","WHERE id = :id",[":id" => $studentData],"variable");
		
		require_once($PATH_USER."registration/studentList.php");
		exit;
	}

	if($_POST["action"] == "registerStudent"){
		$studentID = $_POST["studentData"];
		
		query("UPDATE tbl_students","SET registrationStatus = :status, account_id = :account_id WHERE id = :id",[":status" => 1, ":account_id" => $_SESSION["account_id"], ":id" => $studentID]);
		exit;
	}

	if($_POST["action"] == "verifyRegistrationStatus"){
		$studentID = $_POST["studentID"];
		$registrationStatus = query("SELECT registrationStatus FROM tbl_students","WHERE id = :id",[":id" => $studentID],"variable",1);
		echo $registrationStatus["row"]["registrationStatus"];
		exit;
	}

	if($_POST["action"] == "getRegistrationStatus"){
		$totalRegisteredStudents = query("SELECT COUNT(*) AS totalRegisteredStudents FROM tbl_students WHERE registrationStatus = 1","","","variable",1);
		$totalStudents = query("SELECT COUNT(*) AS totalStudents FROM tbl_students","","","variable",1);
		
		$percentage = floor((($totalRegisteredStudents["row"]["totalRegisteredStudents"] / $totalStudents["row"]["totalStudents"]) * 100));
		$status = array($totalRegisteredStudents["row"]["totalRegisteredStudents"], $percentage);
		echo json_encode($status);
		exit;
	}

	if($_POST["action"] == "login"){
		session_start();
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$verify = query("SELECT accountID FROM tbl_accounts","WHERE username = :username AND password = :password",[":username" => $username, ":password" => $password],"variable",1);
		
		if(!empty($verify)){
			$_SESSION["account_id"] = $verify["row"]["accountID"];
			echo 1;
		}else{
			echo 0;
		}
		
		exit;
	}

	if($_POST["action"] == "importStudentForm"){
		require_once($PATH_USER."registration/importStudentForm.php");
		exit;
	}
	// =========== Teacher ====================
	
	if($_POST["action"] == "searchTeacher"){
		$teacherData = $_POST["teacherData"];
		
		$teacherList = query("SELECT * FROM tbl_teachers a","WHERE teacherID = :id",[":id" => $teacherData],"variable");
		
		require_once($PATH_USER."registration/teacherList.php");
		exit;
	}
	
	if($_POST["action"] == "verifyTeacherRegistrationStatus"){
		$teacherID = $_POST["teacherData"];
		$registrationStatus = query("SELECT registrationStatus FROM tbl_teachers","WHERE teacherID = :id",[":id" => $teacherID],"variable",1);
		echo $registrationStatus["row"]["registrationStatus"];
		exit;
	}
	
	if($_POST["action"] == "registerTeacher"){
		$teacherID = $_POST["teacherData"];
		
		query("UPDATE tbl_teachers","SET registrationStatus = :status WHERE teacherID = :id",[":status" => 1, ":id" => $teacherID]);
		exit;
	}
	
	if($_POST["action"] == "getTeacherRegistrationStatus"){
		$totalRegisteredTeachers = query("SELECT COUNT(*) AS totalRegisteredTeachers FROM tbl_teachers WHERE registrationStatus = 1","","","variable",1);
		$totalTeachers = query("SELECT COUNT(*) AS totalTeachers FROM tbl_teachers","","","variable",1);
		
		$percentage = floor((($totalRegisteredTeachers["row"]["totalRegisteredTeachers"] / $totalTeachers["row"]["totalTeachers"]) * 100));
		$status = array($totalRegisteredTeachers["row"]["totalRegisteredTeachers"], $percentage);
		echo json_encode($status);
		exit;
	}
}

