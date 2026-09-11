<?php

namespace Model;

class Admin extends ActiveRecord {
    //Base de datos
    protected static $table = 'users';
    protected static $columnsDb = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
    }

    public function validate(){
        if(!$this->email){
            self::$errors[] = 'The email is required';
        }
        if(!$this->password){
            self::$errors[] = 'The password is required';
        }

        return self::$errors;
    }

    public function userExist(){
        //check if exist
        $query = "SELECT * FROM " . self::$table . " WHERE email = '"  . $this->email . "'LIMIT 1";

        $result = self::$db->query($query);

        if(!$result->num_rows){
            self::$errors[] = "User not found";
            return;
        }
        return $result;
    }

    public function verifyPassword($result){
        $user = $result->fetch_object();

        $authenticated = password_verify($this->password, $user->password);

        if(!$authenticated){
            self::$errors[] = "Incorrect password";
        }

        return $authenticated;
    }

    public function authenticate(){
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}