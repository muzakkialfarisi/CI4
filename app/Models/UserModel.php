<?php namespace App\Models;
 
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';

    protected $allowedFields = ['email','name','password','photo', 'token', 'created_at'];


}