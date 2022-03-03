<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" method="POST" id="manage-department">
				<div class="card">
					<div class="card-header">
						  Department Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Name</label>
								<textarea name="name" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							
							
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button name="submit" class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3"  type="reset"> Cancel</button>
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
				$name=$_POST['name'];
 				$query="INSERT INTO `department`(`id`, `name`) VALUES ('$id','$name')";
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
									<th class="text-center">Department</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$department = $conn->query("SELECT * FROM department order by id asc");
								while($row=$department->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['name'] ?></b></p>
									</td>
									<td class="text-center">
										<a href="index.php?page=edit_department&&dept=<?php echo $row['id'];?>"	<button class="btn btn-sm btn-primary edit_department" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>"  >Edit</button></a>
										<a href="delete_department.php?dept=<?php echo $row['id'];?>"<button class="btn btn-sm btn-danger delete_department" type="button" data-id="<?php echo $row['id'] ?>">Delete</button></a>
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