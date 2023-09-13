<?php
	require_once "cabecalho.php";
?>
	<div class="row justify-content-center align-items-center">
		<h1 class="row justify-content-center align-items-center">Curso</h1>
	</div><br><br>
		<form action="#" method="POST" class="row justify-content-center align-items-center">
		<input type="hidden" name="id" value="<?php echo $ret[0]->idcurso;?>">
			<div class="form-group col-md-6">
			<label>Nome:</label>
			<input  class="form-control"type="text" name="nome" value="<?php if($_POST) echo $_POST['nome']; else echo $ret[0]->nome;?>" required>
			</div>
			
			<div class="align-items-center" style="color:red;text-align:center;" id="erro"><?php echo $erro;?>
			
			</div>
			<br><br>
			<div class="row justify-content-center align-items-center">
			<input class="btn btn-lg btn-success col-sm-2" type="submit" value="Alterar">
			</div>
		</form>
	</body>
</html>