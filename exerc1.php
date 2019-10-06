<?php

class Pessoa
{
    public $nome;
    public $cpf;
    public $nasc;
    public $altura;
    public $peso;

    public function __construct($n,$c,$nas,$alt,$p){
      $this->nome=$n;
      $this->cpf=$c;
      $this->nasc=$nas;
      $this->altura=$alt;
      $this->peso=$p;
    }

    public function calculo_idade(){
      //data atual 
      $dia=date('d');
      $mes=date('m');
      $ano=date('Y');

      //data do aniversario
      //Data do aniversário
      $nascimento = explode('/',$this->nasc);
      $dianasc = ($nascimento[0]);
      $mesnasc = ($nascimento[1]);
      $anonasc = ($nascimento[2]);
      //Calculando sua idade
      $idade = $ano - $anonasc; // simples, ano- nascimento!
      echo "voce tem $idade anos";
    }
    function validaCPF($cpf=false)
    {
       // Verifica se um número foi informado
      if(empty($cpf)) {
        return false;
      }
    
      // Elimina possivel mascara
      $cpf = preg_replace("/[^0-9]/", "", $cpf);
      $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
      
      // Verifica se o numero de digitos informados é igual a 11 
      if (strlen($cpf) != 11) {
        return false;
      }
      // Verifica se nenhuma das sequências invalidas abaixo 
      // foi digitada. Caso afirmativo, retorna falso
      else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
          echo"$cpf invalido";
        return false;
       // Calcula os digitos verificadores para verificar se o
       // CPF é válido
       } else {   
        
        for ($t = 9; $t < 11; $t++) {
          
          for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if ($cpf{$c} != $d) {
            return false;
            echo"$cpf valido";
          }
        }
    
        return true;
        
      }
    }
     public function calculo_imc(){
      $imc=$this->peso/($this->altura*$this->altura);
      if ($imc<18.5)
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está abaixo do peso!\n";
      }
      elseif (($imc>18.5) && ($imc<24.9))
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está com o peso normal!\n";
      }
      elseif (($imc>25) && ($imc<29.9))
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está com sobrepeso!\n";
      }
      elseif (($imc>30) && ($imc<34.9))
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está com Obesidade grau 1!\n";
      }
      elseif (($imc>35) && ($imc<39.9))
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está com Obesidade grau 2!\n";
      }
      elseif ($imc>40)
      {
          echo "O seu IMC é:".number_format($imc,2),"\n";
          echo "Você está com Obesidade grau 3!\n";
      }

     }

}   