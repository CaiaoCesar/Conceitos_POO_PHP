<?php
    class Carrinho {
        public $produtos = [];
        public $total = 0; 

        public function adicionarProduto(Produto $produto) {
            $this->produtos[] = $produto;
            $this->total += $produto->getPreco();

            echo "<br /> Produto " . $produto->getNome() . " adicionado ao carrinho. Preço: R$ " . $produto->getPreco() . "<br />";
        }

        public function calcularTotal() {
            echo "<br /> Total do carrinho: R$ " . $this->total . "<br />";
        }

        public function listarProdutos() {
            echo "<br />Produto no carrinho: <br />";
            foreach ($this->produtos as $produto) {
                echo "- " . $produto->getNome() . ": R$ " . $produto->getPreco() . "<br />";
            }
        }
    }
?>  