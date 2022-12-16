<?php

class ControllerHome{

    public function index(){

      // $data =['name' =>'Peter', 
      //         'welcome' => 'Welcome'];
              twig::render('user-login.php');

    }

    public function error(){
        twig::render("home-error.php");
    }
}