<?php require_once("includes/header.php"); ?>

<?php 

if ($session->is_signed_in()) {
	redirect("index.php");
}

if (isset($_POST['submit'])) {
	
	
	 $username =trim($_POST['username']);
	 $password =trim($_POST['password']);

	//Method to checkh database user 

	$user_found = User::verify_user($username, $password);
	// var_dump($user_found);

	if ($user_found) {
		$session->login($user_found);
		// print_r($session);
		redirect("index.php");
	}else{

		$the_message = "your password or username are incorrect"; 
	}

}else{

	$the_message= "";
	$username = "";
	$password = "";
}


?>

<div class="container">
	<div class="row">
    	<div class="col-xs-8 col-xs-offset-1">

       		<div class="form-wrap">
        		<div class="well">
        			<h1 class="text-center">Login Form</h1>
        			<h4 class="bg-danger text-center"><?php echo $the_message; ?></h4>
		            <form role="form" action="" method="post">
		                <div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username) ?>">
						</div>
		                <div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password) ?>">
						</div>
		                <div class="form-group">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary right">
						</div>
		            </form>
            	</div>
          	</div>  
        </div> <!-- /.col-xs-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->