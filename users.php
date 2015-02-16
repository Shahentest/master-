<?php


class Users{

    public $db;

    public $first_name;
    public $last_name;

    public function __construct() {
        $this->db = new Database();
    }

    public function check_user($user){
        $valid = true;
        if(!$this->validate_alphanumeric_underscore($user['first_name'] )){
            $valid = false;
        }
        if(!$this->validate_alphanumeric_underscore($user['last_name'] )){
            $valid = false;
        }
        if(!$this->validate_email($user['email'])) {
            $valid = false;
        }
        if($user['password'] != $user['confirm_password']){
            $valid = false;
        }
        if($this->find_user_by_email($user['email'])){
            $valid = false;
        }
        if($user['gender'] == ''){
            $valid = false;
        }
        if($user['birth_date'] == ''){
            $valid = false;
        }
        if($user['profession_id'] == ''){
            $valid = false;
        }

        //$this->find_user_by_email($user['email']);
        return $valid;
    }

    protected function validate_email($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  false;
        }else{
            return true;
        }
    }

    protected function find_user_by_email($email){
        if($email){
            $statement = $this->db->pdo->query("select * from users where email='".$email."' ");

            $statement->execute(array(':name' => "id"));
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

    protected function validate_alphanumeric_underscore($str){
        return preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$str);
    }

    public function login($user){
        if($this->validate_email($user['email'])){
            $password = md5($user['password']);
            //var_dump($user,$password);
            $statement = $this->db->pdo->query("select * from users where email='".$user['email']."' AND password='".$password."'");

            $statement->execute(array(':name' => "id"));
            $row = $statement->fetch();

            if($row){
                return $row;
            }else{
                return false;
            }
        }

    }

    function add($user){
        $status = false;
        if($this->check_user($user)){
            if($user){
                var_dump($user);
                $date = date("Y-m-d H:i:s");
                $password = md5($user['password']);
                $add = $this->db->pdo->query("INSERT INTO users (profession_id, first_name, last_name, email, gender, birth_date, password,created)
                 VALUES ('".$user['profession_id']."', '".$user['first_name']."',
                  '".$user['last_name']."', '".$user['email']."',
                  '".$user['gender']."', '".$date."', '".$password."','".$date."'
                  )");
                
                if($add){
                    $status = true;
                }else{
                    $status = false;
                }

            }else{
                $status = false;
            }
        }
        return $status;
    }

    function getById($id){
        if($id){
            
            $statement = $this->db->pdo->query("select * from users where id=".$id." ");

            $statement->execute(array(':name' => "id",':name' => "first_name",':name' => "last_name"));
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

    function getAll(){

        $statement = $this->db->pdo->query("select * from teachers");

        $statement->execute(array(':name' => "id",':name' => "first_name",':name' => "last_name"));
        $row = $statement->fetchAll();
        if($row){
            return $row;
        }else{
            return false;
        }

    }

    function getProfessions(){
        $statement = $this->db->pdo->query("select * from professions");

        $statement->execute(array(':name' => "id",':name' => "name"));
        $all = $statement->fetchAll();

        if($all){
            return $all;
        }else{
            return false;
        }
    }


}





?>