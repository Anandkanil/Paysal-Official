<?php 
include 'db_connect.php';
$deptid=$_GET['dept'];
$sql = mysqli_query($conn,"SELECT * FROM department where id='$deptid'");

?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
            <?php while($row = mysqli_fetch_assoc($sql)){ ?>
			<form action="" method="POST" id="manage-department">
				<div class="card">
					<div class="card-header">
						  Department Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Name</label>
								<textarea name="name" id="" cols="30" rows="2" class="form-control"><?php echo $row['name']; ?></textarea>
							</div>
							
							
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"name="submit"> Update</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form><?php } ?>
			</div>
            <?php 
			include 'db_connect.php';
			if(isset($_POST['submit']))
				{
				$id=$_POST['id'];
				$name=$_POST['name'];
 				$query="UPDATE `department` SET `name`='$name' WHERE id='$deptid'";
				$exe=mysqli_query($conn,$query);
                echo "<script>location='index.php?page=department';</script>";

				}
		?>
			<!-- FORM Panel -->

			
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
