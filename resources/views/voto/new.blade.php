@extends('layouts.app')
@section('title', 'Nova Votação')

@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-semibold fs-4">
      Eleição - {{$eleicao->id}}
    </span>
  </div>

  <div class="bg-warning-box p-4 rounded-4 mb-4 w-75 mx-auto mt-4">
    <p class="fw-bold">Para votar é necessario possuir os seguintes dados:</p>

    <ul class="fw-semibold">
      <li>Numero do apartamento</li>
      <li>Bloco do condominio</li>
    </ul>

  </div>

  <div>
    <form action="{{route('create_voto', $eleicao->id)}}" method="POST">
      @csrf
      <div class="w-75 mx-auto">
        <h2>Dados do Condomino</h2>
        <div class="d-flex flex-column gap-3">
          <div class="input-group mb-3">
            <label class="input-group-text" for="apartamento">Numero do apartamento</label>
            <input type="text" class="form-control" id="apartamento" name="apartamento" placeholder="Ex: 103">
          </div>
          <div class="input-group mb-3">
            <laBel class="input-group-text" for="bloco">Numero do bloco</laBel>
            <input type="text" id="bloco" class="form-control" name="bloco" placeholder="Ex: 4">
          </div>
        </div>
      </div>
      <input type="hidden" value="{{$eleicao->id}}" name="eleicao">
      <div class="d-flex flex-column w-100">
        <p class="flex-grow-1 text-center fw-bolder fs-5">Selecione a chapa</p>
        <div class="d-flex flex-row justify-content-sm-evenly align-items-center w-100 z-2" >
          @foreach($eleicao->chapas as $chapa)
            <div class="d-flex flex-column">
              <input type="radio" id="chapa-{{$chapa->id}}" name="chapa" value="{{$chapa->id}}"/>
              <label for="chapa-{{$chapa->id}}"
                     class="text-decoration-none w-auto d-flex flex-row border-none position-relative">
                <div
                  class="w-100 mx-2 d-flex rounded-2 position-relative btn-eleicao p-2 position-relative justify-content-center ">
                  <span class="fw-bold">Chapa: {{$chapa->nome_chapa}}</span>
                  <br/>
                  <span class="fw-bold fs-5">Síndico: {{$chapa->nome_sindico}}</span>
                  <span class="fw-bolder fs-5">Subsíndico: {{$chapa->nome_subsindico}}</span>
                  <i class="fa fa-users position-absolute icon-box-eleicao icon-light"></i>
                </div>
              </label>
            </div>
          @endforeach
        </div>
      </div>
      <div class="text-center" style="margin-top: 8rem;">
        <button type="submit" class="btn btn-success w-25 p-2 fs-5" id="btnSubmit">Votar</button>
      </div>
    </form>
  </div>


@endsection

@stack('scripts')
<script>
  window.addEventListener('load', () => {
    const btnSubmit = document.getElementById('btnSubmit');
    const apartamento = document.getElementById('apartamento');
    const bloco = document.getElementById('bloco');
    let chapas = document.getElementsByName('chapa');

    chapas = Array.from(chapas);
    btnSubmit.disabled = true

    apartamento.addEventListener('input', () => {
      btnSubmit.disabled = !(apartamento.value.length > 0 && bloco.value.length > 0 && chapas.some(chapa => chapa.checked));
    })
    bloco.addEventListener('input', () => {
      btnSubmit.disabled = !(apartamento.value.length > 0 && bloco.value.length > 0 && chapas.some(chapa => chapa.checked) );
    })

    chapas.forEach(chapa => {
      chapa.addEventListener('change', () => {
        btnSubmit.disabled = !(apartamento.value.length > 0 && bloco.value.length > 0 && chapas.some(chapa => chapa.checked));
      })
    })

    btnSubmit.addEventListener('click', (e) => {
      if (apartamento.value === '' || bloco.value === '' || chapa.value === '') {
        e.preventDefault();
        alert('Preencha todos os campos');
      }
    })
  })
</script>
