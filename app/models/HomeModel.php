<?php

class HomeModel extends Model
{

    private $__table = 'pet';

    function tableFill()
    {

        return $this->__table;
    }
    function fieldFill()
    {
        return '*';
    }

    public function getList()
    {

        echo 'list';
    }

    public function add($data)
    {

        $this->db->insert($this->__table, $data);
    }

    public function getPet($id)
    {
        $query = "SELECT * FROM $this->__table WHERE pet_id = '$id'";
        $data = $this->db->query( $query)->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function update_pet($id, $data){
        $condition = "id='$id'";
        $data = $this->db->update($this->__table, $data, $condition);
        return $data;
    }

    public function delete_pet ($id){
        $condition = "id='$id'";
        $data = $this->db->delete($this->__table,$condition);
        return true;
    }
}
