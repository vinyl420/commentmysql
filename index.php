<?php

include 'config.php'

if (isset($_POST['post_comment'])) {

    $name = $_POST['nick'];
    $msg = $_POST['msg'];


    $sql = "INSERT INTO demo (id, nick, msg)
    VALUES ('$name', '$msg')";
    
    if ($conn->query($sql) === TRUE) {
      echo "";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device_width, initial_scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Komentarze | Maciek Chorzelski</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post" class="form">
            <input type="text" class="name" name="nick" placeholder="Nick">
            <br>
            <textarea name="msg" cols="30" rows="10" class="message" placeholder="Wiadomość"></textarea>
            <br>
            <button type="submit" class="btn" name="post_comment">Napisz komentarz</button>
        </form>
    </div>

    <div class="content">
        <?php
        $sql = "SELECT * FROM demo";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        ?>

        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['msg']; ?></p>

        <?php } } ?>
    </div>
</body>
</html>