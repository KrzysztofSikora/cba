<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 22.03.16
 * Time: 00:18
 */

class Welcome_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function get($id) {
        // Pobiera id z bazdy
        $query = $this->db->query('SELECT * FROM users WHERE userID = $id');

        foreach ($query->result() as $row)
        {
            echo $row->name;

        }

        echo 'Łączna liczba wyników: ' . $query->num_rows();
    }
}