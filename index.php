<?php
	require_once('database.php');
	require_once('users_db.php');
	require_once('user.php');
	
	
		$results = userDB::getuserdb();
?>
<html>
	<head>
		<title>Week 9 Assignmnet</title>
	</head>
	<body>
	    <div style='text-align: center' >
		 <table class="user-table" border="1">
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Fname</th>
				<th>Lname</th>
				<th>Phone</th>
				<th>Birthday</th>
				<th>Gender</th>
				<th>Password</th>
			</tr>
			<?php 
				foreach ($results as $rs)
				{
				?>
				<tr>
					<?php  $tmp = new user($rs['id'],$rs['email'],$rs['fname'],$rs['lname'],$rs['phone'],$rs['birthday'],$rs['gender'],$rs['password']);

						echo $tmp->userhtml();
					 ?>
				</tr>
				<?php
					}
					?>
				
		</table>
</div>

	</body>		
</html>