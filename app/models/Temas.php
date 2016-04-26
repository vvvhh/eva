<?php

class Temas extends Eloquent
{
  protected $table = 'temas';
  protected $primaryKey = 'temId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'temId',
    'temTema',
    'temActivo'
  );
}
?>