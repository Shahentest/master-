<?php
include('header.php');
include('students.php');



if($_SESSION['user_id']){

$student = new Students();
$teachers = $student->getStudentTechers($_SESSION['user_id']);
	?>
	<table>
		<tr>
			<th>id</th>
			<th>first_name</th>
			<th>last_name</th>
			<th>class</th>
			<th>gender</th>
			<th>email</th>
			<th>Leave</th>

		</tr>
	<?php
	if($teachers){
		foreach ($teachers as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['first_name']; ?></td>
				<td><?php echo $value['last_name']; ?></td>
				<td><?php echo $value['class_name']; ?></td>
				<td><?php echo $value['gender']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><a href="actions.php?action=deletefromTeachers&&id=<?php echo  $value['id']; ?>">leave</a></td>
				
				
			</tr>
			<?php
		}
	}
	?>
	</table>
	<?php


}

?>