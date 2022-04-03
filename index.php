<?php
	
	include 'config.php';

	if (isset($_POST['post'])) {

		$nick = $_POST['nick'];
		$msg = $_POST['msg'];
		
		$sql = "INSERT INTO demo (nick, msg)
		VALUES ('$nick', '$msg')";

		if ($conn->query($sql) === TRUE) {
		  echo "";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
    
        header( "Location: {$_SERVER['PHP_SELF']}", true, 303 );
        exit();
	}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Maciek Chorzelski | Komentarze</title>
</head>
<body>
	<div class="wrapper">
		<form action="" method="post" class="form">
			<input type="text" class="nick" name="nick" placeholder="Nick">
			<br>
			<textarea name="msg" cols="30" rows="10" class="msg" placeholder="Wiadomość"></textarea>
			<br>
			<button type="submit" class="btn" name="post">Napisz komentarz</button>
		</form>
	</div>

    <div class="content">
    <?php

$sql = "SELECT * FROM demo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
   
?>
<h3><?php echo $row['nick']; ?></h3>
<p><?php echo $row['msg']; ?></p>

<?php } } ?>
    </div>
</body>
</html>