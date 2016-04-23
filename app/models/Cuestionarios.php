<?php

class Cuestionarios extends Eloquent
{
  protected $table = 'cuestionarios';
  protected $primaryKey = 'cueId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'cueId',
    'cueFechaAp',
    'cueFechaEla',
    'cueNombre',
    'cueTiempo',
    'cueActivo',
    'cueResponsables',
    'cueTema'
  );
}
