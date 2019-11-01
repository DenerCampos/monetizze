<?php
namespace Monetizze;

class Principal{
    
    private $dezenas; //Quantidade de dezenas
    private $resultado; //Resultado
    private $total; //Total de jogos
    private $jogos; //Jogos


    /**
     * Construtor
     * @param int $qtdDezenas quantidade de dezenas
     * @param int $totalJogos total de jogos
     * @return object Instancia da classe Principal
     * @author Dener Campos
     */ 
    function __construct($qtdDezenas, $totalJogos){
        if(!($qtdDezenas >= 6 && $qtdDezenas <= 10)) $qtdDezenas = 6; //por padrão é 6
        $this->setDezenas($qtdDezenas);
        $this->setTotal($totalJogos);
    }

    //---------------------METODOS---------------------

    /**
     * Gerar Dezenas 
     * Gera dezenas de acordo com o numero que quantidades de dezenas, não pode ser repetido os numeros de 1 a 60
     * @return array 
     * @author Dener Campos
     */ 
    private function geraDezenas(){
        $dados = array();
        
        for($i=0; $i<$this->getDezenas(); $i++){
            $numero = rand(1,60);
            while(in_array($numero, $dados)){ //não seixa repetir o numero aleatorio
                $numero = rand(1,60);
            }
            $dados[$i] = $numero;
        }
        sort($dados, SORT_NUMERIC);
        return $dados;
    }

    /**
     * Gerar Jogos 
     * Gera um array multidimensional contendo em cada posição um jogo 
     * @return void 
     * @author Dener Campos
     */ 
    public function geraJogos(){
        $dados = array();

        for($i=0; $i<$this->getTotal(); $i++){
            $dados[$i] = $this->geraDezenas();
        }

        $this->setJogos($dados);
    }

    /**
     * Sorteio 
     * Realiza o sorteio de 6 dezenas
     * @param int $quantidade quantidade de dezenas, padrão é 6
     * @return void 
     * @author Dener Campos
     */ 
    private function sorteio($quantidade = 6){
        $dados = array();
        
        for($i=0; $i<$quantidade ; $i++){
            $numero = rand(1,60);
            while(in_array($numero, $dados)){ //não seixa repetir o numero aleatorio
                $numero = rand(1,60);
            }
            $dados[$i] = $numero;
        }
        sort($dados, SORT_NUMERIC);
        $this->setResultado($dados);
    }

    /**
     * Confere Jogos 
     * Confere os jogos com o resultado
     * @return array array com os numeros acertados com o mesmo index do array dos jogos. 
     * @author Dener Campos
     */ 
    public function confereJogos(){
        $dados = array();

        for($i=0; $i<count($this->jogos); $i++){
            foreach($this->resultado as $key => $valor){
                if(in_array($valor, $this->jogos[$i])){
                    $dados[$i][array_search($valor, $this->jogos[$i])] = $valor;
                }             
            }
        }

        return $dados;       
    }

    /**
     * Realiza o sorteio
     * Invoca os metodos do processo para impressão na tela 
     * @return array  
     * @author Dener Campos
     */ 
    public function realizaSorteio(){
        $this->geraJogos();
        $this->sorteio();

        return $this->confereJogos();;
    }

    /**
     * Marca numero 
     * Marca o número sorteado no jogo
     * @param int $valor numero sorteado
     * @param int $key chave do array do jogo
     * @param int $jogo array da conferencia do jogo
     * @return bool  
     * @author Dener Campos
     */ 
    public function marcaNumero($valor, $key, $jogo){
        if(key_exists($key, $jogo)){
            if(array_search($valor, $jogo[$key])){
                return true;
            }         
        }          
        return false;
    }

    //--------------------GET e SET--------------------

    /**
     * Get the value of dezenas
     */ 
    public function getDezenas(){
        return $this->dezenas;
    }

    /**
     * Set the value of dezenas
     *
     * @return  self
     */ 
    public function setDezenas($dezenas){
        $this->dezenas = $dezenas;

        return $this;
    }

    /**
     * Get the value of resultado
     */ 
    public function getResultado(){
        return $this->resultado;
    }

    /**
     * Set the value of resultado
     *
     * @return  self
     */ 
    public function setResultado($resultado){
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal(){
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total){
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of jogos
     */ 
    public function getJogos(){
        return $this->jogos;
    }

    /**
     * Set the value of jogos
     *
     * @return  self
     */ 
    public function setJogos($jogos){
        $this->jogos = $jogos;

        return $this;
    }
}
?>