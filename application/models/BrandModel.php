<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BrandModel extends CI_Model
{

    public function insertBrand($data)
    {
        $this->db->insert('brands', $data);
    }
    public function selectBrand()
    {
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    public function selectBrandId($id)
    {
        $query = $this->db->get_where('brands', ['id' => $id]);
        return $query->row_array();
    }
    public function updateBrand($id, $data)
    {
        return $this->db->update('brands', $data, ['id' => $id]);
    }

    public function deleteBrand($id){
        $this->db->where('id', $id);
        return $this->db->delete('brands');
    }
}
