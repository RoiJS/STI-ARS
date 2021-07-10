var teacherRegistrationController = {
	
	importStudentModal : null,
	
	searchTeacher : function(){
		teacherData = $.trim($(".txt-teacher-name").val());
		if(teacherData != ""){
			verifyTeacher = ajax({action : "searchTeacher", teacherData : teacherData}, true);
			$("#displayTeacherList").html(verifyTeacher);
			$("#btn-register-teacher" + teacherData).focus();	
		}else{
			bootbox.alert(messageBody("warning", "Please select a teacher."), function(){
				$(".txt-teacher-name").focus();	
			});
		}
	},
	
	verifyTeacherIfRegistered : function(teacherData){
		verifyTeacherRegistrationStatus = ajax({action : "verifyTeacherRegistrationStatus", teacherData : teacherData}, true);
		return verifyTeacherRegistrationStatus != 1 ? false : true;
	},
	
	registerTeacher : function(teacherData){
		
		if(!this.verifyTeacherIfRegistered(teacherData)){
			bootbox.confirm(messageBody("question","Are you sure to register selected teacher?"), function(result){
				if(result){
					registerTeacher = ajax({action : "registerTeacher", teacherData : teacherData});
					console.log(registerTeacher);
					
					bootbox.alert(messageBody("info","Selected teacher has been successfully registered."), function(){
						teacherRegistrationController.displayTeacherList();
						teacherRegistrationController.displayTeacherRegistrationStatus();
						$(".txt-teacher-name").focus();
						$(".txt-teacher-name").val("");
					});
				}
			});	
		}else{
			bootbox.alert(messageBody("warning","Selected teacher is already registered!."));
		}
	},
	
	refreshTeacherList : function(){
		this.displayTeacherList();
		this.displayTeacherRegistrationStatus();
		$(".txt-teacher-name").val("");
	},
	
	displayTeacherList : function(){
		showComponents("teacherList","#displayTeacherList");
	},
	
	displayTeacherRegistrationStatus : function(){
		getRegistrationStatus = ajax({action : "getTeacherRegistrationStatus"}, true);
		registrationStatus = JSON.parse(getRegistrationStatus);
		$(".total-registered-teachers").html(registrationStatus[0]);
		$(".total-teacher-percentage").html("(" + registrationStatus[1] + " %)");
	},
	
	importStudentList : function(){
		importStudentForm = ajax({action : "importStudentForm"}, true);
		this.importStudentModal = modalForm("Import students",importStudentForm);
	},
	
	closeForm : function(){
		this.importStudentModal.modal("hide");
	}
}

teacherRegistrationController.displayTeacherList();
teacherRegistrationController.displayTeacherRegistrationStatus();