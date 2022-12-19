<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');
RequirePage::requireModel('ModelVille');

class ControllerClient{

    public function index(){
        //print_r($_SESSION);
        //die();
       // CheckSession::sessionAuth();
        $client = new ModelClient;
        $select = $client->select();
        twig::render("client-index.php", ['clients' => $select, 
                                        'client_list' => "Liste de Client"]);
    }

    public function create(){
       CheckSession::sessionAuth();
       twig::render('client-create.php');
    }

    public function store(){

        $client = new ModelClient;

        $insert = $client->insert($_POST);

        requirePage::redirectPage('client');

        $ville = new ModelVille;
        $insertVille = $ville->insert($_POST);
        $_POST['ville_id']=$insertVille;
        $client = new ModelClient;
        $insertClient = $client->insert($_POST);
   
       requirePage::redirectPage('client');

    }

    public function show($id){
        $client = new ModelClient;
        $ville = new ModelVille;
        $selectClient = $client->selectId($id);
        $selectVille = $ville->select();
        twig::render('client-show.php', ['client' => $selectClient]);
    }

    public function edit($id){
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        $ville = new ModelVille;
        $selectVille = $ville->select("ville");
        twig::render('client-edit.php', ['client' => $selectClient, 'villes' => $selectVille]);
    }

    public function update(){

            $client = new ModelClient;
            $update = $client->update($_POST);
            RequirePage::redirectPage('client/show/'.$_POST['id']);
            
        }


    public function delete(){
        $client = new ModelClient;
        $delete = $client->delete($_POST['id']);
        RequirePage::redirectPage('client');
    }
}
?>
