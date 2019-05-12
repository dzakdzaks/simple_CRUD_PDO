<?php
include 'connect.php';

$nis = $_POST['nis'];
if (isset($nis)) {
	try {
	// perintah untuk menampilkan semua data siswa dari table siswa
		$query = $pdo->prepare("SELECT * FROM siswa");
		$query->execute();
		//variable array
		$response = array();
		//cek apakah ada data siswa
		if ($query->rowCount() > 0) {
			// membuat variable array di dalam array $response
			$response['siswa'] = array();
			// loping data siswa
			//$query->fetch(PDO::FETCH_ASSOC)
			while ($row = $query->fetch()) {
				//membuat variable array untuk menampung data siswa sementara sebelum di masukan kedalam array response dan di jadkan data json
				$data = array();
				$data["nis"] = $row["nis"];
				$data["nama"] = $row["nama"];
				$data["jenis_kelamin"] = $row["jenis_kelamin"];
				$data["tgl_lahir"] = $row["tgl_lahir"];

				//akhir dari memasukan data kedalam array $data
				array_push($response['siswa'],$data);
			}
			$response['result'] = 1;
			$response['msg'] = "Semua data siswa";
			echo json_encode($response);
		}else{
			$response['result'] = 0;
			$response['msg'] = "Tidak ada siswa";
			echo json_encode($response);
		} 
	} catch (Exception $e) {
		echo "Error! gagal menyimpan data siswa: ".$e->getMessage();  
	} 	 
} 


?>