<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-position" method="POST">
				<div class="card">
					<div class="card-header">
						  Position Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Department</label>
								<select class="custom-select browser-default select2" name="department_id">
									<option value=""></option>
								<?php
								$dept = $conn->query("SELECT * from department order by name asc");
								while($row=$dept->fetch_assoc()):
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Name</label>
								<textarea name="pname" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"name="submit" > Save</button>
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
				$department_id=$_POST['department_id'];
				$pname=$_POST['pname'];
 				$query="INSERT INTO `position`(`id`, `department_id`, `name`) VALUES ('$id','$department_id','$pname')";
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
									<th class="text-center">Position</th>
									<th class="text-center">Department</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$position = mysqli_query($conn,"SELECT * FROM position join department on department.id=position.department_id order by position.id asc");
								while($row=mysqli_fetch_array($position)){
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row[2] ?></b></p>
									</td>
									<td class="text-center">
										 <p> <b><?php echo $row[4] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_position" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-department_id="<?php echo $row['department_id'] ?>"  >Edit</button>
										<a href="delete_position.php?sid=<?php echo $row[0]; ?>"><button class="btn btn-sm btn-danger delete_deductions" type="button" data-id="<?php echo $row['id'] ?>">Delete</button></a>
									</td>
								</tr>
								<?php } ?>
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