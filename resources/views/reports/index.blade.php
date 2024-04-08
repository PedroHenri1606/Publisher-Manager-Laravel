@extends('layout.template')

@section('title', 'Index')

@section('content')


<div class= "container tabela border-light shadow">
  <div class="container">
      <div class="opcoes text-center mb-4">
          Reports
      </div>

      <div class="row">

        @is('admin')
        <div class="col-4">
          <article class="card card_report shadow pt-2">
              <h3>Publishers: {{ $publishers}}</h3>
          </article>
        </div>

        <div class="col-4 s12 m4">
          <article class="card card_report shadow pt-2">
            <h3>Domains:  {{ $domains}} </h3>
          </article>
        </div>

        <div class="col-4 s12 m4">
          <article class="card card_report shadow pt-2">
            <h3>Active Domains: {{ $activeDomains }}</h3>
          </article>
        </div>
        @endis

        @is('publisher')
        <div class="col-6 s12 m4">
          <article class="card card_report shadow pt-2">
            <h3>Your Domains:  {{ $domains}} </h3>
          </article>
        </div>

        <div class="col-6 s12 m4">
          <article class="card card_report shadow pt-2">
            <h3>Active Domains: {{ $activeDomains }}</h3>
          </article>
        </div>
        @endis

      </div>

      <div class="mt-5 col-10 container">
        <canvas id="myChart"></canvas> {{-- o id="myChart" sera o responsavel por informar ao script onde deve ser renderizado o grafico que leva o nome do id--}}
      </div>
  </div>
</div>

@endsection

@section('script')
  <script>

  //Informa o id que sera responsável pela renderização
    const ctx = document.getElementById('myChart');

  //Informa novo grafico
    new Chart(ctx, {
      type: 'bar', // -> type é o tipo do grafico
      data: { // -> No data, é onde vai ficar armazenado as informaçãoes do gráfico
        labels: [{{ $domainNames}}], // -> labels são os indices do gráfico
        datasets: [{ // -> dentro do datasets, sera armazenado as informações dos dados 
          label: 'Revshare by domain Id', // -> label, sera o nome do dado que o gráfico corresponde
          data: [{{ $revshares }}], // -> data sera onde sera armazenado os dados do grafico 
          borderColor: '#198754', // -> altera a cor da borda do grafico 
          backgroundColor: '#198754', // -> altera a cor do fundo
          color: '#198754', // -> altera a cor da fonte
          borderWidth: 1 // -> borderWidth sera a expessura da linha do grafico 
        }],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection

