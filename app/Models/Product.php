<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    public function getAll() {

        $this->db->query("SELECT * FROM products");

        return $this->db->get();
    }

    public function getByGroup($groupId) {

        $groupIds = (new Group())->getNestedIds($groupId);

        $this->db->query("SELECT * FROM products WHERE id_group IN (" . implode(',',$groupIds) .")");

        return $this->db->get();
    }

    public function getCountInGroup($groupId) {

        $groupIds = (new Group())->getNestedIds($groupId);

        $result = $this->db->query("SELECT COUNT(*) as total FROM products WHERE id_group IN (" . implode(',',$groupIds) .")")->single();

        return $result['total'] ?? 0;
    }
}