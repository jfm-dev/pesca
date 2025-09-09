<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'born_day', 'school_level', 'gender', 'username', 'password', 'user_level','department', 'status', 'email', 'contact', 'token'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name'=>'required',
        'username' => 'required|min_length[2]|is_unique[users.id]',
        'password' => 'required',
     //   'confirmpassword'=> 'required_with[password]|matches[password]',
        'email' => 'valid_email|is_unique[users.id]'
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'Porvafor intrduza o seu user',
            'is_unique' => 'Este user é invalido tente outro',
            'min_length' => 'Introduza no minimo 4 caracteres'
        ],
        'password' => [
            'required' => 'Porvafor intrduza a sua senha',
            'min_length' => 'Introduza no minimo 4 caracteres',
            'matches' => 'As senhas não são compativeis',
            'required_with' => 'As senhas não são compativeis'
        ],
        'email' => [
            'valid_email' => 'Indroduza um email válido',
            'is_unique' => 'Este email já existe tente outro',

        ],
        'name' => [
            'required' => 'Indroduza o nome completo'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUser($id)
    {
        $this->builder = $this->db->table('users u');
        $this->builder->select('u.id as iduser, u.name, u.username, u.email as useremail, u.contact as usercontact, u.user_level, l.name, d.name, d.description');
        $this->builder->join('departments d', 'd.id = u.department');
        $this->builder->join('user_levels l', 'l.id = u.user_level');
        $this->builder->where('u.id', $id);
        $this->builder->where('u.status', 1);
        $data =  $this->builder->get();
        return $data->getRowObject();
    }
    public function getUsers()
    {
        $this->builder = $this->db->table('users u');
        $this->builder->select('u.*, l.name as level, d.name as department, d.id as departmentid');
        $this->builder->join('user_levels l', 'l.id = u.user_level');
        $this->builder->join('departments d', 'd.id = u.department');
        $data =  $this->builder->get();
        return $data->getResultObject();
    }
}
