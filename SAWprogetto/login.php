<html lang="en">
<head>
    <title>Login</title>
</head>

<body>

<?php
    session_start();
    $con = new mysqli('localhost', 'S4641902', 'corsosaw2020', 'S4641902');
    if ($con->connect_error) {
        die('Connect Error (' .$con->connect_error . ') '
            . $con->connect_error);
    }
    echo 'Success... ' . mysqli_get_host_info($con) . "\n";

    $stmt = $con->prepare("SELECT * FROM usertable WHERE email=?");
    $stmt->bind_param('s', $email);
    $email = $con->real_escape_string($_POST['email']);
    $pass = $con->real_escape_string($_POST['pass']);
    echo $pass;
    $res = $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0 )
        while($row = $res->fetch_array(MYSQLI_ASSOC))
        {
            echo $row["pass"];
            echo strlen($row["pass"]);
            if(password_verify($pass, $row["pass"]))
            {

                $_SESSION['newSession'] = $email;
                header("Location: homepage.php");
                exit;
            }
            else
            {
                //return false;
                header("Location: login.html");
            }
        }
    else
    {
        //return false;
        header("Location: login.html");
    }
    $stmt->close();




?>

</body>
</html>
