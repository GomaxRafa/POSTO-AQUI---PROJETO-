<?php

require_once("conexao.php");
include_once "sessionAdm.php";
if (isset($_GET['resp'])) {
    $resp = $_GET['resp'];
    $id = $_GET['id'];
    if ($resp) {
        $sql = "SELECT * FROM pedido WHERE id = $id;";
        $result = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_array($result);

        $id = $linha['id'];
        $etanol = $linha['etanol'];
        $gasolina = $linha['gasolina'];
        $diesels5 = $linha['diesels500'];
        $diesels10 = $linha['diesels10'];
        $posto = $linha['posto'];

        // Edição do posto - edita todos os campos acima de zero (preenchidos)

        $sql = "UPDATE posto SET ";
        $edit = false;
        if ($etanol > 0) {
            $sql .= "etanol = '$etanol'";
            $edit = true;
        }
        if ($gasolina > 0) {
            if ($edit) {
                $sql .= ",";
            }
            $sql .= "gasolina = '$gasolina'";
            $edit = true;
        }
        if ($diesels5 > 0) {
            if ($edit) {
                $sql .= ",";
            }
            $sql .= "diesels500 = '$diesels5'";
            $edit = true;
        }
        if ($diesels10 > 0) {
            if ($edit) {
                $sql .= ",";
            }
            $sql .= "diesels10 = '$diesels10'";
            $edit = true;
        }
        if ($edit){
            $sql .= " WHERE id = $posto;";
            mysqli_query($conn, $sql);
        }
    }
    $sql = "DELETE FROM pedido WHERE id = $id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.replace('autoriza.php');</script>";
}