	
<h2>Página de produtos</h2>
<p>Aqui você poderá <span style="color:green"><b>ver</b></span>, <span style="color:chocolate"><b>editar</b></span>, <span style="color:blue"><b>adicionar</b></span> ou <span style="color:red"><b>inativar</b></span> produtos</p>

<table style="width:100%">
  <tr>
    <th>Produto</th>
    <th>Fornecedor</th> 
    <th>Situação</th>
	<th>Ação</th>
  </tr>

  <?php
  	$i = 0;	
	foreach ($ProductModel as $p) { // trazendo infos do banco	
						
		$nome[]                     = $p->nome_produto;
		//$_SESSION['produtos'][]     = $nome;
		$fornecedor[]               = $p->fornecedor_produto;
		//$_SESSION['fornecedores'][] = $p->fornecedor_produto;
		$ativo_inativo[]            = $p->ativo_inativo;
		
		if($ativo_inativo[$i] == 'inativo'){

			echo "<tr style='background-color:grey; font-family:Consolas'>";			
			echo "<td>".$nome[$i]."</td>";
			echo "<td>".$fornecedor[$i]."</td>";
			echo "<td>".$ativo_inativo[$i]."</td>";	
			echo "</tr>";	
		} else {

			echo "<tr>";
			echo "<td>".$nome[$i]."</td>";
			echo "<td>".$fornecedor[$i]."</td>";
			echo "<td>".$ativo_inativo[$i]."</td>";	
			echo "<td>
			<form method='get'>
			<input value='desativar' type='submit'>
			</form>
			</td>";	
			echo "</tr>";			
		
		}
		$i++;			
		
	}
			
			
	
	
	?>
	
	<script>
	$(function () {
    $("td").dblclick(function () {
        var conteudoOriginal = $(this).text();

        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();

        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var novoConteudo = $(this).val();
                $(this).parent().text(novoConteudo);
                $(this).parent().removeClass("celulaEmEdicao");
            }
        });

	$(this).children().first().blur(function(){
		$(this).parent().text(conteudoOriginal);
		$(this).parent().removeClass("celulaEmEdicao");
	});
    });
});
</script>
     
</table>
<br>
<h4>Adicionar novo produto</h4>
		
		

<form method="POST" action="">
	<input required name="nome" placeholder="Nome do produto" type="text">
	<input required name="fornecedor" placeholder="Fornecedor" type="text">
	<input required name="situacao" placeholder="Situação" type="text">
	<a href="produtos"><input type="submit" value="Inserir novo produto"></a>
</form>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$products['nome_produto']       = $_POST['nome'];
	$products['fornecedor_produto'] = $_POST['fornecedor'];
	$products['ativo_inativo']      = $_POST['situacao'];
		
	$result = $this->ProductModel->insert_product($products);
		
	return $products;	

}
//$result = $this->ProductModel->inativo_product();

?>
