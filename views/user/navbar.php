<div class="body-nav body-nav-vertical body-nav-fixed" >
    <div class="container">
         <ul>
           <li class="<?php echo getPage() == 'user' && getView() == 'index' ? 'active' : '';?>">
				<a href="?pg=user">
					<i class="icon-edit icon-large"></i>Student Registration
                </a>
            </li>
           <li class="<?php echo getPage() == 'user' && getView() == 'importStudentList' ? 'active' : '';?>">
				<a onclick="registrationController.importStudentList();">
					<i class="icon-upload icon-large"></i>Import list
                </a>
            </li>
        </ul>
    </div>
</div>