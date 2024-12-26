<?php
class Member extends User{
    private $role;
    public function __construct($nom,$prenom,$email,$telephone,$password)
    {
        parent::__construct($nom,$prenom,$email,$telephone,$password);
        $this->role = 'member';
    }
    
}


?>
$m = new Member("a","a","e","a","a");

