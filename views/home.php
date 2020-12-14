
<pre>
<?php
	//print_r($produtos);
	//exit;
?>
</pre>

<header>
	<div class="titulo">
		<p>Título da categoria</p>
	</div>
	<div class="adicionar">
		<a href="<?php echo BASE_URL;?>adicionar">Adicionar produto</a>
	</div>
</header>

<section>
	<div class="produtos">

		<?php
		if(!empty($produtos)):
			$a = 0;
			foreach($produtos as $produto):
				
		?>
		
		<div class="container_produtos">
			
			<div class="produto_tags">
				<a onclick="confirma(<?php echo $produto['id']?>)">x</a>
			</div>
			
			<div class="produto">
							
				<div class="imagem">
					<img src="<?php echo BASE_URL; ?>assets/images/<?php echo $produto['imagem'] ?>" alt="">
				</div>
				<div class="categoria">
					<?php 

						echo $categorias[$produto['categoria']]['categoria'];;
					?>
				</div>
				<div class="titulo_produto"><?php echo $produto['titulo'] ?></div>
							
				<div class="precos">
					<?php if($produto['desconto']!=0):?>
						<div class="preco_antigo"> <span class="span_preco">R$ <?php echo $produto['preco_formatado']?></span> (<?php  echo $produto['desconto'] ?>% off)</div>
					<?php endif;?>
					<div class="preco_atual">R$ <?php echo $produto['preco_desconto'] ?></div>
					<?php if($produto['parcela']!=0):?>
						<div class="preco_vezes"><?php echo $produto['parcela']?>x R$ <?php echo $produto['preco_parcelado'] ?></div>
					<?php endif;?>

					<div class="alterar">
						<a href="<?php echo BASE_URL?>alterar/?id=<?php echo $produto['id']?>" class="botao_alterar">Atualizar</a>
					</div>
				</div>
			</div>
		</div>
			
		<?php
			$a++;
			if($a >= 4){
				$a=0;
				echo '</div><div class="produtos">';
			}
		?>

		<?php
			endforeach;
		endif;
		?>
	</div>
</section>