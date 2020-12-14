<?php

    class alterarController extends Controller {
        
        public function __construct() {
            parent::__construct();
        }

        public function index() {

            $id = $_GET["id"];
            $dados = array();

            

            $produto = new Produtos();
            $categoria = new Categorias();
            
            $dados["produtos"] = $produto->getProduto($id);
            $dados["categorias"] = $categoria->getAllCategorias();


            $this->loadTemplate('alterar', $dados);
        }

        public function up($id) {
            
            $dados = array();
            $dados["id"] = $_GET["id"];
            $dados["titulo"] = $_POST["titulo"];
            $dados["categoria"] = $_POST["categoria"];
            $dados["preco"] = $_POST["preco"];
            $dados["desconto"] = $_POST["desconto"];
            $dados["parcela"] = $_POST["parcela"];
            $dados["img"] = $_FILES["img"];
            
            $preco_desconto = ($dados['preco']*$dados['desconto'])/100;
            $preco_desconto = $dados['preco'] - $preco_desconto;
            $dados['preco_desconto'] = number_format($preco_desconto, 2 , ",", ".");

            $preco_parcelado = $preco_desconto/$dados["parcela"];
            $dados['preco_parcelado'] = number_format($preco_parcelado, 2 , ",", ".");

            $dados["preco_formatado"] = number_format($dados["preco"], 2 , ",", ".");

            $produto = new Produtos();
            //$categoria = new Categorias();

            $produto->upProduto($dados);

            //$dates["produtos"] = $produto->getAllProdutos();
            //$dates["categorias"] = $categoria->getAllCategorias();
            
            //$this->loadTemplate('home', $dates);
            header("Location: ".BASE_URL);
        }
    }

?>