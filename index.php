<?php
	session_start();
		include("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Biz</h1>

            </div>
            <p>Login in. To see it in action.</p>
            <form action="" class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

								<?php


	if(isset($_POST['login'])){
	//kalimat sql untuk cek user apakah sudah terdaftar atau belum
	$querylogin= $dbh->query("SELECT * FROM user_demo2 WHERE username='".$_POST['username']."';") or die(mysqli_error($db));
	$login = $querylogin->fetch();

		// cek username dan password dengan yang ada di database
		if(md5($_POST['password']) == $login['password'] && $_POST['username'] == $login['username']){
			// bikin session
			$_SESSION['login'] = $_POST['username'];
			$_SESSION['level'] = $login['level'];
			$_SESSION['nama'] = $login['nama'];
			header("location: admin/");
			echo "session telah dibuat";
		}

		else { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Maaf:</strong> Kombinasi username dan password salah.
			</div>
		<?php
		}

	}
	?>
                <button type="submit" name="login" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>

            </form>
            <p class="m-t"> <small>Ebiz &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
