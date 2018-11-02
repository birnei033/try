<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */
	if (false) {
		echo "this will not appear";
	}else {
		echo "this will appear";
	}
	echo "<br>";
	for ($i=0; $i < 10 ; $i++) { 
		echo $i."<br>";
	}
	$val = 4;
	switch ($val) {
		case 1:
			echo "selected $val";
			break;
		case 2:
		echo "selected $val";
			break;

		case 3:
		echo "selected $val";
			break;
		case 4:
		echo "selected $val";
			break;
		case 5:
		echo "selected $val";
			break;
		default:
		echo "selected $val";
			break;
	}
	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>