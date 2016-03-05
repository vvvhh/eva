<?php

class Cuestionarios extends Eloquent
{
  protected $table = 'preguntas';
  protected $primaryKey = 'preId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'cueId',
    'prePregunta',
    'preCuestionario',
    'preActivo'
  );
}
