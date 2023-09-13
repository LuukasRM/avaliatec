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
	if(isset($_GET["msg"]))
	{
		echo "<div class='row justify-content-center align-items-center'> <div class='alert alert-success d-flex justify-content-center align-items-center' role='alert' style='width:800;'>
		  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
		  <div class='align-items-center'>
		  {$_GET['msg']}
		  </div>
		</div></div>";
	}
?>
		<h1>Sugestões</h1>
		<br>
		<a class="btn btn-danger" href="index.php?controle=sugestaoController&metodo=excluir_todas" onclick="return confirm('Confirma a Exclusão?')">Excluir Todas Sugestões</a>&nbsp; &nbsp; &nbsp;
		
		<a class="btn btn-warning" href="index.php?controle=sugestaoController&metodo=lida_todas">Marcar Todas Sugestões como lida</a><br><br>
		<table class="table table-striped" id="tabprod">
			<tr>
				<th>Data</th>
				<th>Curso</th>
				<th>Assunto</th>
				<th>Sugestão</th>
				<th>Ações</th>
			</tr>
			
				<?php

					if(is_array($retorno))
					{
						foreach($retorno as $dados)
						{
							$data = date("d/m/Y", strtotime($dados->data_sugestao));
							
							echo "<tr>";
							
							echo "<td>{$data}</td>";
							echo "<td>{$dados->nome}</td>";
							echo "<td>{$dados->descritivo}</td>";
							echo "<td>{$dados->descricao}</td>";
							echo "<td>";
							?>
							
							<?php

							echo "<a class='btn btn-danger' href='index.php?controle=sugestaoController&metodo=excluir_sugestao&id={$dados->idsugestao}'>Excluir</a>&nbsp;&nbsp";
							echo "<a class='btn btn-warning' href='index.php?controle=sugestaoController&metodo=lida_sugestao&id={$dados->idsugestao}'> Lida</a>&nbsp;&nbsp;";
							
												
							echo "</td></tr>";
						}
					}
				?>
		</table>
		<script type="text/javascript" src="../lib/jquery-latest.js"></script>	
		<script type="text/javascript" src="../lib/jquery.quicksearch.js"></script>	
		<script type="text/javascript" id="js">
		$(document).ready(function()
		{ 
				$("#tabprod tbody tr").quicksearch({
				labelText: 'Pesquisar: ',
				attached: '#tabprod',
				position: 'before',
				delay: 100,
				loaderText: 'Loading...',
				onAfter: function() {
					if ($("#tabprod tbody tr:visible").length != 0) {
						$("#tabprod").trigger("update");
						$("#tabprod").trigger("appendCache");
						$("#tabprod tfoot tr").hide();
					}
					
				}
			});
		});
	  </script>
		
<?php
	require_once "rodape.html";
?>