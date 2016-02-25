<?php

class Usuarios extends Eloquent
{
  protected $table = 'usuarios';
  protected $primaryKey = 'usuId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'usuId',
    'usuCorreo',
    'usuNombre',
    'usuPass',
    'usuActivo'
  );
}
