<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ahlikode-chat");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function hapususer($unique_id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_account WHERE unique_id = $unique_id");
	return mysqli_affected_rows($conn);
}

 
?>