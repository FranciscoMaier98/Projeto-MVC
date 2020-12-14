<pre>
<?php
   //print_r($produtos);
   //exit;
?>
</pre>

<header>
	<div class="titulo">
        <p>Alterar produto</p>
    </div>
    <div class="adicionar">

		<a href="<?php echo BASE_URL;?>">Voltar</a>
	
	</div>    
</header>

<body>
    <?php if(isset($_GET['info'])): ?>
        <?php if($_GET['info']=='extensao'):?>
        <section >
            <p class="mens_extensao">
                O arquivo pode ser apenas em PNG ou JPEG!
            </p>
        </section>
        <?php elseif ($_GET['info']=='inserir'): ?>
        <section>
            <p class="mens_inserir">
                 Erro de inserção, tente novamente...
            </p>
        </section>
        <?php endif;?>
    <?php endif; ?>
    <section class="section_alterar">
    
        <?php
            $a = 0;
            foreach($produtos as $produto):
                 
        ?>
        
        <div class="parte_preco">
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
                    <div class="preco_antigo"> <span class="span_preco">R$ <?php echo $produto['preco_formatado']?></span> (<?php  echo $produto['desconto'] ?>% off)</div>
                    
                    <div class="preco_atual">R$ <?php echo $produto['preco_desconto'] ?></div>
                    
                    <div class="preco_vezes"><?php echo $produto['parcela']?>x R$ <?php echo $produto['preco_parcelado'] ?></div>    
                </div>
            </div>
        </div>

        <?php
        endforeach;
        ?>

        <div class="parte_formulario">
            <div class="formulario">
                <form action="<?php echo BASE_URL;?>alterar/up/?id=<?php echo $produto["id"]?>" method="post" enctype="multipart/form-data">
                    Título do produto: <input required type="text" value="<?php echo $produto["titulo"]?>" name="titulo" id="titulo"> <br><br>
                    
                    Categoria do produto: <select  required name="categoria">
                        <?php foreach($categorias as $indice=>$categoria):?>
                            <option <?php echo ($produto["categoria"]==$indice?'selected="selected"':'') ?> value="<?php echo $indice ?>" name="<?php echo $indice ?>"><?php echo $categoria[0] ?></option>
                        <?php endforeach ?> 
                    </select> <br><br>
                    
                    Preço: <input  required type="number" step="0.01" value="<?php echo $produto['preco'] ?>" min="0" max="100000" name="preco" id="preco"> R$<br><br>
                    
                    Desconto: <input required type="number" value="<?php echo $produto['desconto'] ?>" name="desconto" min='0' max='100' id="desconto"> %<br><br>
                    
                    Parcelas: <input type="number" name="parcela" value="<?php echo $produto['parcela'] ?>" min='0' max='10' id="parcela"> <br><br>
                    
                    Imagem do produto: <input type="file" name="img" value=""> <br><br>
                    
                    <input type="submit" value="Atualizar" id="botao">
                </form>
            </div>
        </div> 
    </section>
</body>