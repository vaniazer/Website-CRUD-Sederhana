<?php 
/**
 * 
 */
class database{
	var $hostname = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "soal2";								//nama database
	
	function tampil_data(){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);	//mengoneksikan database
        if($conn->connect_error){					//melakukan pengendalian error pada koneksi
	        exit();
	        die('maaf koneksi gagal :'. $connect->error);
    	}
    	else{
    		$data = mysqli_query($conn,"select * from musik"); //menjalankan perintah didatabase musik
	        $hasil = null;
	        while($d = mysqli_fetch_array($data)){	//Pengambilan data di mysql
	            $hasil[] = $d;						//ditempatkan di $hasil dalam bentuk array 
	        }
	        return $hasil;
    	}
    }

     function input($judul_musik,$album,$artis,$cover){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        mysqli_query($conn,"insert into musik values('','$judul_musik','$album','$artis','$cover')");	//menjalankan perintah simpan pada musik
    }   

    function edit($id){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        $data = mysqli_query($conn,"select * from musik where id='$id'"); //menjalankan perintah edit berdasarkan id
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

     function update($id,$judul_musik,$album,$artis,$cover){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        mysqli_query($conn,"update musik set judul_musik='$judul_musik', album='$album', artis='$artis', cover='$cover' where id='$id'") 
        		or die (mysqli_error($conn));
        //melakukan update data musik
    } 

     function hapus($id){
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        mysqli_query($conn,"delete from musik where id='$id'");	//melakukan hapus data berdasarkan id pada musik
    }

    function cari($search){
    	$conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        $query = mysqli_query($conn,"select * from musik WHERE judul_musik LIKE '%$search%' or album LIKE '%$search%' or artis LIKE '%$search%' ");
        return $query; //melakukan cari data dengan kunci search sebagai pacuan
    }
}

?>