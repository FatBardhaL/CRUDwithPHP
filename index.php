	<?php   
		include("includes/header.php");
	?>
	<?php   
		include("library/config.php");
		include("library/database.php");
	?>
	<?php 
		$database = new Database();

		// Selektimi:
		$query = "SELECT * FROM `tbl_user` ORDER BY `id` ";
		$read = $database->select($query);
	?>
	<?php
		if (isset($_GET['msg'])) {
			echo "<span style='color:green'>".($_GET['msg'])."</span>";
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
					<form action="" method="post" enctype="multipart/form-data">			
						<table class="table p-5">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Skills</th>
									<th>EDIT</th>
								</tr>
							</thead>
							<tbody>
			<?php
								if ($read){
									$i = 0;
									while ($row = $read->fetch_assoc()){
										$i++;
			?>
								<tr>
									<!-- TD:1 -->
									<td>
							        	<!-- Shfaqja e ID se te dhenave: -->
							        	<?php   echo $i; ?>
									</td>
									<!-- TD:2 -->
									<td>
							        	<!-- Shfaqja e emrit -->
							        	<?php echo $row['name']; ?>
									</td>
									<!-- TD:3 -->
									<td>
							        	<!-- Shfaqja e emrit -->
							        	<?php echo $row['email']; ?>
									</td>
									<!-- TD:4 -->
									<td>
							        	<!-- Shfaqja e emrit -->
							        	<?php echo $row['skills']; ?>
									</td>
									<!-- TD:5 -->
									<td>
										<a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a>
									</td>
			<?php
									}//End of while
								}else{
									echo "<p>Data is not availbale.</p>";
								}
			?>
								</tr>
							</tbody>
						</table>
						<a href="create.php">Create</a>
					</form>
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

