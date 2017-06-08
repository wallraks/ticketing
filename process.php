<?php
session_start();
$email = $_SESSION['email'];
include 'connect.php';

if($_POST && array_key_exists('checkin', $_POST) && trim($_POST['checkin']) == 1){
	$msg = 'Request cannot be processed';
	$status = 'fail';

	$ticket_id = trim($_POST['id']);
	$ticket_code = trim($_POST['code']);

	if( ! $ticket_id || ! $ticket_code || ! is_numeric($ticket_id))
		$msg = 'The ticket details have not been provided appropriately.';
	else{
		$select_sql = "SELECT * FROM ticketing_2 WHERE id = " . $ticket_id . " AND code = '" . $ticket_code . "' ";
		$select_result = $conn->query($select_sql);

		if ($select_result->num_rows > 0){
			while($row = $select_result->fetch_assoc()) {
				$update_sql = "UPDATE ticketing_2 SET status = 'Used', verified_by='$email' WHERE id = {$ticket_id}";
				$update_result = $conn->query($update_sql);

				if($update_result === TRUE){
					$msg = 'Ticket checked in successfully';
					$status = 'success';
				}else{
					$msg = 'Ticket could not be checked in. Please try again later';
				}

				$conn->close();
				break;
			}
		}else{
			$msg = 'No such ticket exists';
		}
	}

	echo json_encode(array('msg' => $msg, 'status' => $status));
}
