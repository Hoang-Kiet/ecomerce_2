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
        $data['category'] = $this->CategoryModel->selectCategory();

      

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
}
