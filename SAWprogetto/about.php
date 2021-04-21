<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
</head>

<body>
      <?php
        session_start();
        if(!isset($_SESSION['newSession']))
            include 'navbarnew.html';
        else include 'navbaruser.html';

      ?>

    <div class ="contactdiv">
        <h1>Scopo e descrizione:</h1>
        <p>Questo progetto iniziato il 24/11/2020 e' un progetto creato per il corso di SAW, lo scopo del sito è archiviare persone famose <br /> e i loro gatti, il sito e' gratuito e da la possibilita agli utenti normali di guardare tutti i post  gli utenti registrati possono inoltre aggiungere nuovi post.</p>

    </div>
    <?php include 'footer.html'; ?>

</body>
</html>
