<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	define("USER", "root");
	define("PASSWORD", "");
	define("DATABASE", "udemy_demo");
	define("SERVER", "localhost");

	$connect = new mysqli(SERVER, USER, PASSWORD, DATABASE);

	if ($connect->connect_error) {
		die("Connection failed ". $connect->connect_error);
	}

	echo "We are connected to database.<br><br>";

	$query = "SELECT * FROM users";
	$result = $connect->query($query);
	if ($result->num_rows > 0) {
		echo "<b>Database Result</b> <br>";
		while ($row = $result->fetch_assoc()) {
			echo "<b>id:</b> " . $row["ID"]. " <br> <b>Name:</b> " . $row["name"];  
		}
	}else{
		echo "Database is Empty";
	}

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/
	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
