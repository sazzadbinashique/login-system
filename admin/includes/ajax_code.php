<?php require("init.php");?>

<?php 

$user = new User();






if (isset($_POST['image_name'])) {
	

	$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']); 


	print_r($user);

}




?>