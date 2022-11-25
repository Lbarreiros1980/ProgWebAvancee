<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');
RequirePage::requireModel('ModelLivre');

class ControllerClient{

    public function index(){
        $client = new ModelClient;
        $select = $client->select();
        twig::render("client-index.php", ['clients' => $select, 
                                        'client_list' => "Liste de Client"]);
    }

    public function create(){
       twig::render('client-create.php');
    }

    public function store(){
     // print_r($_POST);
     $client = new ModelClient;
     $insert = $client->insert($_POST);
    //  $livre = new ModelLivre;
    //  $insertLivre = $livre->insert($_POST);

    requirePage::redirectPage('client');
    }

    public function show($id){
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        twig::render('client-show.php', ['client' => $selectClient]);
    }

    public function edit($id){
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        twig::render('client-edit.php', ['client' => $selectClient]);
    }

    public function update(){
        $client = new ModelClient;
        $update = $client->update($_POST);
        RequirePage::redirectPage('client/edit/'.$_POST['id']);
    }
    public function delete(){
        $client = new ModelClient;
        $delete = $client->delete($_POST['id']);
        RequirePage::redirectPage('client');
    }
    public function error(){
        twig::render("home-error.php");
    }
}
?>