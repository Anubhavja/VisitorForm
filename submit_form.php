<?php
    if (isset($_POST['submit'])) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "church_visitors";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $invited_by = $_POST['invited_by'];
        $rating = $_POST['rating'];
        $comments = $_POST['comments'];

        $sql = "INSERT INTO visitors (name, phone, email, address, invited_by, rating, comments)
                VALUES ('$name', '$phone', '$email', '$address', '$invited_by', '$rating', '$comments')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>