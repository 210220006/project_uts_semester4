<?php
    namespace App\Controllers;
    use App\Models\AdminModel;

    class Admin extends BaseController
    {
        public function index()
        {
            $AdminModel = new AdminModel();
            $pager = \Config\Services::pager();

            $data = array (
                'AdminModel' => $AdminModel->paginate(10, 'admin'),
                'pager' => $AdminModel->pager
            );

            return view('admin', $data);
        }

        public function update($id)
        {
            $model = new AdminModel();   
            $data['admin'] = $model->getAdminById($id)->getRow();
            echo view('edit_admin_view', $data);
        }

        public function edit()
        {
            $model = new AdminModel();
            $id = $this->request->getPost('id_admin');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updateAdmin($data, $id);
            return redirect()->to('/admin');

        }

        public function delete($id)
        {
            $model = new AdminModel();
            $model->deleteAdmin($id);
            return redirect()->to('/admin');
        }

        public function input()
        {
            echo view('input_admin');
        }

        public function insert()
        {
            $model = new AdminModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama'  => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertAdmin($data);
            return redirect()->to('/admin');   
        }

    }
    

?>