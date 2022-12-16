<?php

class Twig{
    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
       // $twig = new \Twig\Environment($loader, array('auto_reload' => true,'cache' => false));
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        $twig->addGlobal('path','http://localhost:8888/AUTUMN_2022/PROG_WEB_AVANCEE(PHP)/TP3_PHP/');
        $twig->addGlobal('session', $_SESSION);
       
        if(isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] === md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            $guest = false;
        }else{
            $guest = true;
        }
        $twig->addGlobal('guest', $guest);

        if(isset($_SESSION['Privilege_id']) and $_SESSION['Privilege_id'] === 1){
            
            $admin = true;
        }else{
            $admin = false;
        }
        $twig->addGlobal('admin', $admin);

        if(isset($_SESSION['Privilege_id']) and $_SESSION['Privilege_id'] === 2){
              $employee = true;
        }else{
            $employee = false;
        }
        $twig->addGlobal('employee', $employee);

        if(isset($_SESSION['Privilege_id']) and $_SESSION['Privilege_id'] === 3){
            $client = true;
        }else{
            $client = false;
        }
        $twig->addGlobal('client', $client);



        echo $twig->render($template, $data);

        
    }
}

?>