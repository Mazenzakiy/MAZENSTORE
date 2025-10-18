<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes\Models;

use TechStore\Classes\Db;
use TechStore\Classes\Session;

// categ
class Admin extends Db {
    public function __construct()
    {
        $this->table="admins";
        $this->connect();
    }

    // make function query for login 
    public function login(string $email,string $password,Session $session){
        $sql="SELECT * FROM $this->table WHERE email='$email' LIMIT 1 ";
        $result=mysqli_query($this->conn,$sql);
        $admin=mysqli_fetch_assoc($result);
        if (!empty($admin)) {
            $passwordHash= $admin['password'];
            $isTrue= password_verify($password,$passwordHash);
            if ($isTrue) {
                $session->set('adminId',$admin['id']);
                $session->set('adminName',$admin['name']);
                $session->set('adminEmail',$admin['email']);

                return true; 
            }else {
                return false ;
            }
        }else {
            return false ;
        }
    
    }

    public function logout(Session $session){
        $session->remove('adminId');
        $session->remove('adminName');
        $session->remove('adminEmail');
    }

}






?>