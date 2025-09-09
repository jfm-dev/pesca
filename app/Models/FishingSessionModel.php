<?php

namespace App\Models;

use CodeIgniter\Model;

class FishingSessionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fishing_session';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','description', 'start_date', 'stop_date', 'user'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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

    public function getPublications()
    {
        $this->builder = $this->db->table('fishing_session fs');
        $this->builder->select('fs.*, u.name as user');
        $this->builder->join('users u', 'u.id = fs.user');
        $this->builder->orderBy('id','DESC');
        $this->builder->where('fs.deleted_at', null);

        $data =  $this->builder->get();
        return $data->getResultObject();
    }


    
    public function getSession()
    {
        $this->builder = $this->db->table('fishing_session fs');
        $this->builder->select('fs.*, u.name as username, fse.file, fse.file_name');
        $this->builder->join('users u', 'u.id = fs.user');
        $this->builder->join('files_session fse', 'fs.id = fse.fishing_session');
        $this->builder->where('fs.deleted_at', null);
        $this->builder->where('fse.deleted_at', null);

        // $this->builder->groupby('');
        return $this->builder->get()->getResultObject();
    }
}
