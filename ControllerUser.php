<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelUser');
RequirePage::requireModel('ModelPrivilege');

class ControllerUser{

    public function index(){
        //print_r($_SESSION);
        //die();
       // CheckSession::sessionAuth();
       $user = new ModelUser;
       $select = $user->select();
       twig::render("user-index.php", ['users' => $select, 
                                       'users_list' => "Liste de Utilisateurs"]);
   }

    

    public function create(){
        // if(CheckSession::sessionAuth()){
            // if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 2){
                $privilege = new ModelPrivilege;
                $selectPrivilege = $privilege->select();
                twig::render('user-create.php', ['privileges' => $selectPrivilege]);
        //     }else{
        //         requirePage::redirectPage('home/error');
        //     }
        // }          
    }
    public function store(){

        if($_SESSION['privilege_id']==2){
            $_POST['privilege_id'] = 3; 
        }
        $validation = new Validation;
        extract($_POST);
        // $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->max(20)->min(6);
        $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();

        if($validation->isSuccess()){
            $user = new ModelUser;
            $options = [
                'cost' => 10,
            ];
            $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $userInsert = $user->insert($_POST);
            requirePage::redirectPage('user');
        }else{
            $errors = $validation->displayErrors();
            $privilege = new ModelPrivilege;
            $selectPrivilege = $privilege->select();
            twig::render('user-create.php', ['errors' => $errors,'privileges' => $selectPrivilege, 'user' => $_POST]);
        }
    }

    public function login(){
        twig::render('user-login.php');
    }

    public function auth(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->required();

        if($validation->isSuccess()){

            $user = new ModelUser;
            $checkUser = $user->checkUser($_POST);
            
            twig::render('user-index.php', ['errors' => $checkUser, 'user' => $_POST]);
        
        }else{
            $errors = $validation->displayErrors();
            twig::render('user-login.php', ['errors' => $errors, 'user' => $_POST]);
        }
    }

    public function logout(){
        session_destroy();
        requirePage::redirectPage('user/login');
    }
}

?>