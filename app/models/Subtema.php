<?php

class subtema extends Eloquent
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