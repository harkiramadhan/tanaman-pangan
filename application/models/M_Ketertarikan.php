<?php
class M_Ketertarikan extends CI_Model {
    function getAll(){
        return $this->db->get('ketertarikan');
    }
}