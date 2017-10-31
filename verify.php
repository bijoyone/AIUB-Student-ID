<?php

session_start();

if ($_POST) {
    ob_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == "" || isValidEmail($email) == FALSE) {
        header("Location:index.php?email=" . $email . "&error=email");
        exit();
    } else if ($password == "") {
        header("Location:index.php?email=" . $email ."&error=password");
        exit();
    } else {
        include('db.php');
        $sql = "SELECT * FROM users where email='$email' and password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($_POST['remember'])) {
                    $cookie_name = "email";
                    $cookie_value = $email;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 days
                }
                $_SESSION['email'] = $row["email"];
                $_SESSION['id'] = $row["id"];
                $_SESSION['name'] = $row["name"];
                header("Location:personallist.php");
            }
        } else {
            header("Location:index.php?email=" . $email . "&error=1");
            exit();
        }
        $conn->close();
    }
} else {
    header("Location:index.php");
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && (bool) preg_match('/@.+\./', $email);
}

?>
