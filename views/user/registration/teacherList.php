<?php if(!empty($teacherList)){?>
	<?php foreach($teacherList as $teacher){?>
		<tr>
			<td><?php echo $teacher["row"]["teacherName"];?></td>
			<td><?php echo $teacher["row"]["position"];?></td>
			<?php if($teacher["row"]["registrationStatus"] == 1){?>
				<td><button class="btn btn-warning" disabled >Registered</button></td>
			<?php }else{?>
				<td><button class="btn btn-success" id="btn-register-teacher<?php echo $teacher["row"]["teacherID"];?>" onclick="teacherRegistrationController.registerTeacher(<?php echo $teacher["row"]["teacherID"];?>);">Register</button></td>
			<?php }?>
		</tr>
	<?php }?>
<?php }else{?>
	
<?php }?>
