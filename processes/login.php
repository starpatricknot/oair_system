<?php
		
	if(isset($_POST['login'])){

		session_start();
		include "config.php";

		$account_no = mysqli_real_escape_string($conn, $_POST['account_no']);
		$pw = mysqli_real_escape_string($conn, md5($_POST['pw']));

		$query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE account_no='$account_no' && password='$pw'");

		if (mysqli_num_rows($query) == 0){
            echo '<script>alert("Incorrect ID or Password!")</script>';
        	header('refresh:0.1;url=../user-login.php');
		}
		else{
			$row = mysqli_fetch_array($query);
			$_SESSION['user_id'] = $row['id'];
            echo $_SESSION['user_id'] = $row['id'];
			header('location:../index.php');
		}
        

	}
	else{
        echo '<script>alert("Login or register to enter!")</script>';
		header('location:../user-login.php#login');		
	}

?>