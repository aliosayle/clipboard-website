<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Paste page</title>
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
    Enter the code of the text you pasted: <input type="text" name="code" id="">
    <input type="submit">
    </form>
    <?php
        include 'con.php';
        $code = $_POST["code"];
        $sql = "SELECT entry FROM entries WHERE ID = '$code'";
$result = mysqli_query($conn, $sql) or die("Unable to execute the query: " . mysqli_error($conn));

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    
    // Access the 'entry' column from the result
    $retrievedText = $row['entry'];

    // Output the retrieved text
    echo "Retrieved Text: $retrievedText";
} else {
    echo "No matching record found.";
}
    ?>
</body>
</html>