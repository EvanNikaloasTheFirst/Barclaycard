	<style>
		#side-bar-right{
    min-height: 100vh;
    width: 20%;
	background: #f5f5f5;
	    float: left;
}
#side-bar-left{
	background: #f5f5f5;
}

		h2 {
			margin-top: 25px;
		}

     
		input[type=text] {
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 10px;
			width: 100%;
		}
		.count{
			color: black;
			/* padding-left: 20px;
			padding-top: 5px; */
			text-align: center;
		}

	

		.category-title {
			display: block;
			padding: 10px;
			padding-left: 25px;
			text-align: center;
			text-decoration: none;
			list-style-type: none;
			color: #00aeef;
			padding-top: 80px;
		}

		.category-title a 
		{
			color: #00aeef;
			text-decoration: none;
			
		}
		.category-title p
		{
			color: black;
			text-decoration: none;
			padding-left: 20px;
			
		}
	</style>
	<title>Ticket Management System</title>

	<?php 
	   use as2\DatabaseTable; 
	   require "../Database.php";
	    $queries = new \as2\DatabaseTable($pdo, 'queries', 'id');
	   $count = $queries->findCounts('queryAuthor', $_SESSION['userId']);
	   $inProcess = $queries->findRows('queryAuthor', $_SESSION['userId'], 'status', 'In process');
	   $Rejected = $queries->findRows('queryAuthor', $_SESSION['userId'], 'status', 'Rejected');
	   $approved = $queries->findRows('queryAuthor', $_SESSION['userId'], 'status', 'Approved');


	
	   $countStaff = $queries->findCounts('casehandler', $_SESSION['userId']);
	   $inProcessStaff = $queries->findRows('casehandler', $_SESSION['userId'], 'status', 'In process');
	   $RejectedStaff = $queries->findRows('casehandler', $_SESSION['userId'], 'status', 'Rejected');
	   $approvedStaff = $queries->findRows('casehandler', $_SESSION['userId'], 'status', 'Approved');


	   ?>
<?php if ($_SESSION['AdminloggedIn'] == true) { ?>
	<div id="side-bar-left">
		

		<div class="category-title">
		<a href="/staff/viewAllQueries">Query History</a>
		<p class="count"><?php echo $countStaff; ?></p>
		</div>
			<div class="category-title">
			<a href="/staff/viewInprocessQuerys">In-Process Querys</a>
			<p class="count"><?=$inProcessStaff; ?></p>
			</div>
			<div class="category-title">
			<a href="/staff/viewRejectedQueries">Rejected Querys</a>
			<p class="count"><?=$RejectedStaff; ?></p>
			</div>
			<div class="category-title">
			<a href="/staff/viewApprovedQuerys">Approved Querys</a>
			<p class="count"><?=$approvedStaff; ?> </p>
			</div>
	
		</div>

	<?php } else if ($_SESSION['loggedIn'] == true) { ?>



		<div id="side-bar-left">
		

		<div class="category-title">
		<a href="/user/viewAllQueries">Query History</a>
		<p class="count"><?php echo $count; ?></p>
		</div>
			<div class="category-title">
			<a href="/user/viewInprocessQuerys">In-Process Querys</a>
			<p class="count"><?=$inProcess; ?></p>
			</div>
			<div class="category-title">
			<a href="/user/viewRejectedQueries">Rejected Querys</a>
			<p class="count"><?=$Rejected; ?></p>
			</div>
			<div class="category-title">
			<a href="/user/viewApprovedQuerys">Approved Querys</a>
			<p class="count"><?=$approved; ?> </p>
			</div>
	
		</div>
	


		<?php } ?>




