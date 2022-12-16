<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelLivre');
RequirePage::requireModel('ModelPrivilege');

class ControllerLivre{

    public function index(){
        //print_r($_SESSION);
        //die();
       // CheckSession::sessionAuth();
        $livre = new ModelLivre;
        $select = $livre->select();
        twig::render("livre-index.php", ['livres' => $select, 
                                        'livre_list' => "Liste de Livres"]);
    }

    public function create(){
       CheckSession::sessionAuth();
       twig::render('livre-create.php');
    }

    public function store(){

        $validation = new Validation;
       
        //$validation->name('nom')->value($_POST['nom'])
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
       
    
    
        if($validation->isSuccess()){
            $genre = new ModelGenre;
            $insertGenre = $genre->insert($_POST);
            $_POST['genre_idGenre']=$insertGenre;
            $livre = new ModelLivre;
            $insertLivre = $livre->insert($_POST);
       
           requirePage::redirectPage('livre');
        }else{
            $errors = $validation->displayErrors();
            twig::render('livre-create.php', ['errors'=>$errors, 'data'=>$_POST]);
        }
    
    
        }
    
        public function show($id){
            $livre = new ModelLivre;
            $selectLivre = $livre->selectId($id);
            twig::render('livre-show.php', ['livre' => $selectLivre]);
        }
    
        public function edit($id){
            $livre = new ModelLivre;
            $selectLivre = $livre->selectId($id);
            $genre = new ModelGenre;
            $selectGenre = $genre->select("genre");
            twig::render('livre-edit.php', ['livre' => $selectLivre, 'genres' => $selectGenre]);
        }
    
        public function update(){
    
            $validation = new Validation;
            extract($_POST);
            $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
            $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);
    
            if($validation->isSuccess()){
                $livre = new ModelLivre;
                $update = $livre->update($_POST);
                RequirePage::redirectPage('livre/show/'.$_POST['id']);
    
            }else{
                $errors = $validation->displayErrors();
                $genre = new ModelGenre;
                $selectGenre = $genre->select("genre");
                twig::render('livre-edit.php', ['errors'=>$errors, 'livre'=>$_POST, 'genre' => $selectGenre]);
            }
    
    
    
        }
        public function delete(){
            $livre = new ModelLivre;
            $delete = $livre->delete($_POST['id']);
            RequirePage::redirectPage('livre');
        }
    }

?>