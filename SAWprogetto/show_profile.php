<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
	<title>Change Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css" />
    <script src="https://kit.fontawesome.com/b34e2eb2e0.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="formdiv">
        <form action="update_profile.php" method="post">
		<div class="formdiv">
        <?php
            include 'checksession.php';
            include 'navbaruser.html';

            $con = new mysqli('localhost', 'S4641902', 'corsosaw2020', 'S4641902');
            if ($con->connect_error) {
                die('Connect Error (' .$con->connect_error . ') '
                . $con->connect_error);
            }
            $stmt = $con->prepare("SELECT * FROM usertable WHERE email=?");
            $stmt->bind_param('s', $_SESSION['newSession']);
            $res = $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0 )
                while($row = $res->fetch_array(MYSQLI_ASSOC))
                {
                    $firstname = $row["firstname"];
                    $lastnane = $row["lastname"];
                    $email = $row["email"];
                    $description = $row["description"];
                    $city = $row["city"];
                    $facebook = $row["facebook"];
                    $instagram = $row["instagram"];
                }
            $stmt->close();

        ?>
            <br /><br />
            <span>
                <i class='fas fa-user fa-2x'></i>
                <input type='text' id='firstname' name='firstname' value='<?php echo $firstname;?>'><br /><br />
            </span>
            <span>
                <i class='fas fa-user fa-2x'></i>
                <input type='text' id='lastname' name='lastname' value='<?php echo $lastnane;?>'><br /><br />
            </span>
            <span>
                <i class='fas fa-at fa-2x'></i>
                <input type='email' id='email' name='email' value='<?php echo $email;?>'><br /><br />
            </span>
            <label for='description'>Brief description:</label><br /><br />
            <span>
                <i class="fas fa-book-open fa-2x"></i>
                <input type='text' id='description' name='description' value='<?php echo $description;?>'><br /><br />
            </span>
            <label for='city'>City:</label><br /><br />
            <span>
                <i class="fas fa-city fa-2x"></i>
                <input type='text' id='city' name='city' value='<?php echo $city;?>'><br /><br />
            </span>
            <label for='facebook'>Facebook:</label><br /><br />
            <span>
                <i class="fab fa-facebook fa-2x"></i>
                <input type='text' id='facebook' name='facebook' value='<?php echo $facebook;?>'><br /><br />
            </span>
            <label for='instagram'>Instagram:</label><br /><br />
            <span>
                <i class="fab fa-instagram-square fa-2x"></i>
                <input type='text' id='instagram' name='instagram' value='<?php echo $instagram;?>'><br /><br />
            </span>

            <input class="SubmitButton" type="submit" id="submit" name="submit" value="Update" /><br />
		</div>
        </form>
</div>
<?php include 'footer.html'; ?>
</body>
