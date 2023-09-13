<?php
	date_default_timezone_set('America/Sao_Paulo');
	require_once "cabecalho.php";
?>
	<div class="content">
	<div class="container">
	<div class="row justify-content-center align-items-center">
		<h1 class="row justify-content-center align-items-center">Sugestão</h1>
	</div><br><br>
		<form action="#" method="POST" class="row justify-content-center align-items-center">
			<div class="box">
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Assunto</label>
			<div class="col-sm-6">
			<select name="assunto">
			<option value="0">Escolha um assunto para a sugestão</option>
			<?php				
				if(is_array($retorno2))
				{
					foreach($retorno2 as $dado)
					{
						echo "<option value='{$dado->idassunto}'>{$dado->descritivo}</option>";
					}
					
				}			
			?>
			
			</select>
			</div>
			</div></div>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<div class="col-sm-8"style="color:red;text-align:center;" id="erro1"><?php echo $erro1;?></div>
			</div></div>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Curso</label>
			<div class="col-sm-6">
			<select name="curso">
			<option value="0">Escolha um curso ou geral</option>
			<?php
				if(is_array($retorno))
				{
					foreach($retorno as $dado)
					{
						echo "<option value='{$dado->idcurso}'>{$dado->nome}</option>";
					}
					
				}			
			?>
			
			</select>
			</div>
			</div></div>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<div class="col-sm-8"style="color:red;text-align:center;" id="erro2"><?php echo $erro2;?></div>
			</div></div>
			
			
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Sugestão</label>
			<div class="col-sm-6">
			<textarea  class="form-control" name="descricao"><?php if($_POST) echo $_POST['descricao']?></textarea>
			</div>
			</div></div>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<div class="col-sm-8"style="color:red;text-align:center;" id="erro3"><?php echo $erro3;?></div>
			</div></div>
			
			
			
			
			<br><br>
			<div class="row justify-content-center align-items-center">
			<input class="btn btn-lg btn-success col-sm-2" type="submit" value="Cadastrar">
			</div>
		</form></div>
	</div>
	<div>
		<body style="background-color:#F2983F">
	</div>
	</body>
</html>