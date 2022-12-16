<?php

class ModelGenre extends Crud {

    protected $table = 'genre';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'genre'];
}

?>