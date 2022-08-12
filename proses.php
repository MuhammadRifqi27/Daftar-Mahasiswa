<?php
//koneksi ke database
$db = mysqli_connect("localhost", "root", "", "data_mahasiswa");

function query($query) {
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while( $row = mysqli_fetch_array($result)){
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data) {
	global $db;
	 //ambil data dari tiap elemen dalam form
	 $nim_mhs = htmlspecialchars($data["nim_mhs"]);
	 $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
	 $program_studi = htmlspecialchars($data["program_studi"]);
	 $fakultas = htmlspecialchars($data["fakultas"]);

	 //query insert data
	 $sql = "INSERT INTO tb_mahasiswa VALUES('$nim_mhs', '$nama_mahasiswa', '$program_studi', '$fakultas')";
	 mysqli_query($db, $sql);

	 return mysqli_affected_rows($db);
}

function hapus($id) {
	global $db;
	mysqli_query($db, "DELETE FROM tb_mahasiswa WHERE nim_mhs = $id");
	
	return mysqli_affected_rows($db);
}

function ubah($data) {
	global $db;
	 //ambil data dari tiap elemen dalam form
	 $id = $data["nim_mhs"];
	 $nim_mhs = htmlspecialchars($data["nim_mhs"]);
	 $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
	 $program_studi = htmlspecialchars($data["program_studi"]);
	 $fakultas = htmlspecialchars($data["fakultas"]);

	 //query insert data
	 $sql = "UPDATE tb_mahasiswa SET
				nim_mhs = '$nim_mhs',
				nama_mahasiswa = '$nama_mahasiswa',
				program_studi = '$program_studi',
				fakultas = '$fakultas'

				WHERE nim_mhs = $id
			";

	 mysqli_query($db, $sql);

	 return mysqli_affected_rows($db);
}

function search($keyword) {
	$query = "SELECT * FROM tb_mahasiswa WHERE 
				nama_mahasiswa LIKE '%$keyword%'OR
				nim_mhs LIKE '%$keyword%'OR
				program_studi LIKE '%$keyword%'OR
				fakultas LIKE '%$keyword%'
				";
	return query($query);
}
function search_krs($keyword) {
	$query = "SELECT * FROM tb_krs WHERE 
				nama_mk LIKE '%$keyword%'OR
				kode_mk LIKE '%$keyword%'OR
				prodi LIKE '%$keyword%'OR
				fakultas LIKE '%$keyword%'
				";
	return query($query);
}

function tambah_mk($data) {
	global $db;
	 //ambil data dari tiap elemen dalam form
	 $kode_mk = htmlspecialchars($data["kode_mk"]);
	 $nama_mk = htmlspecialchars($data["nama_mk"]);
	 $prodi = htmlspecialchars($data["prodi"]);
	 $fakultas = htmlspecialchars($data["fakultas"]);

	 //query insert data
	 $sql = "INSERT INTO tb_krs VALUES('$kode_mk', '$nama_mk', '$prodi', '$fakultas')";
	 mysqli_query($db, $sql);

	 return mysqli_affected_rows($db);
}
?>