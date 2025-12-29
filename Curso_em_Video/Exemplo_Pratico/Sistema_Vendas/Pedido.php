<?php 
    class Pedido {
        private $numeroPedido;
        private $cliente;
        private $itens = array();
        private $status;
        private $data;

        public function __construct($numeroPedido, $cliente, $itens){
            $this->numeroPedido = $numeroPedido;
            $this->cliente = $cliente;
            $this->itens = $itens;
            $this->status = "anotado";
            $this->data = date('Y-m-d H:i:s');  // Adiciona data atual
        }

        // Na classe Pedido, adicione:
        public function getItens() {
            return $this->itens;
        }

        public function getStatus() {
            return $this->status;
        }
        public function getData() {
            return $this->data;
        }

        public function adicionarItem(ItemMenu $item, $quantidade) {
        // Armazena como array associativo com item e quantidade
            $this->itens[] = [
                'item' => $item,
                'quantidade' => $quantidade
            ];
            
            echo "<br />Item adicionado ao pedido: " . $item->getNome() . "<br />";
        }

        public function calcularTotal() {
            $total = 0; 
            foreach ($this->itens as $itemInfo) {
                $item = $itemInfo['item'];  // Agora é um array com 'item' e 'quantidade'
                $quantidade = $itemInfo['quantidade'];
                $total += $item->getPreco() * $quantidade;
            }
            return $total;  // Retorna apenas o número, sem string!
        }

        public function aplicarDesconto($desconto) {
            $total = $this->calcularTotal();
            $totalComDesconto = $total - ($total * $desconto / 100);
            return $totalComDesconto;
        }
        public function mudarStatus($novoStatus) {
            $this->status = $novoStatus; 
            echo "<br /> Status alterado para: " . $this->status . "<br /> <br />";
        }
    } 

?>