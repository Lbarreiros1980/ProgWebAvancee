<?php

class ModelLivre extends Crud {

    protected $table = 'Livre';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'isbn', 'titre', 'author', 'genre_idGenre'];

    
}

?>