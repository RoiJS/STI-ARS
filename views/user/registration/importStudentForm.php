<form action="public/php/process.php" method="POST" enctype="multipart/form-data" onsubmit="if(document.getElementById('file-import-file').value == ''){
			bootbox.alert(messageBody('warning','Please Select a file to import.'));
			return false;
		}else{
			bootbox.confirm(messageBody('question','Are you sure to import selected file?'), function(result){
				if(result){
					return true;
				}else{
					return false;
				}
			});
		};">
	<div class="row">
		<div class="span7">
			<div class="row">
				<div class="span7">
					<label>Select file:</label>
					<input type="file" name="file-import-file" id="file-import-file">
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="span7 pull-right">
			<button class="btn btn-warning" onclick="registrationController.closeForm();" type="button">Close</button>
			<button class="btn btn-success" name="import-student-file" type="submit">Import</button>
		</div>
	</div>
</form>
