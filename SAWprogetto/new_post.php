<html lang="it">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css" />
    <title>New Post</title>
</head>

<body>

<?php
    include 'checksession.php';
    include 'navbaruser.html';

	if(isset($_FILES['picture'])){
      $errors= array();
      $file_name = $_FILES['picture']['name'];
      $file_size = $_FILES['picture']['size'];
      $file_tmp = $_FILES['picture']['tmp_name'];
      $file_type = $_FILES['picture']['type'];
      $tmp = explode('.',$_FILES['picture']['name']);
      $file_ext=strtolower(end($tmp));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false)
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

      if($file_size > 2097152)
         $errors[]='File size must be less than 2 MB';

	  if(file_exists("images/".$file_name))
	  	$errors[]='File already exists, please change name';

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
		 exit();
      }

    //Connessione al database
    $con = new mysqli('localhost', 'S4641902', 'corsosaw2020', 'S4641902');
    if ($con->connect_error) {
        die('Connect Error (' .$con->connect_error . ') '
            . $con->connect_error);}
    //Inserimento nuovo post
    $stmt = $con->prepare("INSERT INTO posts (title, filename, tags, poster) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $title, $filename, $tags, $poster);

    $title = $con->real_escape_string($_POST['title']);
    //Inserisco il filename
    $filename = $con->real_escape_string($_FILES['picture']['name']);
    $tags = $con->real_escape_string($_POST['tags']);
    $poster = $con->real_escape_string($_SESSION['newSession']);

    $stmt->execute();
    printf("%d Row inserted.\n", $stmt->affected_rows);
    $stmt->close();

   }

?>

</body>
</html>
