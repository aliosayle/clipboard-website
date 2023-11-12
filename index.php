<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Clipboard</title>
</head>
<body>

    <nav>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="index.php"><button class="copy-button">Copy</button></a>
        <a href="paste.php"><button class="paste-button">Paste</button></a>
    </nav>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Enter the text you want to copy: <input type="text" name="text" id=""><br>
        Enter the code to paste your text: <input type="text" name="code" id=""><br>    
        <input type="submit">
    </form>

    <?php
    include 'con.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        $text = $_POST["text"];
        $code = $_POST["code"];
        $sql1 = "INSERT INTO `entries` (`ID`, `entry`) VALUES ('$code', '$text')";
        $QueryResult1 = mysqli_query($conn, $sql1) or die("Unable to execute the query" . mysqli_error($con));

        
        }
    
    ?>
</body>
</html>