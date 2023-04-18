<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    public function getAll() {

        $this->db->query("SELECT * FROM products");

        return $this->db->resultSet();
    }

    public function getByGroup() {

        $this->db->query("SELECT * FROM products");

        return $this->db->resultSet();
    }
}