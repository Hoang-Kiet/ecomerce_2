<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriesController extends CI_Controller
{
    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
    }
    public function index()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['categories'] = $this->CategoryModel->selectCategory();


        $this->load->view('category/list', $data);
        $this->load->view('admin_template/footer');
    }
    public function create()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('category/create');
        $this->load->view('admin_template/footer');
    }
    public function list()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('category/list');
        $this->load->view('admin_template/footer');
    }
    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn nên điền %s']);
        $this->form_validation->set_rules('description', 'Description', 'trim|required', ["Bạn nên điền %s"]);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ["Bạn nên điền %s"]);

        if (!$this->form_validation->run()) {
            $image_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $image_filename);
            $config = [
                'upload_path' => './uploads/brand',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
                $this->load->view('admin_template/header');
                $this->load->view('admin_template/navbar');
                $this->load->view('category/create', $error);
                $this->load->view('admin_template/footer');
            } else {
                $category_filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'status' => $this->input->post('status'),
                    'image' => $category_filename
                ];
                $this->load->model('BrandModel');
                $this->CategoryModel->insertBrand($data);
                $this->session->set_flashdata('success', 'Thêm thành công');
                redirect(base_url('category/list'));
            }
        } else {
            $this->create();
        }
    }

    public function edit($id)
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['categories'] = $this->CategoryModel->selectCategoryId($id);

        $this->load->view('category/edit', $data);
        $this->load->view('admin_template/footer');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|', [
            'required' => 'Bạn phải điển %s'
        ]);
        $this->form_validation->set_rules('description', 'Description', 'trim|required|', [
            'required' => 'Bạn phải điền %s'
        ]);
        if ($this->form->validation->run()) {

            $image_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $image_filename);
            $config = [
                'upload_path' => './uploads/category',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin_template/header');
                $this->load->view('admin_template/navbar');
                $this->load->view('brand/create', $error);
                $this->load->view('admin_template/footer');
            } else {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }
        }
    }
}
