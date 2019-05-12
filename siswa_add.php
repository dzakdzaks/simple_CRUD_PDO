<?php
include 'connect.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];

if (isset($nis) && isset($nama) && isset($jenis_kelamin) && isset($tgl_lahir)) {
	try {
		$query = $pdo->prepare("INSERT INTO siswa (nis, nama, jenis_kelamin, tgl_lahir) VALUES (:nis, :nama, :jenis_kelamin, :tgl_lahir)");
		$dataSiswa = array(':nis' => $nis,
			':nama' => $nama,
			':jenis_kelamin' => $jenis_kelamin,
			':tgl_lahir' => $tgl_lahir);
		$query->execute($dataSiswa);
		//variable array
		$response = array();
		//cek apakah ada data pembeli	
		if ($query) {
	 		// $response = mysql_fetch_assoc($sql);
			// membuat variable array di dalam array $response
			$response['result'] = 1;
			$response['msg'] = "Berhasil menyimpan data siswa";
			echo json_encode($response);
		}else{
			$response['result'] = 0;
			$response['msg'] = "Gagal menyimpan data siswa";
			echo json_encode($response);
		}
	} catch (Exception $e) {
 		echo "Error! gagal menyimpan data siswa: ".$e->getMessage();  
	} 	   
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter ancnmt";
	echo json_encode($response);
}


?>