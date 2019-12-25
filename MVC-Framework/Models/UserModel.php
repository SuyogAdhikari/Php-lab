<?php

    require_once '/BaseModel.php';
    class UserModel extends BaseModel
    {
        public function listUser()
        {
            $st=$this->pdo->prepare("select * from users");
            $st=execute();
            $users=$st->fetchAll();
            var_dump($users);
            return $users;
        } 
    }

    $obj= new UserModel;
    $obj->listUsers();
?>