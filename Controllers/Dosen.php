<?php
    namespace App\Controllers;
    use App\Models\DosenModel;

    class Dosen extends BaseController
    {
        public function index()
        {
            $DosenModel = new DosenModel();
            $pager = \Config\Services::pager();

            $data = array (
                'DosenModel' => $DosenModel->paginate(10, 'dosen'),
                'pager' => $DosenModel->pager
            );

            return view('dosen', $data);
        }

        public function update($id)
        {
            $model = new DosenModel();   
            $data['dosen'] = $model->getDosenById($id)->getRow();
            echo view('edit_dosen_view', $data);
        }

        public function edit()
        {
            $model = new DosenModel();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nidn' => $this->request->getPost('nidn'),
                'jabatan' => $this->request->getPost('jabatan'),
            );
            $model->updateDosen($data, $id);
            return redirect()->to('/dosen');

        }

        public function delete($id)
        {
            $model = new DosenModel();
            $model->deleteDosen($id);
            return redirect()->to('/dosen');
        }

        public function input()
        {
            echo view('input_dosen');
        }

        public function insert()
        {
            $model = new DosenModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'nidn' => $this->request->getPost('nidn'),
                'jabatan' => $this->request->getPost('jabatan'),
            );
            $model->insertDosen($data);
            return redirect()->to('/dosen');   
        }

    }
    

?>