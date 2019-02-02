	<?php   
		include("includes/header.php");
	?>  
	<?php   
		include("library/config.php");
		include("library/database.php");
	?>
	<?php 
	// Update
		//Kjo mer ID nga fusha:
			// <a href="update.php?id=<?php echo urlencode($row['id']);  ">Edit</a>
		$id = $_GET['id'];
		$database = new Database();
		$query = "SELECT * FROM tbl_user WHERE id=$id";
		$getData = $database->select($query)->fetch_assoc();

		if (isset($_POST['submit'])) {
			 $name   = mysqli_real_escape_string($database->link, $_POST['name']);
			 $email  = mysqli_real_escape_string($database->link, $_POST['email']);
			 $skills = mysqli_real_escape_string($database->link, $_POST['skills']);

			if ($name == '' || $email == '' || $skills == '') {
				$error = "Field must not be Empty !";
			}else{
				$query = "UPDATE tbl_user
				  		  SET
				  				 name  = '$name',
				  				 email = '$email',
				 				 skills = '$skills'
				  		  WHERE id = $id";
				$update = $database->update($query);
			}
		}
	?>
<html>
	<div class="row mt-3 ml-1">
		<!-- Ana e majt -->
		<div class="col-md-8 phpcoding">
			<section class="headeroption">
				<h2><?php    echo "CRUD Form with PHP"; ?></h2>
			</section>
		<section class="maincontent">
			<section class="mainoption">
				<div class="myform">
<?php
	// DELETE:
		if(isset($_POST['delete'])){
		 	$query = "DELETE FROM tbl_user WHERE id=$id";
		 	$deleteData  = $database->delete($query);
		}
?>
	<?php
	// ERROR:
			if (isset($error)) {
				echo "<span style='color:red'>".$error."</span>";
			}
	?>	
					<form action="update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">				
						<table class="table p-5">
							<tbody>
								<tr>
									<td>Name</td>
									<td>
										<input type="text" name="name" value="<?php echo $getData['name'] ?>"/>
									</td>
								</tr>	
								<tr>
									<td>Email</td>
									<td>
										<input type="text" name="email" value="<?php echo $getData['email'] ?>"/>
									</td>
								</tr>			
								<tr>
									<td>Skills</td>
									<td>
										<input type="text" name="skills" value="<?php echo $getData['skills'] ?>"/>
									</td>
								</tr>	
								<tr>
									<td></td>
									<td>
										<input type="submit" name="submit" value="Update" />
										<input type="reset"  value="Cancel" onClick="location.href='index.php'" />
										<input type="submit" name="delete" Value="Delete" />
									</td>
								</tr>					
							</tbody>
						</table>
					</form>
<!-- 					<a href="index.php">Go Back</a> -->
				</div>
			</section>
		</div>
		<!-- Ana e djathet -->
		<div class="col-md-4 float-right">
			<?php  include("includes/sidebar.php");?>
		</div>
	</div>
	<!-- Footer -->
	<?php  include("includes/footer.php");?>
