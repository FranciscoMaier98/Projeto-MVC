<?php

    class Categorias extends Model {

        public function getAllCategorias() {

            $data = array();

            $sql = "SELECT categoria FROM categorias";
            $sql = $this->db->query($sql);
           

            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll();
                return $data;
            } else {
                return '';
            }

        }

        

    }

?>