<?php
include 'connect.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];

if (isset($nis) && isset($nama) && isset($jenis_kelamin) && isset($tgl_lahir)) {
	try {
		$query = $pdo->prepare("UPDATE siswa SET nis = :nis, nama = :nama, jenis_kelamin = :jenis_kelamin, tgl_lahir = :tgl_lahir WHERE nis = :nis"); 
		$data = array(
			':nis' => $nis,
			':nama' => $nama,
			':jenis_kelamin' => $jenis_kelamin,
			':tgl_lahir' => $tgl_lahir
		);
		$query->execute($data);
	//variable array
		$response = array();
	//cek apakah ada data pembeli
		if ($query) {
	 	// $response = mysql_fetch_assoc($sql);
		// membuat variable array di dalam array $response
			$response['result'] = 1;
			$response['msg'] = "Berhasil mengedit data siswa";
			echo json_encode($response);
		}else{
			$response['result'] = 0;
			$response['msg'] = "Gagal mengedit data siswa";
			echo json_encode($response);
		}
	} catch (Exception $e) {
		echo "Error! gagal mengedit data siswa:".$e->getMessage();
	}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}

?>