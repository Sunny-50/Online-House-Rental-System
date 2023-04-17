<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

		if ( isset($_GET['id'])) {
			$id = $_REQUEST['id'];
		}	

		
		try{
			$stmt = $connect->prepare('DELETE FROM room_rental_registrations where id = :id');
			$stmt->execute(array(
				':id' => $id
			));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e) {
			echo $e->getMessage();
		}			
		header('Location: list.php');
?>