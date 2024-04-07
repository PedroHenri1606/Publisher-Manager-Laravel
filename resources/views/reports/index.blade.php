@extends('layout.template')

@section('title', 'Index')

@section('content')


<div class= "container tabela border-light shadow">
    <div class="container">
        <div class="opcoes text-center">
            Reports
        </div>
         <div>
          <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

@endsection

@section('script')
  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
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

