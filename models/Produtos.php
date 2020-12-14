<?php

    class Produtos extends Model {



        public function getAllProdutos() {

            $sql = "SELECT * FROM produto";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll();
                return $data;
            } else {
                return '';
            }

        }

        public function excProduto($id) {

            $sql = "SELECT imagem FROM produto WHERE id=:id";            
            $sql = $this->db->prepare($sql);

		    $sql->bindValue(":id", $id);
		    $sql->execute();
            
            if($sql->rowCount() > 0) {
                $imagem = $sql->fetch();
                
            }

            array_map('unlink', glob("assets/images/".$imagem[0]));

            $sql = "DELETE FROM produto WHERE id=:id";
            $sql = $this->db->prepare($sql);
		    $sql->bindValue(":id", $id);
		    $sql->execute();
        }

        public function addProduct($dados = array()){
            

            $up = array();
            $up['pasta'] = "assets/images/";
            $up['tamanho'] = 1024*1024*2;
            $up['extensoes'] = array('jpg', 'png', 'jpeg');
            $up['renomeia'] = true;

            $ext = explode('.', $dados['img']['name']);

            $extensao = $ext[1];
            $extensao = strtolower($extensao);
            
            if(in_array($extensao, $up['extensoes'])===false){
                
                header("Location: ".BASE_URL."adicionar/?erro=extensao");
                exit;
            } else {
                if($up == true) {
                    $nome_final = time().'.png';
                    $nome_final = strval($nome_final);
                }

                if(move_uploaded_file($dados['img']['tmp_name'], $up['pasta'].$nome_final)) {

                    if($up['extensoes'] == 'png') {
                        $largura = 175;
                        $altura = 175;
                        
                        $imagem_final = imagecreatetruecolor($largura, $altura); 
                        $imagem_original = imagecreatefrompng( $up['pasta'].$nome_final);

                        imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0,
                        $largura, $altura, $largura_original, $altura_original);

                        imagepng($imagem_final, null);
                    
                    } elseif($up['extensoes'] == 'jpeg' | $up['extensoes'] == 'jpg') {
                        $largura = 175;
                        $altura = 175;
                        
                        $imagem_final = imagecreatetruecolor($largura, $altura); 
                        $imagem_original = imagecreatefromjpeg( $up['pasta'].$nome_final);

                        imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0,
                        $largura, $altura, $largura_original, $altura_original);

                        imagejpeg($imagem_final, null);
                    }




                } else {
                    header("Location: ".BASE_URL."adicionar/?info=inserir");
                    exit;
                }
            }
            
            //echo $dados['preco'];
            //exit;

            $sql = "INSERT INTO produto (titulo, categoria, preco, preco_formatado, desconto, parcela, preco_desconto, preco_parcelado, imagem) 
            VALUES ('{$dados['titulo']}', '{$dados['categoria']}', '{$dados['preco']}', '{$dados['preco_formatado']}', '{$dados['desconto']}','{$dados['parcela']}','{$dados['preco_desconto']}','{$dados['preco_parcelado']}' ,'{$nome_final}')";

            $sql = $this->db->query($sql);
            
            header("Location: ".BASE_URL."adicionar/?info=sucesso");
        }


        public function getProduto($id) {
            $sql = "SELECT * FROM produto WHERE id=:id";
            $sql = $this->db->prepare($sql);
		    $sql->bindValue(":id", $id);
            $sql->execute();
            
            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll();
                return $data;
            } else {
                return '';
            }
        }

        public function upProduto($dados = array()) {
            
            if(!empty($dados["img"]["tmp_name"])){
                $up = array();
                $up['pasta'] = "assets/images/";
                $up['tamanho'] = 1024*1024*2;
                $up['extensoes'] = array('jpg', 'png', 'jpeg');
                $up['renomeia'] = true;

                $ext = explode('.', $dados['img']['name']);
                $extensao = $ext[1];
                $extensao = strtolower($extensao);
                
                if(in_array($extensao, $up['extensoes'])===false){
                    header("Location: ".BASE_URL."alterar/?id=".$dados['id']."&info=extensao");
                    exit;
                } else {
                    if($up == true) {
                        $nome_final = time().'.jpg';
                        $nome_final = strval($nome_final);
                    }

                    if(move_uploaded_file($dados['img']['tmp_name'], $up['pasta'].$nome_final)) {
                        if($up['extensoes'] == 'png') {
                            $largura = 175;
                            $altura = 175;
                            
                            $imagem_final = imagecreatetruecolor($largura, $altura); 
                            $imagem_original = imagecreatefrompng( $up['pasta'].$nome_final);
    
                            imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0,
                            $largura, $altura, $largura_original, $altura_original);
    
                            imagepng($imagem_final, null);
                        
                        } elseif($up['extensoes'] == 'jpeg' | $up['extensoes'] == 'jpg') {
                            $largura = 175;
                            $altura = 175;
                            
                            $imagem_final = imagecreatetruecolor($largura, $altura); 
                            $imagem_original = imagecreatefromjpeg( $up['pasta'].$nome_final);
    
                            imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0,
                            $largura, $altura, $largura_original, $altura_original);
    
                            imagejpeg($imagem_final, null);
                        }
    
                    } else {
                        header("Location: ".BASE_URL."alterar/?id=".$dados['id']."&?info=inserir");
                        exit;
                    }
                }

                $sql = "UPDATE produto SET titulo = '{$dados['titulo']}', categoria = '{$dados['categoria']}', preco = '{$dados['preco']}', preco_formatado = '{$dados['preco_formatado']}', desconto = '{$dados['desconto']}', parcela = '{$dados['parcela']}', preco_desconto = '{$dados['preco_desconto']}', preco_parcelado = '{$dados['preco_parcelado']}', imagem = '{$nome_final}' WHERE id=:id"; 
                
                $sql = $this->db->prepare($sql);
		        $sql->bindValue(":id", $dados["id"]);
                $sql->execute();
                
            } else {

                $sql = "UPDATE produto SET titulo = '{$dados['titulo']}', categoria = '{$dados['categoria']}', preco = '{$dados['preco']}', preco_formatado = '{$dados['preco_formatado']}', desconto = '{$dados['desconto']}', parcela = '{$dados['parcela']}', preco_desconto = '{$dados['preco_desconto']}', preco_parcelado = '{$dados['preco_parcelado']}' WHERE id=:id"; 
                
                $sql = $this->db->prepare($sql);
		        $sql->bindValue(":id", $dados["id"]);
                $sql->execute();

            }

        }

    }
?>