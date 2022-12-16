<?php

class ModelClient extends Crud {

    protected $table = 'client';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'nom', 'adresse', 'ville_id'];

    
}

?>