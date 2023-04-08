<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    //table name
    protected $table = "mahasiswa";

    //allowed fields
    protected $allowedFields = 
    [
        'nama',
        'nim',
        'semester'
    ];

    public function getMahasiswa()
    {
        return $this->findAll();
    }


    public function getMahasiswaById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_mahasiswa' => $id]);
        }   
    }
	
	public function updateMahasiswa($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_mahasiswa' => $id));
        return $query;
    }
	
	public function deleteMahasiswa($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_mahasiswa' => $id));
        return $query;
    }

    public function insertMahasiswa($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>