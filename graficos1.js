const corVerde = '#55BF3B';
const corAmarelo = '#DDDF0D';
const corVermelho = '#DF5353';
const corCinza = '#CDCDCD';

let graficoLinhaOpcoes = {
  title: null,
  credits: {
    enabled: false
  },
  xAxis: [{
    labels:{
      enabled: false
    }
  }],

  legend: {
    align: 'left',
    verticalAlign: 'top',
    borderWidth: 0
  },

  tooltip: {
    shared: true,
    crosshairs: true
  },

  plotOptions: {
    series: {
      cursor: 'pointer',
      className: 'popup-on-click',
      marker: {
        lineWidth: 1
      }
    }
  },
}

let graficoCorrente = Highcharts.chart('grafico-corrente', {
  ...graficoLinhaOpcoes,
  yAxis: [{
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 0,
      y: 10,
      format: '{value:.,0f} mA'
    },
	min: 0,
    max: 3500,
    minPadding: 0,
    maxPadding: 0,
    title: null,
    tickInterval: 500,
    showFirstLabel: false
  }],
  series: [{
    name: 'Corrente',
    lineWidth: 4,
    marker: {
      radius: 4
    },
    tooltip: {
      headerFormat: '',
      valueSuffix: ' mA'
    }
  }]
});

let graficoTensao = Highcharts.chart('grafico-tensao', {
  ...graficoLinhaOpcoes,
  yAxis: [{
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 0,
      y: 10,
      format: '{value:.,0f} V'
    },
	min: 0,
    max: 35,
    minPadding: 0,
    maxPadding: 0,
    title: null,
    tickInterval: 5,
    showFirstLabel: false
  }],
  series: [{
    name: 'Tensao',
    lineWidth: 4,
    marker: {
      radius: 4
    },
    tooltip: {
      headerFormat: '',
      valueSuffix: ' '
    }
  }]
});

let graficoPotencia = Highcharts.chart('grafico-potencia', {
  ...graficoLinhaOpcoes,
  yAxis: [{
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 0,
      y: 10,
      format: '{value:.,0f} W'
    },
	min: 0,
    max: 110,
    minPadding: 0,
    maxPadding: 0,
    title: null,
    tickInterval: 10,
    showFirstLabel: false
  }],
  series: [{
    name: 'Potência',
    lineWidth: 4,
    marker: {
      radius: 4
    },
    tooltip: {
      headerFormat: '',
      valueSuffix: ' W'
    }
  }]
});

let graficoPasso = Highcharts.chart('grafico-passo', {
  ...graficoLinhaOpcoes,
  yAxis: [{
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 0,
      y: 10,
      format: '{value:.,0f} '
    },
    min: 0,
    max: 30,
    minPadding: 0,
    maxPadding: 0,
    title: null,
    tickInterval: 5,
    showFirstLabel: false
  }],
  series: [{
    name: 'Passo',
    lineWidth: 4,
    marker: {
      radius: 4
    },
    tooltip: {
      headerFormat: '',
      valueSuffix: ' '
    }
  }]
});


function pegarDados() {
  fetch('/mpptSolar/dados1.php?limit=50')
  .then((response) => response.json())
  .then((data) => {
    graficoCorrente.series[0].setData(data.corrente.map(dado => (+dado.corrente)));
    graficoTensao.series[0].setData(data.tensao.map(dado => (+dado.tensao)));
    graficoPotencia.series[0].setData(data.potencia.map(dado => (+dado.potencia)));
	graficoPasso.series[0].setData(data.passo.map(dado => (+dado.passo)));
    document.getElementById('data-atualizacao').innerHTML = data.ultimaAtualizacao;
    setTimeout(pegarDados, 5 * 1000);
  });
}

pegarDados();