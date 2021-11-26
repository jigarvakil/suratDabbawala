<?php
	$page= basename($_SERVER['PHP_SELF']);
	
?>
<aside class="left-panel">
	
	<div class="logo">
		<a href="C:\xampp\htdocs\sd\admin" target="_blank">
			<img src="Surat Dabbawala.png" alt="Lights" width="80%" height="80%">
		</a>
	</div>
	<nav class="navigation">
		<ul class="list-unstyled">
			<li class="<?php if($page=="dashboard.php") echo "active"; ?>">
				<a href="dashboard.php">
					<i class="fa fa-dashboard"></i> <span class="nav-label">DASHBOARD</span>
				</a>	
			</li>
			
			
			<li class="has-submenu <?php if($page=="user.php" || $page=="complaint.php") echo "active"; ?>"><a href="user.php"><i class="fas fa-user"></i> <span class="nav-label">USER</span><span class="menu-arrow"></span></a>
					<ul class="list-unstyled">
				<li class="<?php if($page=="duser.php") echo "active"; ?>"><a href="user.php"><i class="fas fa-users"></i> <span class="nav-label">USER PROFILE</span></a></li>	
				<li class="<?php if($page=="complaint.php") echo "active"; ?>"><a href="complaint.php"><i class="fas fa-comment-alt" ></i><span class="nav-label">COMPLAINT</span><span class="badge bg-success1"></span></a></li>
				<li class="<?php if($page=="packageinfo.php") echo "active"; ?>"><a href="packageinfo.php"><i class="fa fa-gift" ></i><span class="nav-label">PACKAGE</span><span class="badge bg-success1"></span></a></li>
				<li class="<?php if($page=="review.php") echo "active"; ?>"><a href="review.php"><i class="fa fa-comments-o" ></i><span class="nav-label">REVIEW</span><span class="badge bg-success1"></span></a></li>
			</ul>
			</li>
			
			<li class="has-submenu <?php if($page=="duser.php" || $page=="salary.php" || $page=="leave.php" ) echo "active"; ?> "><a href="duser.php"><i class="zmdi zmdi-album"></i> <span class="nav-label">DABBAWALA</span><span class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li class="<?php if($page=="duser.php") echo "active"; ?>"><a href="duser.php"><i class="fas fa-user"></i>PROFILE</a></li>
					<li class="<?php if($page=="salary.php") echo "active"; ?>"><a href="salary.php"><i class='fas fa-rupee-sign'></i>SALARY</a></li>
					<li class="<?php if($page=="leave.php") echo "active"; ?>"><a href="leave.php"><i class="zmdi zmdi-map"></i> <span class="nav-label">LEAVE</span><span class="badge bg-success1"></span></a></li>
				</ul>
			</li>
			
			<li class="has-submenu <?php if($page=="restro.php"|| $page=="thali.php" || $page=="Rregister1.php" ) echo "active"; ?>"><a href="restro.php"><i class="fas fa-utensils"></i><span class="nav-label">RESTAURANT</span><span class="menu-arrow"></span>
				<ul class="list-unstyled">
				<li class="<?php if($page=="restro.php") echo "active"; ?>"><a href="restro.php"><i class="glyphicon glyphicon-th-list"></i><span class="nav-label"> REGISTRATION EMAIL</span></a></li>
				<li class="<?php if($page=="thali.php") echo "active"; ?>"><a href="thali.php"><i class="zmdi zmdi-cutlery"></i><span class="nav-label">THALI</span></a></li>
				<li class="<?php if($page=="Rregister.php") echo "active"; ?>"><a href="Rregister1.php"><i class="fa fa-registered"></i><span class="nav-label">REGISTRATION</span></a></li>
				</ul>
			</li>
			
			<li class="has-submenu <?php if($page=="area.php" || $page=="varea.php" ) echo "active"; ?> "><a href="area.php"><i class='fas fa-map-marker-alt'></i> <span class="nav-label">AREA</span><span class="menu-arrow"></span></a>
				<ul class="list-unstyled">
					<li class="<?php if($page=="area.php") echo "active"; ?>"><a href="area.php"><i class="glyphicon glyphicon-th-list"></i> ADDAREA </a></li>
					<li class="<?php if($page=="varea.php") echo "active"; ?>"><a href="varea.php"><i class="fa fa-circle"></i>VIEW AREA</a></li>
				</ul>
			</li>
			
			
			<li class="<?php if($page=="holiday.php") echo "active"; ?>"><a href="holiday.php"><i class="fas fa-bell"></i> <span class="nav-label">HOLIDAY</span><span class="badge bg-success"></span></a>
				
			</li>
		
		<li class="has-submenu <?php if($page=="charges.php" || $page=="package.php" ) echo "active"; ?>"><a href="charges.php"><i class='fa fa-info-circle'></i> <span class="nav-label">INFORMATION</span><span class="menu-arrow"></span></a>
			<ul class="list-unstyled">
				<li class="<?php if($page=="charges.php") echo "active"; ?>"><a href="charges.php"><i class="fa fa-percent"></i>CHARGES</a></li>
				<li class="<?php if($page=="package.php") echo "active"; ?>"><a href="package.php"><i class="fa fa-gift"></i>PACKAGE</a></li>
			</ul>
		</li>
		
		<li class="<?php if($page=="transation.php") echo "active"; ?>"><a href="transation.php"><i class="fa fa-credit-card"></i><span class="nav-label">PAYMENT</span><span class="badge bg-success1"></span></a>
		
		</li>
		
		</ul>
		</nav>
		
		</aside>
				