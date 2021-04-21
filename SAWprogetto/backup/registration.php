<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Registrazione</title
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css" />
</head>

<body>

<?php
    session_start();
    include 'navbarnew.html';

    $con = new mysqli('localhost', 'newuser', '1234', 'test');
    if ($con->connect_error) {
        die('Connect Error (' .$con->connect_error . ') '
            . $con->connect_error);
    }

    $stmt = $con->prepare("INSERT INTO test.usertable (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $firstname, $lastname, $email, $pass);

    $firstname = $con->real_escape_string($_POST['firstname']);
    $lastname = $con->real_escape_string($_POST['lastname']);
    $email = $con->real_escape_string($_POST['email']);
    //Hash password
    $pass = $con->real_escape_string($_POST['pass']);
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $stmt->execute();
    printf("%d Row inserted.\n", $stmt->affected_rows);
    $stmt->close();

	echo "<h1>";
        echo "Benvenut@" ;
        echo $_POST['firstname'] . ' '. $_POST['lastname'] . ' ';
        echo ", accedi per creare il tuo primo post";
    echo "</h1>\n";


    include 'footer.html';
    mysqli_close($con);

?>

</body>
</html>
