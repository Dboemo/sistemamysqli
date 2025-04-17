<?php

class crud
{
    private $sql_ins = "";
    private $tabela = "";
    private $sql_sel = "";
    private $sql_upd = "";
    private $sql_del = ""; 
    private $conn;

    /** M�todo construtor
      * @method __construct
      * @param string $tabela
      * @return $this->tabela
      */            
    public function __construct($tabela, $host, $usuario, $senha, $banco) // Adicionando par�metros de conex�o
    {
        $this->tabela = $tabela;
        $this->conn = new mysqli($host, $usuario, $senha, $banco);

        // Verificar conex�o
        if ($this->conn->connect_error) {
            die("Falha na conex�o: " . $this->conn->connect_error);
        }

        return $this->tabela;
    }
        
    /** M�todo inserir
      * @method inserir
      * @param string $campos
      * @param string $valores
      * @example: $campos = "codigo, nome, email" e $valores = "1, 'Jo�o Brito', 'joao@joao.net'"
      * @return void
      */        
    public function inserir($campos, $valores) // Fun��o de inser��o, campos e seus respectivos valores como par�metros
    {
        $this->sql_ins = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";
        
        if (!$this->conn->query($this->sql_ins)) {
            die ("<center>Erro na inclus�o " . '<br>Linha: ' . __LINE__ . "<br>" . $this->conn->error . "<br>
                <a href='index.php'>Voltar ao Menu</a></center>");
        } else {
            print "<script>location='index.php';</script>";
        }
    }

    public function atualizar($camposvalores, $where = NULL) // Fun��o de edi��o, campos com seus respectivos valores e o campo id que define a linha a ser editada como par�metros
    {
        if ($where) {
            $this->sql_upd = "UPDATE " . $this->tabela . " SET $camposvalores WHERE $where";          
        } else {
            $this->sql_upd = "UPDATE " . $this->tabela . " SET $camposvalores";
        }

        if (!$this->conn->query($this->sql_upd)) {
            die ("<center>Erro na atualiza��o " . "<br>Linha: " . __LINE__ . "<br>" . $this->conn->error . "<br>
                <a href='index.php'>Voltar ao Menu</a></center>");
        } else {
            print "<center>Registro Atualizado com Sucesso!<br><a href='index.php'>Voltar ao Menu</a></center>";
        }
    }

    /** M�todo excluir
      * @method excluir
      * @param string $where
      * @example: $where = " codigo=2 AND nome='Jo�o' "
      * @return void
      */        
    public function excluir($where = NULL) // Fun��o de exclus�o, campo que define a linha a ser editada como par�metro
    {
        if ($where) {
            $this->sql_sel = "SELECT * FROM " . $this->tabela . " WHERE $where";
            $this->sql_del = "DELETE FROM " . $this->tabela . " WHERE $where";
        } else {
            $this->sql_sel = "SELECT * FROM " . $this->tabela;
            $this->sql_del = "DELETE FROM " . $this->tabela;
        }

        $sel = $this->conn->query($this->sql_sel);
        $regs = $sel->num_rows;

        if ($regs > 0) {
            if (!$this->conn->query($this->sql_del)) {
                die ("<center>Erro na exclus�o " . '<br>Linha: ' . __LINE__ . "<br>" . $this->conn->error . "<br>
                    <a href='index.php'>Voltar ao Menu</a></center>");
            } else {
                print "<center>Registro Exclu�do com Sucesso!<br><a href='index.php'>Voltar ao Menu</a></center>";
            }
        } else {
            print "<center>Registro N�o encontrado!<br><a href='index.php'>Voltar ao Menu</a></center>";
        }
    }
}

?>