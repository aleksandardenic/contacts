<head>
<title>Naslov</title>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="wrap">
<div id="search">
<h1 id="naslov">Contacts</h1>
<a href="remove.php">Delete</a>
<form action="#" method="POST"> <br>
<label>First name: 
<input type="text" name="fname"></label>
<label>Last name: 
<input type="text" name="lname"></label>
<label>Tel:
<input type="text" name="tel"></label>
<input type="submit" name="insert" value="Add contact">
</form>
</div>
<div id="message">
<?php
if(isset($_POST['insert'])){
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['tel'])){
		if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])){
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$tel   = trim($_POST['tel']);
			
			require 'inc/connect.php';
			$fname = mysqli_real_escape_string($conn, $fname);
			$lname = mysqli_real_escape_string($conn, $lname);
			$tel   = mysqli_real_escape_string($conn, $tel);
			
			
			$query = "INSERT INTO contacts (fname, lname, tel) VALUES ('{$fname}','{$lname}','{$tel}')";
			if(mysqli_query($conn, $query) === TRUE){
				echo "Novi kontaktje kreiran.";
			}else {
				echo "Greska!";
			}
		}else{
            echo "Nisu ukucani svi parametri.";
		}
	}else{
		echo "Nisu ukucani svi parametri!";
	}
}
?>
</div>
</div>
</body>
</html>