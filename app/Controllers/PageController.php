<?php

namespace App\Controllers;

use App\Models\Group;
use App\Models\Product;
use Core\Controller;

class PageController extends Controller
{
    private $productModel;
    private $groupModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->groupModel = new Group();
    }

    public function index () {
        $title = 'Hello!';

        $this->view('pages/main', compact('title'));
    }

    public function about () {

        $this->view('pages/about');
    }

    public function catalog () {
        $groups = $this->groupModel->getAll();

        $this->view('pages/catalog', compact('groups'));
    }
}