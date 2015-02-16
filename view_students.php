<?php
include('header.php');
include('Teachers.php');
$teacher = new Teachers();
if($_SESSION['user_id']){
	$students = $teacher->getAllStudents($_SESSION['user_id']);
	
	?>
	<table>
		<tr>
			<th>id</th>
			<th>first_name</th>
			<th>last_name</th>
			
			<th>gender</th>
			<th>email</th>
			<th>Add to lessons</th>

		</tr>
	<?php
	if($students){
		foreach ($students as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['first_name']; ?></td>
				<td><?php echo $value['last_name']; ?></td>
				
				<td><?php echo $value['gender']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<?php
					if($value['exist']){?>
						<td>Exist</td>
					<?php }else{ ?>
						<td><a href="actions.php?action=addToLessons&&studentId=<?php echo  $value['id']; ?>&&teacherId=<?php echo $_SESSION['user_id']; ?>">Add</a></td>
					<?php } ?>
				
				
			</tr>
			<?php
		}
	}
	?>
	</table>
	<?php
}



?>