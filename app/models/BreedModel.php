<?php 

class BreedModel extends Model { 
    private $__table = 'breed';

    function tableFill()
    {

        return $this->__table;
    }
    function fieldFill()
    {
        return '*';
    }

    public function add ($data){
        $data = $this->db->insert($this->__table, $data);

        return $data;
    }

    public function delete_breed ($id){
        $condition = "id='$id'";
        $data = $this->db->delete($this->__table,$condition);
        return true;
    }

    public function get_breed ($id){
        $query = "SELECT * FROM $this->__table WHERE id = '$id'";
        $data = $this->db->query( $query)->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
}

