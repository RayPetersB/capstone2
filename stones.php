<?php
require_once("db.php");
if(!isset($_SESSION['user'])){
	header('Location: index.php');
}


if (isset($_POST['itemName'])) {
  $name = mysqli_real_escape_string($con, $_POST['itemName']);
  $query = "INSERT INTO item (name) VALUES ('{$name}')";
  mysqli_query($con, $query);
  header("Location: stones.php");
  exit;
} else if (isset($_GET['delete'])) {
  $query = "DELETE FROM item WHERE id = ".mysqli_real_escape_string($con, $_GET['delete']);
  mysqli_query($con, $query);
  header("Location: stones.php");
  exit;
}


$stones = mysqli_query($con, "SELECT * FROM item");
$stones = $stones->fetch_all(MYSQLI_ASSOC);
?>





<html>
<head>

<!-- <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="style.css">

ISSUES WITH RESPONSIVENESS FROM DB TABLE

-->



<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');



body {

	background: #f6f5f7;
	display: overflow
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100%;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

 p {
	font-size: 10px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}


.button {
	border-radius: 5px;
	border: 1px solid #FF4B2B;
	background-color: #663399;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;

}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button:hover {
	cursor: pointer;
} */










</style>
</head>

				<img src="semiprecious-stones.jpg" width="100%", height="50%">
    </div>


<div style="width: 49%; text-align: right;">
	<a href="/logout.php" class="button">Logout</a>
</div>




</header>





<body>
<div id="content">
  <table>
    <thead>
      <th>Item Name</th>
      <th></th>
    </thead>

    <tbody>

  <?php
  foreach ($stones as $s) {
    ?>
    <tr>
      <td>
        <?php echo $s['name']; ?>
      </td>
      <td>
        <a href="?delete=<?php echo $s['id']?>" type='checkbox' /><button type="button">Delete</button></a>
      </td>
    </tr>
    <?php
  }

  ?>
  </tbody>
  </table>
</div>
  <form name="" action="stones.php" method="POST">
    <input type="text" name="itemName" placeholder="Item Name" />
    <input type="submit" value="Add Item" />
  </form>
</body>

<footer>
	<a href="/logout.php" class="button">Logout</a>

	<div style="width: 100%;border-bottom: 1px">
      <!--<a href="/index.php">-->


    </div>

</footer>
</html>
