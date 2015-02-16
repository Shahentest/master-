<?php


class Students{

    public $db;

    public $first_name;
    public $last_name;

    public function __construct() {
        $this->db = new Database();
    }

    

    function getStudentTechers($studentId){
        if(is_numeric($studentId)){
            $statement = $this->db->pdo->query("select users.*,classes.name AS class_name from teachers_students
                                                 left join users on  teachers_students.teacher_id=users.id
                                                 left join classes on classes.id=users.class_id
                                                 where teachers_students.student_id=".$studentId." ");

            $statement->execute(array(':name' => "id",':name' => "first_name",':name' => "last_name"));
            $row = $statement->fetchAll();

            if($row){
                return $row;
            }else{
                return false;
            }
        }

    }


}




?>