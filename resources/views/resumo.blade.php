@extends('layouts.app')

@section('title', 'Voto.com')

@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-semibold fs-4">
      Eleição - {{$eleicao->id}}
    </span>
    @if(!$eleicao->ativa)
      <div class="ganhador w-50 mx-auto mt-3">
        <p class="text-center fw-bold fs-4 text-black ">
          Vencedor: Chapa {{$vencedor->cod_chapa}}
        </p>
        <p class="text-center fw-bold fs-4 text-black">
          {{$vencedor->nome_sindico}} e {{$vencedor->nome_subsindico}}
        </p>
      </div>

    @endif
    <div class="d-flex w-100 justify-content-end">
      <a href="{{route('home')}}" class="btn btn-warning fw-bold fs-5 px-5 py-2 me-3">
        Voltar
      </a>
      @if($eleicao->ativa)
        <a href="{{route('new_voto', $eleicao->id)}}" class="btn btn-success fw-bold fs-5 px-5 py-2">
          Votar
        </a>
      @endif
    </div>
  </div>

  <div class="d-flex flex-row justify-content-sm-evenly align-items-center w-100 z-2" style="margin-top: 4rem;">
    @foreach($eleicao->chapas as $chapa)
      <div class="text-decoration-none w-auto d-flex flex-row border-none position-relative">
        <div
          class="w-100 mx-2 d-flex rounded-2 position-relative btn-eleicao p-2 position-relative justify-content-center ">
          <span class="fw-bold">Chapa: {{$chapa->nome_chapa}}</span>
          <br/>
          <span class="fw-bold fs-5">Síndico: {{$chapa->nome_sindico}}</span>
          <span class="fw-bolder fs-5">Subsíndico: {{$chapa->nome_subsindico}}</span>
          <i class="fa fa-users position-absolute icon-box-eleicao icon-light"></i>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex flex-column mt-5 ">
    <h1 class="text-center fw-bold w-100">Votos</h1>
    <div class="d-flex flex-row justify-content-sm-evenly w-100">
      @foreach($eleicao->chapas as $chapa)
        <div>
          <div class="d-flex flex-row justify-content-center align-items-center">
            <span class="fw-bold fs-5 ms-3">Total de votos: {{count($chapa->votos)}}</span>
            <span class="fw-bold fs-5 ms-3">Porcentagem: {{$chapa->percentual}}</span>
          </div>
          <br/>
          @foreach($chapa->votos as $voto)
            <div class="d-flex flex-row justify-content-center align-items-center">
              <span class="fw-semibold fs-5 ms-3">Bloco: {{$voto->bloco}}</span>
              <span class="fw-semibold fs-5 ms-3">Apartamento: {{$voto->apartamento}}</span>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
@endsection
