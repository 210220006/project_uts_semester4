<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    //table name
    protected $table = "admin";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'email',
        'alamat'
    ];

    public function getAdmin()
    {
        return $this->findAll();
    }


    public function getAdminById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_admin' => $id]);
        }   
    }
	
	public function updateAdmin($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_admin' => $id));
        return $query;
    }
	
	public function deleteAdmin($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_admin' => $id));
        return $query;
    }

    public function insertAdmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>