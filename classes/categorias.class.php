<?php

class Categorias {

    public function getCategorias() {
        $array = array();
        global $pdo;

        $sql = "SELECT * FROM categorias";
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}