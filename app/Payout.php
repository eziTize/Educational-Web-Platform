<?php
namespace App;

//use Validator;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{

        protected $table = "payouts";
        protected $fillable = [
             'user_id', 'ac_holder', 'ac_no', 'tax_no', 'rnib', 'ac_type', 'country', 'city', 'postcode', 'st_addr'
        ];
 }
