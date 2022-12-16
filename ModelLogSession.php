<?php

class ModelVille extends Crud {

    protected $table = 'LogSession';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'date','adresseIP','pagesVisited'];

}

?>