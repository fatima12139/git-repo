
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,shrink-tofit=no">
<title>Food recipe</title>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.svg">
<link rel="stylesheet" href="style.css">

</head>
<body>
    <!--header section start -->
	<header class="header" style="background-color:grey; margin-bottom:20%;">
	
	 
	 <div class="logo"><span class="fa fa-spoon"><b>foodRecipe</b></span></div>
	<div class="fa fa-th-list"></div>
	<nav>
	     <ul>
		      <li><a href="#home">Home</a></li>
			  <li><a href="#spacial">spacial</a></li>
			  <li><a href="#about">about</a></li>
			  <li><a href="#dish">FoodList</a></li>
			  <li><a href="#contuct">Contuct Us</a></li>
		 </ul>
	</nav>

	</header>
	
	
	 <!--header section end ------------------------------------------->
	 
	 
	 	 <!--home section end ------------------------------------------->
	<div class="col">
	 <section id="home" class="container-fluid">
	 <div class="row min-vh-100 align-items-center">
	     <div class="col-md-8 ml-md-5 text-md-left  content">
		 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		    <h1>Food that you can't resist</h1>
			<h2>Enjoy the marvelous taste</h2>
			<p>Enjoy your life and save healthiness with choosing the correct method of cooking.</p>
			<br><br>
		 </div>
		
	 </div>
	 

	<?php
	 $link =mysqli_connect("localhost","root","","foods");
	$catagory =mysqli_query($link, "SELECT *FROM catagory");
	$catagory_row =mysqli_fetch_assoc($catagory);

	if(isset($_POST["Add"]))
	{
		$catagory=$_POST["catagory"];
		$name=$_POST["name"];
		$ingredients=$_POST["ingredients"];
		$time=$_POST["time"];
		$description=$_POST["description"];
		

		$path ="images/".time().$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		
        
		if(mysqli_query($link, "INSERT INTO food VALUES(NULL, $catagory, '$name','$ingredients','$time',
		 '$description','$path')"))
		{
			header("location:index.php?add=done");
		}
		else
		{
			header("location:index.php?error=done");
	}
	}
    ?>

	<div class="container">
  <!-- Modal  start---------------------------------------------------------------------------------------->
  <div class="modal fade" id="myModal"  href="#myModal"role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;">Add Your Recipe</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="catagory"> Catagory</label>
             <select name ="catagory" class="form-control" >
			 <?php do{?>
			 <option value=<?php echo $catagory_row["catagory_id"];?>>
			 <?php echo $catagory_row["name"];?>
			 </option>
			 <?php } while($catagory_row=mysqli_fetch_assoc($catagory));?>
			 </select>
              
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" >
            </div>
            <div class="form-group">
              <label>Ingredients</label>
			  <textarea name="ingredients" class="form-control"></textarea>
            </div>
			   <div class="form-group">
              <label>Time</label>
			 <input type="text" name="time" class="form-control">
            </div>
               <div class="form-group">
              <label>Description</label>
			  <textarea name="description" class="form-control"></textarea>
            </div>
			   <div class="form-group">
              <label>Picture</label>
			 <input style="padding-bottom:3%;" type="file" name="image" class="form-control">
            </div>
			<div class="btn"> 
			<input  style="width:200%;" type="submit" value="Add" name="Add" class="btn btn-primary text-center">
			</div>
          </form>
        </div>
 
      </div>
    </div>
  </div> 
</div>


 <!-- Modal  ends---------------------------------------------------------------------------------------------->
 
 
	 </section>
	 </div>
	 
	  <!--home section end ------------------------------------->
	  
	    <!--spacial section start ------------------------------------------------------------------------------------------------------>
		<div class="col-md-12">
		<section id="spacial" class="container-fluid" style="background-position:fixed; margin-top:7rem;"> 
		<div class="heading text-center">
		<h1>Our <span style="color:yellow; ">Spacial</span></h1>
		<p>We provide the opportunity to learn how to cook delicious dishes and enjoy your time.</p>	
		<p><b>You can share your own skilles in cooking also..</b></p>
		<a ><button  style="background-color:#fff; color:#333;"type="button" data-toggle="modal" data-target="#myModal" >AddNewRecipe</button></a>
	</div>
	<?php 
	//$query=mysqli_query($link,"SELECT food_id,name, image from food order by food_id DESC limit 3 ");
	//$row=mysqli_fetch_assoc($query);
    $select ="SELECT food_id,name, image,ingredients from food order by food_id DESC limit 3 ";
	$row=mysqli_query($link, $select);
	?>

		
		<div class="card-container ">
		<?php foreach($row as $food){?>
		<div  id="one"class=" col-md-4 card">
		<img src="<?php echo $food['image'];?>">
		<p style="font-size:1.4rem; margin:2rem 0;"><?php echo "Name:".$food['name']; ?><br></p>
		<p style="font-size:1.4rem; "><?php echo"Ingredients: " .$food['ingredients']; ?></p>
		<a href="#dish"><button >read more</button></a>
		</div>
		<?php }?>
        </div>

		</section>
		</div>

		<!--spacial section end -->
		
		
		<!--about section start -->
		<div class="col-md-12" style="background-color:white; margin-top:19%;">
		<section id="about" class="container" >
		<div class="head text-center">
	    <h1><span style="color:yellow; "><b>About </span>Us</b></h1>
		</div>
		<div class="min-vh-100">
		<div class="col-md-6 text-left text-md-left align-self-center conten" style="background-color:white; margin-top:30%;">
		<p style="font-size:1.4rem; margin:2rem 0;">We have designed this website to help you in cooking delicious foods,
		this websit can be too much helpfull for those people who don't know how to cook!</p>
		<p style="font-size:1.4rem; margin:2rem 0;">If you have any suggestion or question in terms of cooking you can easily share with us and we will respone as soon as possible!</p>
		<a href="#"><button>Learn more</button></a>
		</div>
		<div class="col-md-6 image">
		<img src="image/IMG_20210410_224528.jpg" style="margin-bottom:20%;margin-top:40px;">
		</div>
		
		</div>
		</section>
		</div>
		<!--about section end -->
	   
	    <!--dish section start -->
		<div class="col-md-12" style="background-color:white;">
		<section id="dish" class="container">


	<?php


	$query=mysqli_query($link, "SELECT *, catagory.name as c_name FROM catagory INNER JOIN food ON 
    catagory.catagory_id =food.catagory_id ORDER BY food_id DESC");
	$row=mysqli_fetch_assoc($query);
?>


	<div class="row">
	<div class="col-md-12" style="margin-left:-5%;">
	<table  class="table table-border-radius">
	<tr><h2 style="text-align:center "><b>Food-List</b></h2></tr>
	<tr style="text-align:left">
		<th>Number</th>
		<th>Catagory</th>
		<th>Name</th>
		<th>Ingredients</th>
		<th>Time</th>
		<th>Describtion</th>
		<th>Picture</th>
		<th> Delet & Update </th>
		
	</tr>
		<?php do { ?>
		<tr>
			<td style="font-size:20px;"> <?php echo $row["food_id"];?></td>
			<td><?php echo $row["c_name"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["ingredients"]; ?></td>
			<td><?php echo $row["time"]; ?></td>
			<td><pre style="background-color:white; border:none;"><?php echo $row["description"]; ?></pre></td>
			<td><img src ="<?php echo $row["image"]; ?>" width ="150px">
			<td>
			<a style="margin-left:8%;"class="delete" href="food_delete.php?food_id=<?php echo $row["food_id"];?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
			</td>
			<td>
				<a style="margin-left:-250%; " href="food_edit.php?food_id=<?php echo $row["food_id"];?>">
				<span class="glyphicon glyphicon-edit"></span>
				</a>
			</td>
			</td>

         </tr>
		<?php }while($row = mysqli_fetch_assoc($query)); ?>
	</table>
	</div></div>


		</section>
		</div>
		<!--dish section ends -->
		
		<!--contuct section start -->
		<?php if(isset($_POST['send'])){
			$name=$_POST['fname'];
			$email=$_POST['email'];
			$massage=$_POST['massage'];
			if(mysqli_query($link,"INSERT INTO contuct VALUES(null,full_name='$name',e_mail='$email',massage='$massage')")){
				header("location:index.php?massage=add");
			}
			else{
					header("location:index.php?massage=notadd");
			}
			
		}?>
	 <div class="  col-md-12" style="background-image:url(image/1.jpg);" >
		<section class="row" id="contuct" class="container-fluid">
		<div class=" text-center">
		<h1><span style="color:yellow; margin-top:19%;"><b>Contact </span>Us</b></h1>
		</div>
		<div class=" row1 justify0-content-center">

		
		<form action=""  method="POST"class="col-md-7" style="background-color:#fff; box-shadow:0 0 5rem #333;margin-left:0%;text-align:center;align-items:center;padding:3rem;border-radius:2rem;" >
		<div class="inputBox" >
		<input  name="fname"type="text" placeholder="Full Name"  required>
		
		</div>
		<div class="inputBox" >
		<input name="email" type="text" placeholder="e-mail"   required >
		</div>
		<div class="inputBox">
		<textarea  name="massage" cols="19"  rows="5" placeholder="Massages"   required></textarea>
		
		</div>
		<div class="inputBox">
		<input type="submit" value="send">
		</div>
		</form>
		<div class="col-md-5 align-items-right">
		 <div class="icons text-center">
		 <a href="#" class="fa fa-home"></a>
		 <p style="color:#fff"><b>Kart-e-3,Kabul-Afghanistan.</b></p>
		  <a href="#" class="fa fa-phone"></a><p style="color:#fff"><b>(+93)-773261368<br>(+93)797712331</b></p>
		   <a href="#" class="fa fa-facebook"></a><p style="color:#fff"><b>https://www.facebook.com/fatima.rezaie.1213</b></p>
		</div>
		
		</div>


		</div>
		</section>

		</div>
		<!--contuct section start -->
		
		  <!--footer section start -->  
		  
		  <section id="footer" class=" footer container-fluid">
		  <div class="row align-items-center">
		  <div class="col-md-4 brand">
		  <a href="#" class="logo"> <span class="fa fa-spoon"></span></a>
		  <div class="icons">
		  <a href="#" class="fa fa-facebook"></a>
		    <a href="#" class="fa fa-twitter"></a>
			  <a href="#" class="fa fa-instagram"></a>
			    <a href="#" class="fa fa-pinterest"></a>
		  </div>
		  </div>
		  <div class="col-md-4 footer-links">
		  <h3><span><b>Links:</b></span></h3>
		  <a href="#home"><b>Home</b></a><br>
		  <a href="#spacial"><b>Spacial</b></a><br>
		  <a href="#about"><b>About</b></a><br>
		  <a href="#dish"><b>Dish</b></a><br>
		  <a href="#contuct"><b>Contuct</b></a>
		  </div>
		  <div class="col-md-4  text-center text-md-left letter">
		  <h2>NewsLetter</h2>
		  <input type="text"><br>
		  <input type="submit" value="subscribe">
		  </div>
		  </div>
		  <h1>&copy; Copyright @ 2021 by<span > Mrs. Web desiner</span></h1>
		  <div class="clearfix"></div>
		  </section>
		  <!--footer section ends -->
		
		
	   <!--script section start -->

	   <script>
	   $(document).ready(function(){
		   $('.fa-th-list').click(function(){
			   $(this).toggleClass('fa-times');
			   $('nav').toggleClass('nav-toggle');
		   });
		   $('nav ul li a').click(function(){
			   $('.fa-th-list').removeClass('fa-times');
			   $('nav').removeClass('nav-toggle');
		   });
		     });

	 
	   </script>
	    <!--script section end -->
	 
	 
	 <!--home section end -->
		   </body>
</html>





