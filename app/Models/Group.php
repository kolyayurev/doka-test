<?php

namespace App\Models;

use Core\Model;

class Group extends Model
{
    public function getAll() {

        $this->db->query("SELECT * FROM `groups`");

        return $this->db->resultSet();
    }
}