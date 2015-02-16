<?php
include('header.php');
include('users.php');
include('teachers.php');


if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case 'addToLessons':
			$user = new Users();
			$Teacher = new Teachers();
			if(isset($_GET['studentId']) && isset($_GET['teacherId'])){
				$student = $user->getById($_GET['studentId']);
				$teacher = $user->getById($_GET['teacherId']);

				if($teacher['profession_id'] == 2 && $student['profession_id'] == 1){
					$Teacher->addStudentToTecher($teacher['id'],$student['id']);

				}
			}
			header("Location: http://school.dev/view_students.php");


			break;
		case 'deletefromLessons':
			$Teacher = new Teachers();
			if(isset($_GET['id'])){
				$Teacher->deleteUserfromLessons($_GET['id'],$_SESSION["user_id"]);
				
			}
			header("Location: http://school.dev/teachers_room.php");


			break;
		case 'deletefromLessons':
			
		break;
		case 'logout':
			
			session_destroy();
			header("Location: http://school.dev/login.php");
			
			break;
		default:
			
			break;
	}
}

?>