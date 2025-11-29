<?php
class Obra {
    private $id;
    private $nome;
    private $descricao;
    private $endereco;

    public function __construct($id, $nome, $descricao, $endereco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->endereco = $endereco;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getEndereco() {
        return $this->endereco;
    }
}
?>
