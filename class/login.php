<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author ozgur.kuru
 */
class login {
    private $db;
    private $user_id;
    function __construct() {
        global $db;
        $this->db=$db;
    }
    
    function isLogin(){
        $this->user_id= @$_SESSION['user_id'];
        if($this->user_id){
            return true;
        }else{
            return false;
        }
    }
    
    function loginUser($data){
        foreach ($data as $key=>$val){
            $info[$key]=  removeXSS($val);
        }
        $sifre=hash('sha256',$info['sifre']);
        $sql='select * from users where kullaniciadi="'.$info['kullaniciadi'].'" and sifre="'.$sifre.'"';
        echo $sql;
        $this->db->run($sql);
        $user=$this->db->result();
        if($user['id']>0){
            $_SESSION['id']=$user['id'];
            return true;
        }else{
            return false;
        }
        
    }
}
