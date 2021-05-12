<?php require_once("link.php")?>
<?php

	$catagory =mysqli_query($link, "SELECT *FROM catagory");
	$catagory_row =mysqli_fetch_assoc($catagory);
	
	$food_id=$_GET["food_id"];
	
	$food_update=mysqli_query($link,"select *from catagory inner join food on catagory.catagory_id=food.catagory_id
	 where food_id=$food_id");
	 $row_food_update =mysqli_fetch_assoc($food_update);
	 
	 

	if(isset($_POST["Update"]))
	{
		$catagory=$_POST["catagory"];
		$name=$_POST["name"];
		$ingredients=$_POST["ingredients"];
		$time=$_POST["time"];
		$description=$_POST["description"];
	    
		if($_FILES["image"]["name"] !="")
		{
			$path ="images" . time() . $_FILES["image"]["name"];
			move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		}
		else
		{
			$path ="";
		}
		
		
		if($path=="")
		{
			$update_food =mysqli_query($link, "UPDATE food SET catagory_id=$catagory, name='$name',ingredients='$ingredients',temp_time='$time',
			description='$description' WHERE food_id=$food_id");
		}
		else
		{
				
			$update_food =mysqli_query($link, "update food set catagory_id=$catagory, name='$name',ingredients='$ingredients',temp_time='$time',
			description='$description',image='$path')");
		}
		
		if($update_food)
		{
			header("location:index.php?update=done");
		}
		else
		{
			header("location:index.php?food_id=$food_id&$path");
		}
		
	}
?>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="bootstrap/css/animate.css">
<link rel="stylesheet" href="bootstrap/js/jquery.js">
<style>
   .input-group{
	   padding:1%;
	    border:2px ;
   }

</style>



<div id="form" style="temp_time:center; margin:2% 9%; "  >

	<h3 class="text-center">Update foods</h3>
	<form  style="padding:4%;"method="post" enctype="multipart/form-data">
		<div class="input-group">
			<span class="input-group-addon">Food catagory:</span>
			<select name="catagory" class="form-control">
			<?php do { ?>
				<option value=<?php echo $catagory_row["catagory_id"]; ?> 
				
				<?php if($catagory_row["catagory_id"]==$row_food_update["catagory_id"]){?> selected <?php } ?>>
					<?php echo $catagory_row["name"]; ?>
				</option>
			<?php } while($catagory_row =mysqli_fetch_assoc($catagory)); ?>
			</select>
		</div>

		<div  class="input-group">
			<span  class="input-group-addon ">Name:</span>
			<input type="text" name="name" class="form-control" value="<?php echo $row_food_update['name']; ?>">
		</div>
		<div class="input-group">
		<span class="input-group-addon">Ingredients:</span>
			<textarea name="ingredients" class="form-control" ><?php echo $row_food_update['ingredients']; ?></textarea>
		</div>
		<div class="input-group">
		<span class="input-group-addon">Time:</span>
			<input type="text" name="time" class="form-control" value="<?php echo $row_food_update['time']; ?>">
		</div>
		<div class="input-group">
		<span class="input-group-addon">Description:</span>
			<textarea name="description" class="form-control" ><?php echo $row_food_update['description']; ?></textarea>
		</div>
		<div class="input-group">
			<span class="input-group-addon">Picture:</span>
			<input type ="file" name="image" class="form-control" value="<?php echo $row_food_update['image']; ?>">
		</div>

		<input style="width:20%; margin-left:3.3%;" type="submit" name="Update" value="Update" class="btn btn-primary text-center">

	 </form>
   </div>
 
