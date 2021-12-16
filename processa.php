<?php

    include_once("conexao.php");
    //$dados = $_FILES['arquivo'];
    //var_dump($dados);

    if(!empty($_FILES['arquivo']['tmp_name'])){

        $arquivo = new DomDocument();
        $arquivo->load($_FILES['arquivo']['tmp_name']);
        //var_dump($arquivo); 

        $linhas = $arquivo->getElementsByTagName('Row');
        //var_dump($linhas);

        $primeira_linha = true;

        foreach($linhas as $linha){

            if($primeira_linha == false){

                $nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                echo "Nome : $nome <br>";

                $email = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                echo "E-mail : $email <br>";

                echo "<hr>";

                // inserir o usuario no DB
                $result_usuario = "INSERT INTO usuarios (nome, email, data_de_craicao) VALUES ('$nome' , '$email' ,NOW())";
                $resultado_usuario = mysqli_query($conn,$result_usuario);

            }
            $primeira_linha = false;
    }
}
?>