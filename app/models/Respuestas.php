<?php

class respuestas extends Eloquent
{
  protected $table = 'preguntas';
  protected $primaryKey = 'preId';
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
