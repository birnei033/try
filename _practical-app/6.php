
<?php include "functions.php"; ?>

<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">
		
		<?php Navigation();?>
			
		</aside><!--SIDEBAR-->
 

<article class="main-content col-xs-8">
<?php
$url = $_SERVER['REQUEST_URI'];
	if (isset($_POST["submit"])) {
		echo "<h1>".$_POST["name"]."</h1>";
	}
	
?>
<!-- change the action link according to your directory -->
 <form action="<?php echo $url; ?>" method="post">
	<input type="text" name="name" id="name">
	<input type="submit" value="Submit" name="submit">
 </form>

	<?php  

/*  Step1: Make a form that submits one value to POST super global


 */

	
?>


</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>