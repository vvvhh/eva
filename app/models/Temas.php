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

class Subtema extends Eloquent
{
  protected $table = 'subtema';
  protected $primaryKey = 'subId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'subId',
    'subTema',
    'subActivo'
  );
}

?>
