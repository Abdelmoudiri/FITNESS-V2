<?php
class User {
    protected $nom;
    protected $prenom;
    protected $email;
    protected $telephone;
    protected $password;
    
    public function __construct($nom, $prenom, $email, $telephone, $password)
    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> email = $email;
        $this -> telephone = $telephone;
        $this -> password = $password;
    }

    public function login($email, $password){
        
        $this -> email = $email;
        $this -> password = $password;
    }
}
// ---------------------------------------------------------
?>