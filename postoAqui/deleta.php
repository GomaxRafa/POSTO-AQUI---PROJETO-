<?php
    include_once "conexao.php";
    if (isset($_GET['id'])){
        $sql = "DELETE FROM posto WHERE id = " . $_GET['id'];
        mysqli_query($conn, $sql);
        echo "<script>window.location.replace('postos.php');</script>";

    }

?>