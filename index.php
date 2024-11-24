  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

  <body class="bg-light">
    <main class="mb-4">
      <header class="py-3 mb-4 border-bottom bg-white sticky-top">
        <div class="container d-flex flex-wrap justify-content-center text-center px-4">
          <h3>PLATAFORMA DE MONITORAMENTO DE GRANDEZAS ELÉTRICAS DE UM PAINEL FOTOVOLTAICO COM CONTROLE MPPT</h3>
          <p class="text-small m-0">Última Atualização: <span id="data-atualizacao">-</span></p>
        </div>
          <form>
<input class="demobutton" type="button" value="Banco de Dados" onclick="window.location.href='http://10.0.0.220/mpptSolar/exportar.php'"/>
</form>
      </header>

        <div class="row d-flex justify-content-md-center align-items-stretch g-4">
          <div class="col-md-16">
            <div class="card card-hover-shadow h-100">
              <div class="card-header text-center">
                Corrente
              </div>
              <div class="card-body">
                <div id="grafico-corrente"></div>
              </div>
            </div>
          </div>
		   </div>
		 <br>
		  
		  <div class="row d-flex justify-content-md-center align-items-stretch g-4">
          <div class="col-md-16">
            <div class="card card-hover-shadow h-100">
              <div class="card-header text-center">
                Tensão
              </div>
              <div class="card-body">
                <div id="grafico-tensao"></div>
              </div>
            </div>
          </div>
		   </div>
		<br>
		  
		  <div class="row d-flex justify-content-md-center align-items-stretch g-4">
          <div class="col-md-16">
            <div class="card card-hover-shadow h-100">
              <div class="card-header text-center">
                Potência
              </div>
              <div class="card-body">
                <div id="grafico-potencia"></div>
              </div>
            </div>
          </div>
		   </div>
		<br>
			
		<div class="row d-flex justify-content-md-center align-items-stretch g-4">
          <div class="col-md-16">
            <div class="card card-hover-shadow h-100">
              <div class="card-header text-center">
                Passo
              </div>
              <div class="card-body">
                <div id="grafico-passo"></div>
              </div>
            </div>
          </div>
          </div> 
		  
        <br>
		
	       <div class="academics text-center">
				<p>Acadêmicos: Matheus Volkmann, Nicolas Burigo Echer</p>
			</div>   
                
    </main>
    <script src="/mpptSolar/graficos1.js"></script>
  </body>

  </html>