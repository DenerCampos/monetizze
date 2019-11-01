<?php

namespace Monetizze;

require("Principal.php");

use Monetizze\Principal;


$jogos = new Principal(7, 5); //define quantidades de dezenas e de jogos
$soterio = $jogos->realizaSorteio();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Monetizze (teste)</title>
        <meta charset="utf-8">

        <!-- Compiled and minified CSS materialize-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    </head>

    <body class="grey lighten-5">
        <div class="container">

            <div class="row">
                <div class="col s12 center-align"><h1>Monetizze</h1></div>
                
                <div class="col s6 ">
                    <div class="resultado z-depth-2">
                        <table class="highlight centered white">
                            <thead>
                                <tr>
                                    <th colspan="6">Resultado do jogo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                <?php foreach($jogos->getResultado() as $key => $resultado){ ?>                
                                    <td class="<?php  ?>"><?php echo $resultado; ?></td>
                                <?php }?>
                                </tr>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>

                <div class="col s6">
                    <div class="jogos z-depth-2">
                        <?php foreach($jogos->getJogos() as $key => $jogo){ ?>
                        <table class="highlight centered white">
                            <thead>
                                <tr>
                                    <th colspan="<?php echo $jogos->getDezenas();?>">Jogo <?php echo $key+1;?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                <?php foreach($jogo as $valor){ ?>                
                                    <td class="<?php if($jogos->marcaNumero($valor, $key, $soterio)) echo "teal lighten-2"; ?>"><?php echo $valor; ?></td>
                                <?php }?>
                                </tr>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                        <?php }?>
                    </div>                                              
                </div>

            </div> <!-- end row -->          

        </div>  <!-- end container -->     
        
    </body>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>        
</html>
