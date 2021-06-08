<?php 

class Myformvalidation{

    public function exist($str, $value){       
        list($table, $column) = explode('.', $value, 2);    
        $query = $this->CI->db->query("SELECT COUNT(*) AS count FROM $table WHERE $column = $str'");
        $row = $query->row();
        
        return ($row->count > 0) ? FALSE : TRUE;
    }
}


?>