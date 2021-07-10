<?php

function sanitizeInput($input) {
	
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	  );
	
		$output = preg_replace($search, '', $input)
		;
		return $output;
  }


 function sanitizeText($input) {

	  $search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	  );
	
		$output = preg_replace($search, '', $input);
		return $output;
  } 

function uploadFile($file){
	
	require_once('../../PHPExcel/PHPExcel/IOFactory.php');

	$objPHPExcel = PHPExcel_IOFactory::load($file);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		for($row = 1; $row <= $highestRow; ++ $row) {
			$val = array();
			for ($col = 0; $col < $highestColumnIndex; ++ $col) {
			   $cell = $worksheet->getCellByColumnAndRow($col, $row);
			   $val[] = $cell->getValue();
			}
		
			$uploadResult = insertNewStudent($val);
			//$uploadResult = insertNewStaff($val);
		}	
	}

	return $uploadResult;
}

function getSections($section, $trackID){
	
	if($section != ""){
		$verifySection = query("SELECT sectionID FROM tbl_sections","WHERE section = :section",[":section" => $section],"variable",1);
		
		if(!empty($verifySection)){
			$sectionID = $verifySection["row"]["sectionID"];
		}else{
			query("INSERT INTO tbl_sections(section, trackID) VALUES(:section, :trackID)","",[":section" => $section, ":trackID" => $trackID]);
			$getSectionID = query("SELECT sectionID FROM tbl_sections","WHERE section = :section",[":section" => $section],"variable",1);
			$sectionID = $getSectionID["row"]["sectionID"];
		}
	}else{
		$sectionID = 0;
	}
	
	return $sectionID;
}

function getTrack($track){
	
	if($track != ""){
		$verifyTrack = query("SELECT trackID FROM tbl_tracks","WHERE track = :track",[":track" => $track],"variable",1);
		if(!empty($verifyTrack)){
			$trackID = $verifyTrack["row"]["trackID"];
		}else{
			query("INSERT INTO tbl_tracks(track) VALUES(:track)","",[":track" => $track]);
			$getTrackID = query("SELECT trackID FROM tbl_tracks","WHERE track = :track",[":track" => $track],"variable",1);
			$trackID = $getTrackID["row"]["trackID"];
		}
	}else{
		$trackID = "";
	}
	return $trackID;
}

function insertNewStudent($studentInfo){
	
	$studentName = $studentInfo[2];
	$trackID = getTrack($studentInfo[4]);
	$sectionID = getSections($studentInfo[3], $trackID);
	$degree = $studentInfo[5];
	
	query("INSERT INTO tbl_students(studentName, sectionID, trackID, degree) VALUES(:studentName, :sectionID, :trackID, :degree)","",[":studentName" => $studentName, ":sectionID" => $sectionID, ":trackID" => $trackID, ":degree" => $degree]);
	
	return 1;
}

function insertNewStaff($staffInfo){
	$staffName = $staffInfo[0];
	$staffPosition = $staffInfo[1];
	
	query("INSERT INTO tbl_teachers(teacherName, position) VALUES(:teacherName, :position);","",[":teacherName"=> $staffName, ":position" => $staffPosition]);
	
}

