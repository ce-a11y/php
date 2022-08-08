<?php
error_reporting(0);

    // mensagens

    $sucesso = '<div class="alert alert-success" role="alert">
    Olha só! A imagem foi enviada!
  </div>';
    $erro = '<div class="alert alert-danger" role="alert">
    Xi patrão, deu erro viu... Tenta upar um arquivo';
    $grande = 'menor da próxima! </div>';
    $errado = 'no formato JPG da próxima! </div>';

// Validações
    $tamanhoMax = 2097152;
    $permitido = ["jpg"];
    $entensao = pathinfo($_FILES["arquivo"]["name"]);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['arquivo']['size'] >= $tamanhoMax) {
        echo "$erro $grande";
    } else {
        if (in_array($entensao['extension'], $permitido)) {
            //      echo "Permitido!";
            $pasta = 'upload/';
            if (!is_dir($pasta)) {
                mkdir($pasta, 0755);
            } if (is_dir($pasta)) {
            
            $Scan = scandir($pasta);
            $nomeTemp = $_FILES['arquivo']['tmp_name'];
            $novoNome = nome($Scan).'.'.$entensao['extension'];

            if(move_uploaded_file($nomeTemp,$pasta.$novoNome)) {
                echo "$sucesso";
            } else {echo "$erro $errado ";}


            }
        } else {
            //   echo 'nao permitido!!!! D:';
           echo "$erro $errado ";
        }// echo "<br><hr>$erro $errado<br><hr> ";
    } 
    }
    $tst = 0;
    function nome($img) {
    foreach ($img as $key => $value) {
        global $tst;
        $tst += 1;
    }
    $tst -= 1;
    return $tst;
    }



    ?>
