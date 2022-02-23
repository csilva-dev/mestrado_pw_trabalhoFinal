<?php

//require_once __DIR__ . '/../Model/Order.php';

function getHTMLPurchaseDataToPDF($cabecalho, $linhas, $cliente, $orderedDate){
    include '../bd/ligaBD.php';
    ob_start();
    ?>
    <html>
    <head>
        Fatura nº <?php  echo $cabecalho['num']; ?>
    </head>
    <body>
        <div style="text-align:right;">
            <b>Restaurante Boa Comida, Lda</b>
        </div>
        <div style="text-align: left;border-top:1px solid #000;">
            <div style="font-size: 24px;color: #666;">FATURA</div>
        </div>
        <table style="line-height: 1.5;">
            <tr>
                <td><b>Restaurante Boa Comida, Lda</b></td>
                <td style="text-align:right;"><b>Data:</b></td>
            </tr>
            <tr>
                <td>Largo Cândido dos Reis Santarém</td>
                <td style="text-align:right;"><?php echo $orderedDate; ?></td>
            </tr>
            <tr>
                <td>2000-241 Portugal</td>
                <td style="text-align:right;"></td>
            </tr>

            <tr>
                <td>NIF: 505505505</td>
                <td style="text-align:right;"><b>Cliente</b></td>
            </tr>
            <tr>
                <td>+351 243 305 880</td>
                <td style="text-align:right;"><?php echo $cliente['nome']; ?></td>
            </tr>
            <tr>
                <td>www.islasantarem.pt</td>
                <td style="text-align:right;"><?php echo $cliente['morada']; ?></td>
            </tr>
            <tr>
                <td>info@islasantarem.pt</td>
                <td style="text-align:right;"><?php echo $cliente['cod_postal'] .", "; echo $cliente['localidade'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:right;"></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:right;"><b>Método de Pagamento</b></td>
            </tr>
            <tr>
                <td><b>Fatura:</b> #<?php echo $cabecalho['num']; ?></td>
                <td style="text-align:right;"><?php echo $cabecalho['modo_pag'] ?></td>
            </tr>
        </table>

        <div></div>
        <div style="border-bottom:1px solid #000;">
            <table style="line-height: 2;">
                <tr style="font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;">
                    <td style="border:1px solid #cccccc;width:200px;">Descrição</td>
                    <td style = "text-align:right;border:1px solid #cccccc;width:85px">Preço (€)</td>
                    <td style = "text-align:right;border:1px solid #cccccc;width:75px;">Quantidade</td>
                    <td style = "text-align:right;border:1px solid #cccccc;">Subtotal (€)</td>
                </tr>
                <?php
                $total = 0;

                foreach ($linhas as $key => $value) {
                    $prato_uuid = $value['prato_uuid'];
                    $query = "SELECT nome, descricao, tipo, categoria, preco FROM projetoWEB.prato WHERE uuid = UUID_TO_BIN('$prato_uuid')";
                    $resultado = mysqli_query($liga, $query);
                    $prato = mysqli_fetch_assoc($resultado);

                    $preco = $value['qtt'] * $prato['preco'];
                    $total+=$preco;

                    ?>
                    <tr> 
                        <td style="border:1px solid #cccccc;"><?php echo $prato['nome']; ?></td>
                        <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($prato['preco'], 2); ?></td>
                        <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $value['qtt']; ?></td>
                        <td style = "text-align:right; border:1px solid #cccccc;"><?php echo number_format($preco, 2); ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr style = "font-weight: bold;">
                    <td></td><td></td>
                    <td style = "text-align:right;">Total (€)</td>
                    <td style = "text-align:right;"><?php echo number_format($total, 2); ?></td>
                </tr>
            </table>
        </div>
        <p style="text-align:center"><b>Obrigado pela sua preferência!</b></p>
        <p style="text-align:center">Volte sempre!</p>
        <div style="text-align:right;">

            <p><br></p>
            <p></p>
            <p></p><!--Sem Tradução-->
            <p></p><!--Sem Tradução-->
            <p></p><!--Sem Tradução-->
        </div>

    </body>
    </html>

    <?php
    return ob_get_clean();
}
?>