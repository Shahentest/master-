<?php


 class Teachers{

     public $db;

     public $first_name;
     public $last_name;

     public function __construct() {
         $this->db = new Database();
         //$db->pdo->query("INSERT INTO teachers (first_name, last_name) VALUES ('qqq', 'asd')");
     }

     function getTeacherStudents($id){
         if($id){
            
             $statements = $this->db->pdo->query("select users.*,teachers_students.id AS lesson_id from teachers_students
                                                 left join users on  teachers_students.student_id=users.id
                                                 where teachers_students.teacher_id=".$id." ");
             
             $statements->execute(array(':name' => "id",':name' => "first_name",':name' => "last_name"));
             $all = $statements->fetchAll();
             
             if($all){
                 return $all;
             }else{
                 return false;
             }
         }else{
            return false;
         }
     }

      function getAllStudents($id){
         if($id){

             $statements = $this->db->pdo->query("SELECT users.*,teachers_students.id AS exist FROM `users` 
                left join teachers_students on teachers_students.student_id=users.id and teachers_students.teacher_id=".$id."
                WHERE users.profession_id=1");
             
             $statements->execute(array(':name' => "id",':name' => "first_name",':name' => "last_name"));
             $all = $statements->fetchAll();
             
             if($all){
                 return $all;
             }else{
                 return false;
             }
         }else{
            return false;
         }
     }

     function getAll(){

         $statement = $this->db->pdo->query("select * from teachers");

         $statement->execute(array(':name' => "id",':name' => "user_id",':name' => "class_id"));
         $row = $statement->fetchAll();
         if($row){
             return $row;
         }else{
             return false;
         }

     }

     function checkStudentInTecher($studentId,$teacherId){
        if(is_numeric($studentId) && is_numeric ($teacherId)){

             $statement = $this->db->pdo->query("select * from teachers_students where teacher_id=".$teacherId." AND student_id=".$studentId." ");

             $statement->execute(array(':name' => "id",':name' => "user_id",':name' => "class_id"));
             $row = $statement->fetch();
             if($row){
                 return $row;
             }else{
                 return false;
             }
         }else{
            return false;
         }
     }

    function addStudentToTecher($teacherId,$studentId){
        if(!$this->checkStudentInTecher($studentId,$teacherId)){
            if(is_numeric($studentId) && is_numeric ($teacherId)){
                //var_dump($studentId,$teacherId);die;
                $statement = $this->db->pdo->query("INSERT INTO teachers_students (teacher_id,student_id,created) 
                                                    VALUES ('".$teacherId."','".$studentId."','".date("Y-m-d H:i:s")."')");
               
                $status = $statement->rowCount();

                return $status;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function checkLessonTeacher($lessonId,$teacherId){
        $statement = $this->db->pdo->query("select * from teachers_students where teacher_id=".$teacherId." AND id=".$lessonId." ");

         $statement->execute(array(':name' => "id",':name' => "user_id",':name' => "class_id"));
         $row = $statement->fetch();
         
         if($row){
             return $row;
         }else{
             return false;
         }
    }

    function deleteUserfromLessons($lessonId,$teacherId){
        if(is_numeric($lessonId) && is_numeric($teacherId)){
            $check = $this->checkLessonTeacher($lessonId,$teacherId);
            if($check){
                $statement = $this->db->pdo->query("DELETE FROM teachers_students WHERE id=".$lessonId." ");    
                $status = $statement->execute();
                return $status;
            }else{
                return false;
            }
            
        }
    }

 }





?>