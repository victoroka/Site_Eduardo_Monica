<?php

//include "avoidSql.php";
include "conecta.php";

$encontrou = false;

 $email = $_COOKIE['email'];
 $senha = $_COOKIE['senha'];

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "SELECT * from bd WHERE email='$email' AND senha='$senha'") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));
      if($resultado){
          while($row = mysqli_fetch_array($resultado) ){
             if($row["email"] == $email && $row["senha"] == $senha){
                $nome = $row['nome'];
                $foto = $row['foto'];
                $msgbv = "<h3>Bem vindo, $nome.</h3>";
                $msgimg = "<img alt='imagem' src='img/usuarios/.$nome./.$foto.'/>";
                $encontrou = true;
             }
          }
      }

      if(!$encontrou) echo "Erro no login!";
      // fechamento da conexão   
      mysqli_close($conexao);




//"<h3>Bem vindo $nome</h3>";
                //echo "<img alt='imagem' src='img/usuarios/$nome/$foto'/>";


?>
