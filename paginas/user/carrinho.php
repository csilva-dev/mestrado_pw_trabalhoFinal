<?php 

$total = 0;

if(!isset($_SESSION['carrinho'])){
            //$total=0;
    $_SESSION['carrinho'] = array();
}
        //adicionar produto
if(isset($_GET['acao'])){
            //adicionar carrinho
    if($_GET['acao']=='add'){
        $uuid = $_GET['uuid'];
        if(!isset($_SESSION['carrinho'][$uuid])){
            $_SESSION['carrinho'][$uuid] = 1;
        } else {  //caso já exista
            $_SESSION['carrinho'][$uuid] += 1;
        }
    }
            //remover carrinho
    if($_GET['acao']=='del'){
        $uuid = $_GET['uuid'];
        if(isset($_SESSION['carrinho'][$uuid])){
            unset($_SESSION['carrinho'][$uuid]);
        }
    }

            //alterar quantidade
    if($_GET['acao']=='up'){
        if(is_array($_POST['prod'])){
            foreach($_POST['prod'] as $uuid => $qtd){
                $uuid = $uuid;
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0){                          
                    $_SESSION['carrinho'][$uuid] = $qtd;
                }else{
                    unset($_SESSION['carrinho'][$uuid]);
                }
            }
        }
    }       
}

unset($_GET['acao']);

//print_r($_SESSION['carrinho']);  //para mostrar como está a ficar o carrinho

if(count($_SESSION['carrinho'])==0){
    ?>
    <div class="container" style="margin-bottom: 38.1vh">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h4>Carrinho de Compras</h4>
                </div>
            </div>
        </div>
        <hr>
        <br>
        <h4 style="text-align: center;">Não tem produtos no seu carrinho!!</h4>
    </div>
    <?php
}else{
    require ('php/bd/ligaBD.php');
    ?>
    <div class="container" style="margin-bottom: 20px">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h4>Carrinho de Compras</h4>
                </div>
            </div>
        </div>
        <hr>
        <table id="customers" class="table">        
            <thead>
                <tr>
                    <th width="250">Prato</th>
                    <th width="100">Quantidade</th>
                    <th width="100">Preço</th>
                    <th width="100">Subtotal</th>
                    <th width="64">Ações</th>
                </tr>
            </thead>

            <form action="index.php?page=area_reservada&subpage=carrinho&acao=up" method="POST">
                <tbody>
                    <?php
                    foreach($_SESSION['carrinho'] as $uuid => $qtd){
                        $query = "SELECT bin_to_uuid(uuid) as uuid, nome, descricao, img, preco, disponivel_take, tipo, categoria FROM projetoWEB.prato WHERE uuid = uuid_to_bin('$uuid')";
                        $sql = mysqli_query($liga,$query) or die(mysqli_error($liga));       
                        $dados = mysqli_fetch_assoc($sql);  

                        $nome   = $dados['nome'];
                        $p = floatval($dados['preco']);
                        $preco = number_format($p,2,'.','');
                        $s = (floatval($preco))*(floatval($qtd));
                        $sub = number_format($s,2,'.','');                              

                        $total+=$s;   
                        $t=number_format($total,2,'.','');

                        ?>
                        <tr>
                            <td><?php echo $nome; ?></td>
                            <td><input type="text" size="3" name="prod[<?php echo $uuid; ?>]" value="<?php echo $qtd; ?>"/></td>
                            <td><?php echo $preco; ?> €</td>
                            <td><?php echo $sub; ?> €</td>
                            <td>
                                <input type="submit" class="btn btn-outline-dark" value="Atualizar">
                                <a href="index.php?page=area_reservada&subpage=carrinho&acao=del&uuid=<?php echo $uuid ?>">Remover</a>
                            </td>
                        </tr>                    
                        <?php
                    }
                    ?> 
                    <tfoot>
                        <td colspan="3" style="text-align: right;font-weight: bold;">Total: </td>
                        <td style="font-weight: bold;"><?php echo $t; ?> €</td>
                    </tfoot>
                </tbody>
            </form>
        </table>
        <form action="index.php?page=area_reservada&subpage=checkout" method="POST">
            <center><button class="btn btn-primary" type="submit">Finalizar</button></center>
        </form>
    </div>
    <?php
}
?>