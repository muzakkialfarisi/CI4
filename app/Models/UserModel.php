<?php namespace App\Models;
 
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';

    protected $allowedFields = ['email','name','password','photo', 'token', 'created_at'];

    public function getUser($id = false, $email = false, $token = false)
    {
        if(($id === false) and ($email === false) and ($token === false)){
            return $this->findAll();
        }else{
            if($id === true){
                return $this->getWhere(['id' => $id]);
            }elseif ($email === true){
                return $this->getWhere(['email' => $email]);
            }elseif ($token === true){
                return $this->getWhere(['token' => $token]);
            }
        }
    }

    public function updatedAt($id){
        $builder = $this->db->table('users');
        $builder->where('token', $id);
        $builder->update(['updated_at' => date("Y-m-d h:i:s")]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updatePassword($id,$password){
        $builder = $this->db->table('users');
        $builder->where('token', $id);
        $builder->update(['password'=>$password]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}