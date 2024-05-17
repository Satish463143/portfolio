<?php
$conn = mysqli_connect("localhost", "root", "", "portfolio");

if (!$conn) {
    echo ("connection failed");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
        $stmt = $conn->prepare("INSERT INTO message (username, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $message);
        $stmt->execute();
        $stmt->close();
        echo '<script>
        window.location.href = "contact.php";
        alert("Message sent sucessfully");
        </script>';
        $stmt->close();
        $conn->close();
    }


?>

