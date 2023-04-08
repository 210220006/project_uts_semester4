<?php
    namespace App\Controllers;
    use App\Models\MahasiswaModel;

    class Mahasiswa extends BaseController
    {
        public function index()
        {
            $MahasiswaModel = new MahasiswaModel();
            $pager = \Config\Services::pager();

            $data = array (
                'MahasiswaModel' => $MahasiswaModel->paginate(10, 'mahasiswa'),
                'pager' => $MahasiswaModel->pager
            );

            return view('mahasiswa', $data);
        }

        public function update($id)
        {
            $model = new MahasiswaModel();   
            $data['mahasiswa'] = $model->getMahasiswaById($id)->getRow();
            echo view('edit_mahasiswa_view', $data);
        }

        public function edit()
        {
            $model = new MahasiswaModel();
            $id = $this->request->getPost('id_mahasiswa');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'semester' => $this->request->getPost('semester'),
            );
            $model->updateMahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new MahasiswaModel();
            $model->deleteMahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

        public function input()
        {
            echo view('input_mahasiswa');
        }

        public function insert()
        {
            $model = new MahasiswaModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'semester' => $this->request->getPost('semester'),
            );
            $model->insertMahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }

    }
    

?>