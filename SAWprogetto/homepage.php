<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Felis: Historic Cats</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css" />
	<script src="https://kit.fontawesome.com/b34e2eb2e0.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
        session_start();
        if(!isset($_SESSION['newSession']))
            include 'navbarnew.html';
        else include 'navbaruser.html';
    ?>



    <div class="container" style="margin-top: 20px">
		<form action="search.php" method="post">
		<div class="searchbox">
			<input type="text" class="input" name="searchterm" id="searchterm" placeholder="Search..">
			<div class="searchbtn">
				<button type="submit"><i class="fas fa-search"></i></button>
			</div>
		</div>
		</form>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 results"> <!--Risultato di scroller.js finisce qui-->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="scroller.js"></script>

    <?php include 'footer.html'; ?>
</body>
</html>
