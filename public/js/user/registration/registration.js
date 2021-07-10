var registrationController = {
	
	importStudentModal : null,
	
	searchStudent : function(){
		studentData = $.trim($(".txt-student-name").val());
		if(studentData != ""){
			verifyStudent = ajax({action : "searchStudent", studentData : studentData}, true);
			$("#displayStudentList").html(verifyStudent);
			$("#btn-register-student" + studentData).focus();	
		}else{
			bootbox.alert(messageBody("warning", "Please select a student."), function(){
				$(".txt-student-name").focus();	
			});
		}
	},
	
	verifyStudentIfRegistered : function(studentID){
		verifyRegistrationStatus = ajax({action : "verifyRegistrationStatus", studentID : studentID}, true);
		return verifyRegistrationStatus != 1 ? false : true;
	},
	
	registerStudent : function(studentData){
		
		if(!this.verifyStudentIfRegistered(studentData)){
			bootbox.confirm(messageBody("question","Are you sure to register selected student?"), function(result){
				if(result){
					registerStudent = ajax({action : "registerStudent", studentData : studentData});
					
					bootbox.alert(messageBody("info","Selected student has been successfully registered."), function(){
					//	registrationController.displayStudentList();
						registrationController.displayRegistrationStatus();
						
						$(".txt-student-name").focus();
						$(".txt-student-name").val("");
						
					});
				}
			});	
		}else{
			bootbox.alert(messageBody("warning","Selected student is already registered!."));
		}
	},
	
	refreshStudentList : function(){
		this.displayStudentList();
		this.displayRegistrationStatus();
		$(".txt-student-name").val("");
	},
	
	displayStudentList : function(){
		showComponents("studentList","#displayStudentList");
	},
	
	displayRegistrationStatus : function(){
		getRegistrationStatus = ajax({action : "getRegistrationStatus"}, true);
		registrationStatus = JSON.parse(getRegistrationStatus);
		$(".total-registered-students").html(registrationStatus[0]);
		$(".total-percentage").html("(" + registrationStatus[1] + " %)");
	},
	
	importStudentList : function(){
		importStudentForm = ajax({action : "importStudentForm"}, true);
		this.importStudentModal = modalForm("Import students",importStudentForm);
	},
	
	closeForm : function(){
		this.importStudentModal.modal("hide");
	}
}

registrationController.displayStudentList();
registrationController.displayRegistrationStatus();