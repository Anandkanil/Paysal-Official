<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-deductions" method="POST">
				<div class="card">
					<div class="card-header">
						  Deductions Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Deduction Name</label>
								<textarea name="deduction" id="" cols="30" rows="2" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								<textarea name="description" id="" cols="30" rows="2" class="form-control" required></textarea>
							</div>
							
									
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"name="submit"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3"  type="reset""> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php 
			include 'db_connect.php';
			if(isset($_POST['submit']))
				{
				$id=$_POST['id'];
				$deduction=$_POST['deduction'];
				$description=$_POST['description'];
 				$query="INSERT INTO `deductions`(`id`, `deduction`, `description`) VALUES ('$id','$deduction','$description')";
				$exe=mysqli_query($conn,$query);
				}
		?>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Deduction Information</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$deductions = $conn->query("SELECT * FROM deductions order by id asc");
								while($row=$deductions->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p>Name: <b><?php echo $row['deduction'] ?></b></p>
										 <p class="truncate"><small>Description: <b><?php echo $row['description'] ?></b></small></p>
									</td>
									<td class="text-center">
										<a href="index.php?page=edit_deduction&&sid=<?php echo $row['id']; ?>"><button class="btn btn-sm btn-primary edit_deductions" type="button" data-id="<?php echo $row['id'] ?>" data-deduction="<?php echo $row['deduction'] ?>" data-description="<?php echo $row['description'] ?>" >Edit</button></a>
										<a href="delete_deduction.php?sid=<?php echo $row['id']; ?>"><button class="btn btn-sm btn-danger delete_deductions" type="button" data-id="<?php echo $row['id'] ?>">Delete</button></a>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
	}
</style>