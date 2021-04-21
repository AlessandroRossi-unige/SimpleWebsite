<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Sign-in</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/mystyle.css" />
</head>

<body>

<?php
    session_start();
    include 'navbarnew.html';

    $con = new mysqli('localhost', 'S4641902', 'corsosaw2020', 'S4641902');
    if ($con->connect_error) {
        die('Connect Error (' .$con->connect_error . ') '
            . $con->connect_error);
    }

    $stmt = $con->prepare("INSERT INTO usertable (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
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
    mysqli_close($con);
	?>

	<div class="contactdiv"><h2>Welcome <?php echo $firstname; ?>, login to upload your first post</h2></div>

	<?php include 'footer.html'; ?>

</body>
</html>
