	<?php   
		include("includes/header.php");
	?>
	<?php   
		include("library/config.php");
		include("library/database.php");

		$database = new Database();
		if (isset($_POST['submit'])) {
			 $name   = mysqli_real_escape_string($database->link, $_POST['name']);
			 $email  = mysqli_real_escape_string($database->link, $_POST['email']);
			 $skills = mysqli_real_escape_string($database->link, $_POST['skills']);

			if ($name == '' || $email == '' || $skills == '') {
				$error = "Field must not be Empty !";
			}else{
				$query = "INSERT INTO `tbl_user`(`name`, `email`, `skills`) VALUES ('$name', '$email', '$skills')";
				$create = $database->insert($query);
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
			if (isset($error)) {
				echo "<span style='color:red'>".$error."</span>";
			}
	?>	
					<form action="create.php" method="post" enctype="multipart/form-data">				
						<table class="table p-5">
							<tbody>
								<tr>
									<td>Name</td>
									<td>
										<input type="text" name="name" placeholder="Please enter name">
									</td>
								</tr>	
								<tr>
									<td>Email</td>
									<td>
										<input type="text" name="email" placeholder="Please enter email">
									</td>
								</tr>			
								<tr>
									<td>Skills</td>
									<td>
										<input type="text" name="skills" placeholder="Please enter skills">
									</td>
								</tr>	
								<tr>
									<td></td>
									<td>
										<input type="submit" name="submit" value="Submit">
										<input type="reset"  value="Cancel" onClick="location.href='index.php'" />
									</td>
								</tr>					
							</tbody>
						</table>
					</form>
					<!-- <a href="index.php">Go Back</a> -->
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
