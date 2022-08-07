<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>


</head>

<body>

    <div class="container">
        <form class="m-3" method="POST" enctype="multipart/form-data">
            <h1 class="mt-5 text-center">Upload de arquivos</h1>
            <br><br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Enviar</button>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="arquivo" name="arquivo" aria-describedby="arquivo" required>
                    <label class="custom-file-label" for="inputGroupFile03">Escolher arquivo</label>

                </div>
            </div>
        </form>
    </div>
    
       <a href="album"><button>Clique aqui para ver o album online!</button></a>

    <?php

/*    if (isset($_POST)) {
        echo "<pre>";
        var_dump($_FILES);
        echo '<pre>';
    }
*/
    // teste
   


    // Validações

    $tamanhoMax = 2097152;
    $permitido = ["jpg", "png", "jpeg", "mp4"];
    $entensao = pathinfo($_FILES["arquivo"]["name"]);
//    var_dump($entensao);
    //    echo $entensao['extension'];
    if ($_FILES['arquivo']['size'] >= $tamanhoMax) {
        echo "Tamanho máximo excedido!";
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
                echo "<br><hr>upload relizado com sucesso<br><hr>";
            } else {echo "<br> deu erro fi";}


            }
        } else {
            //   echo 'nao permitido!!!! D:';

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











































    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
