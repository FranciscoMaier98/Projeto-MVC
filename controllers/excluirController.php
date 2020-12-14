<?php

    class excluirController extends Controller {

        public function __construct() {
            parent::__construct();
        }

        public function index() {

            $dados = array();

            $produtos = new Produtos();
            //$categorias = new Categorias();

            $id = $_GET['id'];
            $produtos->excProduto($id);
            


            
            //$dados["produtos"] = $produtos->getAllProdutos();
            //$dados["categorias"] = $categorias->getAllCategorias();

            //$this->loadTemplate('home', $dados);
            header("Location: ".BASE_URL);
        }

    }

?>