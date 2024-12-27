<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['password']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en" id="htmlPage">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap demo</title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
        />

        <!-- Icon Start -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <!-- Icon End -->
    </head>

    <body class="bg-info-subtle">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow rounded-5">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="bi bi-person-circle h1 display-4"></i>
                                <p>Welcom to My Daily Journal</p>
                                <hr />
                            </div>
                            <form action="" method="post">
                                <input
                                type="text"
                                name="username"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Username"
                                />
                                <input
                                type="password"
                                name="password"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Password"
                                />
                                <div class="text-center my-3 d-grid">
                                <button class="btn btn-danger rounded-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container mt-4 pt-3">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="">
                        <div class="card-body">
        
                        <?php
                        //set variable username dan password dummy
                        $username = "admin";
                        $password = "123456";

                        //check apakah ada request dengan method POST yang dilakukan
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            echo"Yang anda inputkan<br>";
                            //tampilkan isi dari variable POST menggunakan perulangan
                            foreach($_POST as $key => $val){
                                echo " <strong>$key</strong>" . ": " . $val ."<br>";
                            } 

                            echo "<br>Respon<br>";
                            //check apakah username dan password yang di POST sama dengan data dummy
                            if($_POST['username'] == $username AND $_POST['password'] == $password){
                                echo "Username dan Password Benar";
                            }else{
                                echo "Username dan Password Salah";
                            }
                        };
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </body>
</html>
<?php
}
?>