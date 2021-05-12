<?php include("link.php") ?>

<?php
	if(mysqli_query($link, "DELETE FROM food WHERE food_id=".$_GET["food_id"]))
	{
		header("location:index.php?delete=done");
	}
	else
	{
		header("locatin:index.php?delete=faile");
	}
?>