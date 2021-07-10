<?php if(!empty($studentList)){?>
	<?php foreach($studentList as $student){?>
		<tr>
			<td><?php echo $student["row"]["studentName"];?></td>
			<td>
				<?php $track = query("SELECT track FROM tbl_tracks","WHERE trackID = :trackID",[":trackID" => $student["row"]["trackID"]],"variable",1); ?>
				<?php echo (!empty($track["row"]["track"])) ? $track["row"]["track"] : "";?>
			</td>
			<td>
				<?php $section = query("SELECT section FROM tbl_sections","WHERE sectionID = :sectionID",[":sectionID" => $student["row"]["sectionID"]],"variable",1); ?>
				<?php echo (!empty($section["row"]["section"])) ? $section["row"]["section"] : "";?>
			</td>
			<td><?php echo $student["row"]["degree"];?></td>
			<?php if($student["row"]["registrationStatus"] == 1){?>
				<td><button class="btn btn-warning" disabled >Registered</button></td>
			<?php }else{?>
				<td><button class="btn btn-success" id="btn-register-student<?php echo $student["row"]["id"];?>" onclick="registrationController.registerStudent(<?php echo $student["row"]["id"];?>);">Register</button></td>
			<?php }?>
		</tr>
	<?php }?>
<?php }else{?>
	
<?php }?>
