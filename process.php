<?php
include('connect.php');
if (isset($_POST["create"])) {
    // isset :::  it is used to check if the 'create' variable is set in the $_POST array. If it is, the code inside the if statement will be executed.

    // mysqli_real_escape_string ::: it is used to protect the system by preventing the entry of malicious code into our db 
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    // $conn :::  is the MySQL connection link, and 
    // $POST ::: is a PHP array that contains the values submitted in an HTML form.
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sqlInsert = "INSERT INTO books(title , author , type , description) VALUES ('$title','$author','$type', '$description')";
    // This is an SQL statement used to insert data into a table called "books". The statement specifies the values to be inserted into each column of the table: '$title' into the "title" column, '$author' into the "author" column, '$type' into the "type" column, and '$description' into the "description" column.
    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:index.php");
        // The mysqliquery()::: function is used to execute the SQL query stored in the $sqlInsert variable, which is used to insert data into a table. 
        // If the query is successful, a session is started, a message is stored in the $SESSION array, and the browser is redirected to the index.php page. 
    } else {
        die("Something went wrong");
    }
}
    if (isset($_POST["edit"])) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $type = mysqli_real_escape_string($conn, $_POST["type"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id='$id'";
        if (mysqli_query($conn, $sqlUpdate)) {
            session_start();
            $_SESSION["update"] = "Book Updated Successfully!";
            header("Location:index.php");
        } else {
            die("Something went wrong");
        }
    }
    ?>