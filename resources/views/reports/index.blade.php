@extends('layout.template')

@section('title', 'Index')

@section('content')

@include('layout._partials.navbar')

<script>
    $(document).ready(function() {
        $('#input').on('input', function() {
            var valorInput = $(this).val();

            // Faça a requisição AJAX
            $.ajax({
                url: '{{ route('buscar') }}',
                method: 'POST',
                data: {
                    valor: valorInput,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#resultado').html(response);
                    
                    var resposta = response;
                    console.log(resposta);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<div class= "container tabela border-light shadow">
    <div class="container">
        <div class="opcoes text-center">
            Reports
          
        </div>

        <input type="text" id="input">
        <div id="resultado"></div>
    </div>
</div>

@endsection