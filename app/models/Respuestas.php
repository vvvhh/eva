<?php

class respuestas extends Eloquent
{
  protected $table = 'respuestas';
  protected $primaryKey = 'resId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'resId',
    'resRespuesta',
    'resCorrecto',
    'resPreguntas',
    'resActivo'
  );
}
