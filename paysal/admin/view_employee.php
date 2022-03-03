<?php include 'db_connect.php' ?>

<?php
$emp = $conn->query("SELECT e.*,d.name as dname,p.name as pname FROM employee e inner join department d on e.department_id = d.id inner join position p on e.position_id = p.id where e.id =".$_GET['id'])->fetch_array();
	foreach($emp as $k=>$v){
		$$k=$v;
	}
?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<h5><b><small>Employee ID :</small><?php echo $employee_no ?></b></h5>
		<h4><b><small>Name: </small><?php echo ucwords($name) ?></b></h4>
		<p><b>Department : <?php echo ucwords($dname) ?></b></p>
		<p><b>Position : <?php echo ucwords($pname) ?></b></p>
		<p><b>Salary : <?php echo ucwords($salary) ?></b></p>
		<hr class="divider">
		<div class="row">
			
		</div>		
		<input type="reset" value="Cancel"class="btn btn-secondary"data-dismiss="modal">
		
		</div>
	</div>

</div>
<style type="text/css">
	.list-group-item>span>p{
		margin:unset;
	}
	.list-group-item>span>p>small{
		font-weight: 700
	}
</style>