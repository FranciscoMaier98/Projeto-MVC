<?php
    class adicionarController extends Controller {

         

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $dados = array();
            $categorias = new Categorias();
            
            $categorias = $categorias->getAllCategorias();
            $dados['categorias'] = $categorias;

            $this->loadTemplate('adicionar', $dados);
        }

        public function add() {
            $dados = array();
            $produtos = new Produtos();
            $up = array();

            if(!empty($_POST["titulo"])){
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

                $produtos->addProduct($dados);
            }

            header("Location: ".BASE_URL);
        }

    }
?>