<?php
	if (isset($_POST['getData']))
	{
		$con = new mysqli('localhost', 'S4641902', 'corsosaw2020', 'S4641902');
		if ($con->connect_error) {
			die('Connect Error (' .$con->connect_error . ') '
				. $con->connect_error);}
		//Limito i risultati a 5 alla volta
		$stmt = $con->prepare("SELECT id, title, filename, tags, poster FROM posts LIMIT ?, ?");
		$stmt->bind_param('ss', $start, $limit);
		$start = $con->real_escape_string($_POST['start']);
		$limit = $con->real_escape_string($_POST['limit']);

		$sql = $stmt->execute();
		$sql = $stmt->get_result();

		if($sql->num_rows > 0)
		{
			$response = "";
			//Il risultato è una serie di post con Titolo e Immagine
			while ($data = $sql->fetch_array())
			{
				$response .= '
					<div>
						<h2>'.$data['title'].'</h2>
						<img src='.'images/'.$data['filename'].'>
					</div>
				';
			}
			exit($response);

		} else
			exit('reachedMax');

	}
?>
