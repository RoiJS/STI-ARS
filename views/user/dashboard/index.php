<?php require_once('views/header.php');?>
<div id="body-container">
   <div id="body-content">
	<?php require_once('views/'.getPage().'/navbar.php');?>
     <section class="nav nav-page nav-page-fixed">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Dashboard<br/>
                            <small>STI College Zamboanga</small>
                        </h3>
                    </header>
                </div>
            </div>
        </div>
    </section>
	
    <section class="page container">
		<div class="row">
			<div class="span5">
				<legend>Registered Students</legend>
				<div class="row">
					<div class="span4">
						<div class="box well well-small well-shadow mainform">
							<div class="row">
								<div style="text-align:center;float:left;width:50%;padding-left:40px;">
									<i class="fa fa-edit fa-5x"></i>
									<p>Total number:</p>
								</div>
								<div>
									<h3 style="font-size:50px;margin-top:50px;float:left;">
										<span class="totalTransactions">0</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="span8">
				<legend>Activity Logs</legend>
				<div class="table-responsive" style="overflow-x:auto;height:500px;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
							</tr>
						</thead>
						<tbody class="displayAllWalkInTransactions">
							
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
    </div>
</div>

<?php require_once('views/footer.php');?>
