<?php 
include 'connect.php';

$nis = $_POST['nis'];

if(isset($nis)){
	
	try {
		$query = $pdo->prepare("DELETE FROM siswa  WHERE nis = :nis");
		$data = array(
			'nis' => $nis);
		$query->execute($data);
		if ($query) {
			$response['result'] = 1;
			$response['msg'] = "Sukses menghapus data siswa";
			echo json_encode($response);
		}else{
			$response['result'] = 0;
			$response['msg'] = "Gagal menghapus data siswa";
			echo json_encode($response);
		}
	} catch (Exception $e) {
		echo "Gagal menghapus data siswa:".$e->getMessage();
	}

}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
?>