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

//        dd($request->getParam('group'));
        $groups = $this->groupModel->getByAll();
        $products = $this->productModel->getByGroup();

        $this->view('catalog/index', compact('groups','products'));
    }

}