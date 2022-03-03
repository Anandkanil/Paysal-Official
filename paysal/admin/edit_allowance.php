<?php
$aid = $_GET['sid'];
include 'db_connect.php';
$sql = mysqli_query($conn,"SELECT * FROM allowances where id='$aid'");
?>


<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
            <?php while($row = mysqli_fetch_assoc($sql)){ ?>
			<form action="" id="manage-allowances" method="POST">
				<div class="card">
					<div class="card-header">
						  Allowances Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Allowance</label>
								<textarea name="allowance" id="" cols="30" rows="2" class="form-control" required><?php echo $row['allowance']; ?></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								<textarea name="description" id="" cols="30" rows="2" class="form-control" required><?php echo $row['description']; ?></textarea>
							</div>							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"name="submit"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
            <?php } ?>
			</div><?php 
			include 'db_connect.php';
			if(isset($_POST['submit']))
				{
				$id=$_POST['id'];
				$allowance=$_POST['allowance'];
				$description=$_POST['description'];
 				$query="UPDATE `allowances` SET `allowance`='$allowance',`description`='$description' WHERE id='$aid'";
				$exe=mysqli_query($conn,$query);
                echo "<script>location='index.php?page=allowances';</script>";

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