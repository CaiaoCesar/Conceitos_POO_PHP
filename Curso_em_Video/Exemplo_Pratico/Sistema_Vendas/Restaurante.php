<?php  
    class Restaurante {
        private $nomeRestaurante;
        private $pedidos = array();
        private $cardapio = array();

        public function __construct($nome) {
            $this->nomeRestaurante = $nome;
        }

        public function adicionarItemCardapio($item) {
            $this->cardapio[$item->getId()] = $item;
        }

        public function removerItemCardapio($id) {
            if (isset($this->cardapio[$id])) {
                unset($this->cardapio[$id]);
                return true;
            }
            return false;
        }

        public function buscarItemCardapio($termoPesquisa) {
            $resultados = array();
            foreach ($this->cardapio as $item) {
                if (strpos($item->getNome(), $termoPesquisa) !== false || strpos($item->getCategoria(), $termoPesquisa) !== false) {
                    $resultados[] = $item;
                }
            }
            return $resultados;
        }

        public function listarCardapioPorCategoria() {
            $categorias = array();
            foreach ($this->cardapio as $item) {
                $categoria = $item->getCategoria();
                if (!isset($categorias[$categoria])) {
                    $categorias[$categoria] = array();
                }
                $categorias[$categoria][] = $item;
            }
            return $categorias;
        }


        public function criarNovoPedido($cliente) {
            $numeroPedido = count($this->pedidos) + 1;
            $pedido = new Pedido($numeroPedido, $cliente, array());
            $this->pedidos[$numeroPedido] = $pedido;
            return $pedido;
        }

        public function buscarPedido($numeroPedido) {
            return $this->pedidos[$numeroPedido] ?? null;
        }

        public function listarPedidosPorStatus($status = null){
            if ($status == null) {
                return $this->pedidos;
            }

            $filtrados = [];
            foreach ($this->pedidos as $pedido) {
                if ($pedido->getStatus() === $status){
                    $filtrados[] = $pedido;
                }
            }
            return $filtrados;
        }

        // Relatório de vendas por período
        public function gerarRelatorioVendas($dataInicio, $dataFim) {
            $totalVendas = 0;
            $pedidosNoPeriodo = [];
            
            foreach ($this->pedidos as $pedido) {
                // Para teste, considera todos os pedidos
                $pedidosNoPeriodo[] = $pedido;
                $totalVendas += $pedido->calcularTotal();
                
                /* Se quiser usar datas futuramente:
                $dataPedido = $pedido->getData();
                // Converte para timestamp para comparação
                $timestampPedido = strtotime($dataPedido);
                $timestampInicio = strtotime($dataInicio);
                $timestampFim = strtotime($dataFim);
                
                if ($timestampPedido >= $timestampInicio && $timestampPedido <= $timestampFim) {
                    $pedidosNoPeriodo[] = $pedido;
                    $totalVendas += $pedido->calcularTotal();
                }
                */
            }
            
            return [
                'periodo' => [$dataInicio, $dataFim],
                'total_pedidos' => count($pedidosNoPeriodo),
                'total_vendas' => $totalVendas,
                'pedidos' => $pedidosNoPeriodo
            ];
        }

        // Item mais vendido 
        public function itemMaisVendido() {
            $contagemItens = [];
            
            foreach ($this->pedidos as $pedido) {
                $itensPedido = $pedido->getItens();
                
                foreach ($itensPedido as $itemInfo) {
                    if (!isset($itemInfo['item']) || !isset($itemInfo['quantidade'])) {
                        continue;  // Pula estrutura inválida
                    }
                    
                    $itemId = $itemInfo['item']->getId();
                    $quantidade = $itemInfo['quantidade'];
                    
                    if (!isset($contagemItens[$itemId])) {
                        $contagemItens[$itemId] = [
                            'item' => $itemInfo['item'],
                            'quantidade_total' => 0
                        ];
                    }
                    $contagemItens[$itemId]['quantidade_total'] += $quantidade;
                }
            }
            
            // Encontra o item com maior quantidade vendida
            $maisVendido = null;
            $maxQuantidade = 0;
            
            foreach ($contagemItens as $contagem) {
                if ($contagem['quantidade_total'] > $maxQuantidade) {
                    $maxQuantidade = $contagem['quantidade_total'];
                    $maisVendido = $contagem['item'];
                }
            }
            
            return [
                'item' => $maisVendido,
                'quantidade_vendida' => $maxQuantidade
            ];
        }

        // Métricas rápidas
        public function getMetricas() {
            $pedidosAtivos = 0;
            $pedidosConcluidos = 0;
            $faturamentoTotal = 0;
            $faturamentoConcluidos = 0;
            
            foreach ($this->pedidos as $pedido) {
                if ($pedido->getStatus() === 'concluido') {
                    $pedidosConcluidos++;
                    $faturamentoConcluidos += $pedido->calcularTotal();
                } elseif ($pedido->getStatus() === 'preparando') {
                    $pedidosAtivos++;
                }
                // Soma de TODOS os pedidos (independente do status)
                $faturamentoTotal += $pedido->calcularTotal();
            }
            
            return [
                'total_pedidos' => count($this->pedidos),
                'pedidos_ativos' => $pedidosAtivos,
                'pedidos_concluidos' => $pedidosConcluidos,
                'faturamento_total' => $faturamentoTotal,  // Agora inclui todos
                'faturamento_concluidos' => $faturamentoConcluidos,
                'tamanho_cardapio' => count($this->cardapio)
            ];
        }

        // Exibe cardápio formatado
        public function exibirCardapio() {
            echo "=== Cardápio do {$this->nomeRestaurante} ===<br />";
            
            $cardapioPorCategoria = $this->listarCardapioPorCategoria();
            
            foreach ($cardapioPorCategoria as $categoria => $itens) {
                echo "<br />--- $categoria ---<br />";
                foreach ($itens as $item) {
                    echo "{$item->getNome()} - R$ {$item->getPreco()}<br />";
                }
            }
        }

        // Exibe dashboard do restaurante
        public function exibirDashboard() {
            $metricas = $this->getMetricas();
            
            echo "================================<br />";
            echo "DASHBOARD - {$this->nomeRestaurante}<br />";
            echo "================================<br />";
            echo "📊 Métricas Gerais:<br />";
            echo "- Total de Pedidos: {$metricas['total_pedidos']}<br />";
            echo "- Pedidos Ativos: {$metricas['pedidos_ativos']}<br />";
            echo "- Pedidos Concluídos: {$metricas['pedidos_concluidos']}<br />";
            echo "- Faturamento Total (todos pedidos): R$ " . number_format($metricas['faturamento_total'], 2) . "<br />";
            echo "- Faturamento Apenas Concluídos: R$ " . number_format($metricas['faturamento_concluidos'], 2) . "<br />";
            echo "- Itens no Cardápio: {$metricas['tamanho_cardapio']}<br />";
            
            // Item mais vendido
            $maisVendido = $this->itemMaisVendido();
            if ($maisVendido['item'] !== null) {  // Verificação corrigida
                echo "<br />🏆 Item Mais Vendido: <br />";
                echo "- {$maisVendido['item']->getNome()}<br />";
                echo "- Quantidade: {$maisVendido['quantidade_vendida']} unidades<br />";
            }
        }
    }
?>