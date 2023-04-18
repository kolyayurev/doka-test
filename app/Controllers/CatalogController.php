<?php

namespace App\Controllers;

use App\Models\Group;
use App\Models\Product;
use Core\Controller;
use Core\Request;

class CatalogController extends Controller
{
    private $productModel;
    private $groupModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->groupModel = new Group();
    }

    public function index(Request $request) {

        $groupId = (int)$request->getParam('group',0);

        $groups = $this->groupModel->getTree($groupId);
        $products = $this->productModel->getByGroup($groupId);

        $this->view('catalog/index', compact('groups','products'));
    }

}