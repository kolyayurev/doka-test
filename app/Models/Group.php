<?php

namespace App\Models;

use Core\Model;

class Group extends Model
{
    public function getAll() {

        $this->db->query("SELECT * FROM `groups`");

        return $this->db->get();
    }

    public function getByParent($parentId) {
        return $this->db->query("SELECT * FROM `groups` WHERE `id_parent` = {$parentId}")->get_array();
    }

    public function getById($id) {
        return $this->db->query("SELECT * FROM `groups` WHERE `id` = {$id}")->single();
    }

    public function getNested($id) {
        $groups = $this->getByParent($id);
        foreach ($groups as $key => $group) {
            $groups[$key]['children'] = $this->getNested($group['id']);
        }
        return $groups;
    }

    // Можно заменить на процедуру в MySQL, но сделал на уровне PHP
    public function getNestedIds($id) {
        $nestedIds = [$id];
        $groups = $this->getByParent($id);
        foreach ($groups as $group) {
            $nestedIds = array_merge($nestedIds,$this->getNestedIds($group['id']));
        }
        return $nestedIds;
    }

    public function getParentIds($id) {
        $parentIds = [$id];
        $group = $this->getById($id);

        if(!empty($group['id_parent'])){
            $parentIds = array_merge($parentIds,$this->getParentIds($group['id_parent']));
        }

        return $parentIds;
    }

    public function getTreeTo($from,array $ids) {
        $groups = $this->getByParent($from);
        foreach ($groups as $key => $group){
            $groups[$key]['count'] = (new Product())->getCountInGroup($group['id']);
            if(in_array($group['id'],$ids)){
                $groups[$key]['children'] = $this->getTreeTo($group['id'],$ids);
            }
        }
        return $groups;
    }

    public function getTree($parentId = 0) {

        $parentIds = $this->getParentIds($parentId);

        return $this->getTreeTo(0,$parentIds);
    }
}