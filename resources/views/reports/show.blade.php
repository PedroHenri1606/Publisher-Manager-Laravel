@extends('layout.template')

@section('title', 'Show Report')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Domain Revenue
        </div>

        <form>
            <fieldset disabled>
                <div class="row mt-4 card shadow ">

                    <div class="row mb-2 mt-2">
                        <label for="name" class="col-2 dado">Domain:</label>
                        <div class="col-4">
                            <input type="text" value="{{ $domain->domain ?? old('name')}}" name="domain" class="form-control " placeholder="Domain">
                        </div>

                        <label for="publisher_id" class="col-2 dado">Publisher:</label>
                        <div class="col-4">
                            <select class="form-select" name="publisher_id">
                                <option> {{ $domain->publisher->name}} </option>                        
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label for="name" class="col-2 dado">Revshare:</label>
                        <div class="col">
                            <input type="text" value="{{ $domain->revshare ?? old('revshare')}}" name="revshare" class="form-control " placeholder="Revshare">
                        </div>

                        <label for="nome" class="col-2 dado">Status:</label>
                        <div class="col">
                            <select class="form-select">
                                <option value="{{ $domain->status}}"> 
                                    @if($domain->status === 1)
                                        Active
                                    @else
                                        Disactive
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

        <div class="row card shadow mt-2">
            <div class="row mt-2">
                <div class="col-6">
                    <article class="card card_report shadow pt-2">
                        <h3>Impressions: {{ $revenueDomain->impressions}} </h3>
                    </article>
                </div>

                <div class="col-6">
                    <article class="card card_report shadow pt-2">
                        <h3>Revenue: ${{ $revenueDomain->revenue }}</h3>
                    </article>
                </div>
            </div>

            <div class="row mt-2 mb-2">
                <div class="col-6">
                    <article class="card card_report shadow pt-2">
                        <h3>CPM: ${{ $revenueDomain->cpm }} </h3>
                    </article>
                </div>


                <div class="col-6">
                    <article class="card card_report shadow pt-2">
                        <h3>RPM: ${{ $revenueDomain->rpm }}</h3>
                    </article>
                </div>
            </div>
        </div>

        <div class="row shadow justify-content-center mt-2">
            <div class=" card col-6">
                <canvas id="myChart2"></canvas> {{-- o id="myChart" sera o responsavel por informar ao script onde deve ser renderizado o grafico que leva o nome do id--}}
            </div>
            <div class=" card col-6">
                <canvas id="myChart1"></canvas> {{-- o id="myChart" sera o responsavel por informar ao script onde deve ser renderizado o grafico que leva o nome do id--}}
            </div>
        </div>

        <div class="container text-center mt-5">
            <a class="btn btn-outline-success" href="{{ route('reports.index')}}" role="button">Return</a>
        </div>

    </div>
</div>

@endsection

@section('script')
  <script>

  //Informa o id que sera responsável pela renderização
    const ctx1 = document.getElementById('myChart1');

  //Informa novo grafico
    new Chart(ctx1, {
      type: 'bar', // -> type é o tipo do grafico
      data: { // -> No data, é onde vai ficar armazenado as informaçãoes do gráfico
        labels: ['January ','February ','March ','April','May'], // -> labels são os indices do gráfico
        datasets: [{ // -> dentro do datasets, sera armazenado as informações dos dados 
          label: 'Revenue History', // -> label, sera o nome do dado que o gráfico corresponde
          data: [1,2,3,4,5], // -> data sera onde sera armazenado os dados do grafico 
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

<script>
   //Informa o id que sera responsável pela renderização
    const ctx2 = document.getElementById('myChart2');

  //Informa novo grafico
    new Chart(ctx2, {
      type: 'line', // -> type é o tipo do grafico
      data: { // -> No data, é onde vai ficar armazenado as informaçãoes do gráfico
        labels: ['January ','February ','March ','April','May'], // -> labels são os indices do gráfico
        datasets: [{ // -> dentro do datasets, sera armazenado as informações dos dados 
          label: 'CPM History', // -> label, sera o nome do dado que o gráfico corresponde
          data: [10,2,31,42,5], // -> data sera onde sera armazenado os dados do grafico 
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