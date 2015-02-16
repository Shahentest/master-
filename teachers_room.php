<?php
include('header.php');
include('Teachers.php');

$teacher = new Teachers();
if(isset($_SESSION['user_id'])){
	$students = $teacher->getTeacherStudents($_SESSION['user_id']);
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
				<td><a href="actions.php?action=deletefromLessons&&id=<?php echo  $value['lesson_id']; ?>">delete</a></td>
				
				
			</tr>
			<?php
		}
	}
	?>
	</table>
	<?php
}

?>