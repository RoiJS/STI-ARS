<div class="navbar navbar-fixed-top"  >
    <div class="navbar-inner">
		<div class="container">
            <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<a class="brand">
				<div class="row">
					<div class="span10" style="margin-top:20px;">
						STI College Zamboanga | Computing 2016 Fest Registration System
					</div>
				</div>
			</a>
			
            <div id="app-nav-top-bar" class="nav-collapse">	
                <ul class="nav pull-right">
					<?php if($_GET['pg'] != 'user'){?>
						<li>
							<a class="btn-update-account">Profile</a>
						</li>
					<?php }?>
                    <li>
                        <a href="?pg=access&vw=logout&dir=<?php echo sha1('logout');?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>