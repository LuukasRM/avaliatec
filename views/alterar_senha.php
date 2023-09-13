<?php

	require_once "cabecalho.php";

	
?>
<div class="content">
	<div class="container">
	

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  
</svg>
<?php
	if($msg != "")
	{
		echo "<div class='row justify-content-center align-items-center'> <div class='alert alert-success d-flex justify-content-center align-items-center' role='alert' style='width:800;'>
		  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
		  <div class='align-items-center'>
		  {$msg}
		  </div>
		</div></div>";
	}
?>
			<br><br><div class="row justify-content-center align-items-center">
      <h1 class="row justify-content-center align-items-center">Trocar a Senha</h1><br>
  </div><br><br>
			</div><br><br>
		<form action="#" method="POST" class="row justify-content-center align-items-center">
			
<div class = "form-group">
	<div class="row justify-content-center align-items-center">
		<label class="col-sm-2 col-form-label col-form-label-lg">Nova Senha:</label>
	<div class="col-sm-4">
		<input type="password" name="senha"  class="form-control form-control-lg" id="usuario" placeholder="Sua senha" required>
	</div>
	</div>
</div>
<?php
		if(array_key_exists("0", $error))
		{
			echo "<div class='form-group col-md-2'></div>";
			echo "<div class='form-group col-md-4' style='font-size:14px;color:red;'>{$error[0]}</div>";
			
		}
?>
<div class="col-sm-12"></div><br>
				<div class = "form-group">
					<div class="row justify-content-center align-items-center">
						<label class="col-sm-2 col-form-label col-form-label-lg">Confirma Senha:</label>
						<div class="col-sm-4">
						<input type="password" name="confirma"  class="form-control form-control-lg" id="confirma" placeholder="Digite novamente a nova senha" required>
						</div>
					</div>
				</div>
	<?php
		if(array_key_exists("1", $error))
		{
			echo "<div class='form-group col-md-2'></div>";
			echo "<div class='form-group col-md-4' style='font-size:14px;color:red;'>{$error[1]}</div>";
			
		}
	?>
				<div class="col-sm-12"></div><br><br>
				<div class="row justify-content-center align-items-center">
					<input type="submit" class = "btn btn-lg btn-success col-sm-2" value = "Enviar">
				</div>
			</div>
		</form>
	</div>
</div>
	
	</body>
</html>