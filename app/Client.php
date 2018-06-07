<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $fillable = ['clients_name', 'clients_age', 'height', 'weight', 'trainer_id'];
}
