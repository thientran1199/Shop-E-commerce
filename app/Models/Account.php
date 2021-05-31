<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    protected $table = 'account';
	protected $fillable =['id','username','password','role'];
	protected $hidden = ['password','remember_token'];
	public $timestamps = true;

	public function person(){
		return $this->hasOne(Person::class);
	}
}
