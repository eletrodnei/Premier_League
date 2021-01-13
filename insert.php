<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">

    <title>INSERÇÃO</title>
  </head>
  <body>
   <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="http://www.spacecar.com.br/v1/index.html">

                <img src="imagens/Logo Premier 2.png" width="90" height="60" alt=""/>
            </a>
            <a class="navbar-brand" href="http://www.spacecar.com.br/v1/Cadastrar.html">INSCREVA-SE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://www.spacecar.com.br/v1/Regulamento.html">REGULAMENTO <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CLASSIFICAÇÃO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Classdiv1.html">DIVISÃO 1</a>
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Classdiv2.html">DIVISÃO 2</a>
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Classdiv3.html">DIVISÃO 3</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PUNIÇÕES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Pundiv1.html">DIVISÃO 1</a>
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Pundiv2.html">DIVISÃO 2</a>
                            <a class="dropdown-item" href="http://www.spacecar.com.br/v1/Pundiv3.html">DIVISÃO 3</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.spacecar.com.br/v1/Mural.html">MURAL DE CAMPEÕES</a>
                    </li>

                </ul>

                <form>
                    <a class="nav-link text-dark" href="http://www.spacecar.com.br/v1/AdmLogin.html">ADMINISTRAÇÃO</a>
                </form>
 
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="AZ4BKEBAUQL5C" />
                    <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif"  name="submit" title="PayPal - The safer, easier way to pay online!" alt="Faça doações com o botão do PayPal" />
                    <img alt="" border="0" src="https://www.paypal.com/pt_BR/i/scr/pixel.gif" width="1" height="1" />
                </form>   

            </div>

        </nav>
      <div class="mt-xl-6" style="background-color: lightgray;height: 600px">
      
<?php
$nome = $_POST['nome'];
$nick = $_POST['nick'];
$email = $_POST['email'];
$datanascimento = $_POST['datanascimento'];
$controle = $_POST['controle'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$whatsapp = $_POST['whatsapp'];


if (!empty($nome) || !empty($nick) || !empty($email) || !empty($datanascimento) || !empty($whatsapp) || !empty($estado) || !empty($controle) || !empty($cidade)) {
 $host = "localhost";
    $dbUsername = "xxxxxxxxxx";
    $dbPassword = "xxxxxxxx";
    $dbname = "xxxxxxxxx";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From pilotos Where email = ? Limit 1";
     $INSERT = "INSERT Into pilotos (nome, nick, email, datanascimento, controle, cidade, estado, whatsapp) values('$nome','$nick','$email','$datanascimento','$controle','$cidade','$estado','$whatsapp')";
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $nome, $nick, $email, $datanascimento, $controle, $cidade, $estado, $whatsapp);
      $stmt->execute();
      // enviar aviso no email
      ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $too = $email;
    $subjectt = "Bem vindo a Premier League";
    $messagee = "Somos uma liga totalmente gratuita para ingressar você deve entrar nos 2 grupos abaixo e adicionar os ADMS!!! \n"
            . "Entre no nosso grupo de novos pilotos whatsapp para aguardar sua vaga no campeonato!!\n"
            . "https://chat.whatsapp.com/BwOIz2iKnl55V4NE5PY23M \n"
            . "Entre no nosso grupo geral para treinos,dicas e discussão sobre F1!!!\n"
            . "https://chat.whatsapp.com/JgN4o878qRfEKs5EXw6sOl \n"
            . "Adicione na steam os Administradores da liga:\n"
            . "https://steamcommunity.com/profiles/76561198400759710\n"
            . "https://steamcommunity.com/profiles/76561198074190930\n"
            . "https://steamcommunity.com/id/gabrielbnz\n"
            . "https://steamcommunity.com/profiles/76561197995603459\n"
            . "https://steamcommunity.com/profiles/76561197961473957\n"
            . "\n\n\n"
            . "PREMIER LEAGUE ADMS\n"
            . "www.plf1.com.br\n"
            . "https://www.youtube.com/channel/UCoGZnarRofARLvxAhSvkBdA\n";
    $headerss = "Content-type:text;charset=UTF-8" . "\r\n";
    $headerss .= 'From: <cadastro@plf1.com.br>' . "\r\n";
    mail($too, $subjectt, $messagee, $headerss);
    $to = "eletrodnei@hotmail.com,cesaralebueno@gmail.com,gelsonclaudioneto@gmail.com,ligasennapremier@gmail.com,gabriel.cardoso0909@hotmail.com,Lold060@gmail.com";
    $subject = "Novo cadastro Premier League";
    $message = $nome." se cadastrou no Premier League favor adicionar ".$nick. " como amigo na steam !! \n Email: "
    .$email."\n Controle: ".$controle."\n Data Nascimento: ".$datanascimento."\n Cidade: ".$cidade.
            "\n Estado: ".$estado."\n Telefone: ".$whatsapp;
    $headers = "Content-type:text;charset=UTF-8" . "\r\n";
    $headers .= 'From: <cadastro@plf1.com.br>' . "\r\n";
    mail($to, $subject, $message, $headers);
    
    echo "<strong>Cadastro realizado com sucesso, siga instruções enviadas para seu email para concluir o cadastro e entrar nos grupos da liga !!!</strong>"
    . "";
     } else {
      echo "<strong>OPS ! Alguem já está usando esse email !!!</strong>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "";   
 echo "All field are required";
 die();
}
?>          
          
      </div>
      
      
      
      
      
        <footer class="bg-light text-center text-lg-left">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <img src="imagens/Logo Premier 2.png" width="90" height="60" alt=""/>
                        <p>
                            A Premier League é uma liga totalmente gratuita e mantida por patrocinadores, pilotos sejam bem vindos a F1 virtual, patrocinadores será com grande satisfação trabalharmos em conjunto!
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-auto mt-auto mb-auto ml-auto">
                        <h5 class="text-uppercase">Contatos</h5>

                        <ul class="list-unstyled mb-auto">
                            <li>
                                <a href="https://www.facebook.com/Premier-League-Formula-1-PC-100655114873983/" class="text-dark">facebook</a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCoGZnarRofARLvxAhSvkBdA" class="text-dark">Youtube</a>
                            </li>
                            <li>
                                <a href="https://chat.whatsapp.com/BwOIz2iKnl55V4NE5PY23M" class="text-dark">Whatsapp</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="http://spacecar.com.br/v1/index.html">Premier League</a>
            </div>
            <!-- Copyright -->
        </footer>


        <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="CSS/popper.min.js"></script>
        <script src="CSS/bootstrap.min.js"></script>
    </body>
</html>





