<?php require_once('views/header.php');?>
<input type="hidden" value="<?php echo $_GET['pg'];?>" class="page"/>
<input type="hidden" value="tbl_items" class="tblname"/>
<div id="body-container">
   <div id="body-content">
	<?php require_once('views/'.getPage().'/navbar.php');?>
	
	
     <section class="nav nav-page nav-page-fixed">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Students Registration<br/>
                            <small>STI College Zamboanga</small>
                        </h3>
                    </header>
                </div>
            </div>
        </div>
    </section>
	
	<section class="page container">
		<div class="row">
			
			<div class="span11">
				<div class="row">
					<div class="span11"> 
						<div class="nav-tabs-custom" >
							<ul class="nav nav-pills">
								<li class="active"><a href="#student-registration" data-toggle="tab">Student Registration</a></li>
								<li hidden><a href="#teacher-registration" data-toggle="tab">Teacher Registration</a></li>
							</ul>
						</div>
					</div>
					
					
					<div class="span16">
						<div class="row">
							<div class="span16">
									<div class="tab-content">
										<div class="tab-pane fade in active" id="student-registration">
											<div class="row">
												<div class="span5">
													<div class="row">
														<div class="span5">
															<div class="box well well-small well-shadow mainform">
																<div class="row">
																	<div style="text-align:center;float:left;width:50%;padding-left:40px;">
																		<i class="fa fa-users fa-5x"></i>
																		<p>Total number of registered students</p>
																	</div>
																	<div>
																		<h3 style="font-size:50px;margin-top:50px;float:right;margin-right: 30px;">
																			<span class="total-registered-students">0</span>
																			<br>
																			<span style="font-size:20px;" class="total-percentage">(0%)</span>
																		</h3>
																	</div>
																</div>
															</div>	
														</div>
														<div class="span5">
															<div class="box well well-small well-shadow mainform">
																<div class="row">
																	<div style="text-align:center;float:left;width:50%;padding-left:40px;">
																		<p>Total number of students</p>
																	</div>
																	<div>
																		<h3 style="font-size:30px;float:right;margin-right: 30px;">
																			<?php $totalStudents = query('SELECT COUNT(*) AS numberOfStudents FROM tbl_students','','','variable',1);?>
																			<span class="total-tudents"><?php echo $totalStudents["row"]["numberOfStudents"];?></span>
																		</h3>
																	</div>
																</div>
															</div>	
														</div>
													</div>
													
												</div>
												<div class="span11">
													<div class="well well-small well-shadow mainform"> 
														<legend>Students Registration</legend>
														<form class="item-select" onsubmit="registrationController.searchStudent(); return false;">
															<div class="row" style="margin-left:auto;margin-right:auto;">
																<div class="span6" >
																	<select class="select-students span6 txt-student-name" placeholder="Enter student's name&hellip;" >
																		<option></option>
																		<?php $studentList = query('SELECT id, studentName FROM tbl_students ORDER BY studentName ASC','','','variable');?>
																		<?php foreach($studentList as $student):?>
																			<option value="<?php echo $student['row']['id'];?>"><?php echo $student['row']['studentName'];?></option>
																		<?php endforeach;?>
																	</select>
																</div>
																<div class="span2">
																	<button class="btn btn-primary span2 btn-see-items" type="submit" ><i class="fa fa-search" style="font-size:20px;"></i>&nbsp;Search</button>
																</div>
																<div class="span1">
																	<button class="btn btn-warning btn-refresh-student-list" onclick="registrationController.refreshStudentList()" type="button"><i class="fa fa-refresh" style="font-size:20px;"></i></button>
																</div>
															</div>		
														</form>
														
														<div class="well well-small well-shadow" style="width:90px;margin-bottom:-20px;margin-left:20px;">
															Students list
														</div>
														
														<div class="box">
															<div class="box-content">
															<br>
																<div class="row">
																	<div class="span9" style="width:96%;">
																		<div class="table-responsive"  style="overflow-x:auto;height:400px;">
																			<table class="table table-hover table-striped">
																				<thead>
																					<tr>
																						<th>Name</th>
																						<th>Course</th>
																						<th>Section</th>
																						<th>Degree</th>
																						<th></th>
																					</tr>
																				</thead>
																				<tbody id="displayStudentList">	
																					<!--Display student List-->
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
														
												</div>
											</div>	
										</div>
										<div class="tab-pane fade in " id="teacher-registration">
											<div class="row">
												<div class="span5">
													<div class="row">
														<div class="span5">
															<div class="box well well-small well-shadow mainform">
																<div class="row">
																	<div style="text-align:center;float:left;width:50%;padding-left:40px;">
																		<i class="fa fa-users fa-5x"></i>
																		<p>Total number of registered faculty & staffs</p>
																	</div>
																	<div>
																		<h3 style="font-size:50px;margin-top:50px;float:right;margin-right: 30px;">
																			<span class="total-registered-teachers"></span>
																			<br>
																			<span style="font-size:20px;" class="total-teacher-percentage"></span>
																		</h3>
																	</div>
																</div>
															</div>	
														</div>
														<div class="span5">
															<div class="box well well-small well-shadow mainform">
																<div class="row">
																	<div style="text-align:center;float:left;width:50%;padding-left:40px;">
																		<p>Total number of faculty & staffs</p>
																	</div>
																	<div>
																		<h3 style="font-size:30px;float:right;margin-right: 30px;">
																			<?php $totalTeachers = query('SELECT COUNT(*) AS numberOfTeachers FROM tbl_teachers','','','variable',1);?>
																			<span class="total-teachers"><?php echo $totalTeachers["row"]["numberOfTeachers"];?></span>
																		</h3>
																	</div>
																</div>
															</div>	
														</div>
													</div>
													
												</div>
												<div class="span11">
													<div class="well well-small well-shadow mainform"> 
														<legend>Teacher Registration</legend>
														<form class="item-select" onsubmit="teacherRegistrationController.searchTeacher(); return false;">
															<div class="row" style="margin-left:auto;margin-right:auto;">
																<div class="span6" style="margin-right:-12px;">
																	<select class="select-students span6 txt-teacher-name" placeholder="Enter teacher's name&hellip;" >
																		<option></option>
																		<?php $teacherList = query('SELECT teacherID, teacherName  FROM tbl_teachers ORDER BY teacherName ASC','','','variable');?>
																		<?php foreach($teacherList as $teacher):?>
																			<option value="<?php echo $teacher['row']['teacherID'];?>"><?php echo $teacher['row']['teacherName'];?></option>
																		<?php endforeach;?>
																	</select>
																</div>
																<div class="span2">
																	<button class="btn btn-primary span2 btn-see-items" type="submit" style="margin-left:20px;"><i class="fa fa-search" style="font-size:20px;"></i>&nbsp;Search</button>
																</div>
																<div class="span1">
																	<button class="btn btn-warning btn-refresh-student-list" onclick="teacherRegistrationController.refreshTeacherList()" type="button" style="margin-left:-1px;"><i class="fa fa-refresh" style="font-size:20px;"></i></button>
																</div>
															</div>		
														</form>
														
														<div class="well well-small well-shadow" style="width:90px;margin-bottom:-20px;margin-left:20px;">
															Teacher list
														</div>
														
														<div class="box">
															<div class="box-content">
															<br>
																<div class="row">
																	<div class="span9" style="width:96%;">
																		<div class="table-responsive"  style="overflow-x:auto;height:400px;">
																			<table class="table table-hover table-striped">
																				<thead>
																					<tr>
																						<th>Name</th>
																						<th>Position</th>
																						<th></th>
																					</tr>
																				</thead>
																				<tbody id="displayTeacherList">	
																					<!--Display student List-->
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
														
												</div>
											</div>	
										</div>
									</div>
									
							</div>
						</div>
							
						
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
</div>
</div>
<script src="public/js/user/registration/registration.js"></script>
<script src="public/js/user/registration/teacherRegistrationController.js"></script>
<?php require_once('views/footer.php');?>
