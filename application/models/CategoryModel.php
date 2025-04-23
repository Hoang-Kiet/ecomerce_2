<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CategoryModel extends CI_Model {
    public function insertCategory($data)
    {
        $this->db->insert('categories', $data);
    }
    public function selectCategory()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    // public function selectCategoryId($id)
    // {
    //     $query = $this->db->get_where('category', ['id' => $id]);
    //     return $query->row_array();
    // }
    // public function updateCategory($id, $data)
    // {
    //     return $this->db->update('category', $data, ['id' => $id]);
    // }

    // public function deleteCategory($id){
    //     $this->db->where('id', $id);
    //     return $this->db->delete('category');
    // }
}
