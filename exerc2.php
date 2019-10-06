<!DOCTYPE html>
<html>
    <head>
        <title> exercio 1</title>
    </head>
    <body>
    <pre>
        <?php
            require_once 'exerc1.php';
            $p1= new pessoa('gui','09012998980','16/11/1998','1.77','55.50');
            $p1->calculo_idade();   
            $p1->validaCPF();
            $p1->calculo_imc();
            //print_r($p1);
        ?>
    </pre>
    </body>
</html>