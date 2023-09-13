<?php

	require_once "cabecalho.php";
?>
	<div class="row justify-content-center align-items-center">
		<h1 class="row justify-content-center align-items-center">Assunto</h1>
	</div><br><br>
		<form action="#" method="POST" class="row justify-content-center align-items-center">
			<div class="form-group col-md-6">
			<label>Descritivo:</label>
			<input  class="form-control"type="text" name="descritivo" value="<?php if($_POST) echo $_POST['descritivo']?>" required>
			</div>
			<div class="align-items-center" style="color:red;text-align:center;" id="erro"><?php echo $erro;?>
			<br><br>
			<div class="row justify-content-center align-items-center">
			<input class="btn btn-lg btn-success col-sm-2" type="submit" value="Cadastrar">
			</div>
		</form>
	</body>
</html>