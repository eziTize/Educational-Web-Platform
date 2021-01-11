<?php
namespace App;

//use Validator;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

        protected $table = "tests";
        protected $fillable = [
             'type', 'primaryAddress'
        ];
 }
