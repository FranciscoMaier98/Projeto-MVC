<?php

class homeController extends Controller {
    
	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $produtos = new Produtos();
        $categorias = new Categorias();
        $dados["produtos"] = $produtos->getAllProdutos();
        $dados["categorias"] = $categorias->getAllCategorias();
        $this->loadTemplate('home', $dados);
    }

}