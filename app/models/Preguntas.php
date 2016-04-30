<?php

class preguntas extends Eloquent
{
  protected $table = 'preguntas';
  protected $primaryKey = 'preId';
  public $timestamps = false;
  public $incrementing = true;
  protected $fillable = array(
    'preId',
    'prePregunta',
    'preCue',
    'preActivo',
    'preTipo'
  );
}
