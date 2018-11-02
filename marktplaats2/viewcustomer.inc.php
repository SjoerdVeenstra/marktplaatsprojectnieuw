<?php

class ViewUser extends User{
    protected function showAllUsers(){
      $datas = $this->getAllUsers();
      foreach ($datas as $data){
        echo $data['firstname']."<br>";
        echo $data['lastname']."<br>";
        echo $data['email']."<br>";
        echo $data['password']."<br>";
      }
    }
}
?>