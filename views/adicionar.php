<pre>
<?php
   //print_r($categorias);
?>
</pre>

<header>
	<div class="titulo">
        <p>Adicionar produto</p>
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
        <?php elseif ($_GET['info']=='sucesso'): ?>
        <section>
            <p class="mens_sucesso">
                 Adicionado com sucesso!
            </p>
        </section>
        <?php endif;?>
    <?php endif; ?>
    <section>
        <div class="formulario">
            <form action="<?php echo BASE_URL;?>adicionar/add" method="post" enctype="multipart/form-data">
                Título do produto: <input required type="text" name="titulo" id="titulo"> <br><br>
                Categoria do produto: <select  required name="categoria">
                    <?php foreach($categorias as $indice=>$categoria):?>
                        <option value="<?php echo $indice ?>" name="<?php echo $indice ?>"><?php echo $categoria[0] ?></option>
                    <?php endforeach ?> 
                </select> <br><br>
                Preço: <input  required type="number" step="0.01" value="0.00" min="0" max="100000" name="preco" id="preco"> R$<br><br>
                Desconto: <input required type="number" value="0" name="desconto" min='0' max='100' id="desconto"> %<br><br>
                Parcelas: <input type="number" name="parcela" value="0" min='0' max='10' id="parcela"> <br><br>
                Imagem do produto: <input required type="file" name="img"> <br><br>
                <input type="submit" value="Adicionar" id="botao">
            </form>
        </div>    
    </section>

    

</body>