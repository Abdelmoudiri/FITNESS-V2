<?php
class Member extends User{
    private $role;
    public function __construct($nom,$prenom,$email,$telephone,$password)
    {
        parent::__construct($nom,$prenom,$email,$telephone,$password);
        $this->role = 'member';
    }

    public function reserver(){

    }

    public function (){

    }
    

    public function reserver(){

    }

    public function reserver(){

    }
}


?>