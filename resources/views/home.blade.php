@extends('layouts.app')

@section('title', 'Voto.com')

@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-semibold fs-4">Sistema de votação de sindico para o condiminio</span>
  </div>

  <div class="d-flex flex-md-row flex-column">
    <div class=" flex flex-grow-1 min-vh-90 pe-4">
      <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-semibold fs-2 ms-4">Eleições</p>
        <a href="{{route('new_eleicao')}}" class="btn btn-danger d-flex flex-row align-items-center">
          <i class="fa fa-plus fs-4 ms-1 me-2"></i>
          <span class="fs-5">Nova Eleição</span>
        </a>
      </div>
      <ul>
        @foreach ($eleicoes as $eleicao)
          <div class="d-flex mb-4 flex-column justify-content-between position-relative align-items-center box-borded btn-with-hover">
            <i class="fa fa-users position-absolute icon-box-eleicao"></i>
            <p class="fw-bold fs-3 mb-3 z-2">Eleição: {{$eleicao->id}}</p>
            <div class="d-flex flex-row justify-content-sm-around align-items-center w-100 z-2 ">
              @foreach($eleicao->chapas as $chapa)
                <a href="{{route('show_eleicao', $eleicao->id)}}" class="text-decoration-none w-auto d-flex flex-row border-none position-relative">
                  <div class="w-100 mx-2 d-flex rounded-2 position-relative btn-eleicao p-2">
                    <span class="fw-bold">Chapa: {{$chapa->nome_chapa}}</span>
                    <br/>
                    <span class="fw-semibold" style="font-size: 20px;">Síndico: {{$chapa->nome_sindico}}</span>
                    <span class="fw-semibold" style="font-size: 20px;">Subsíndico: {{$chapa->nome_subsindico}}</span>
                  </div>
                </a>
              @endforeach
            </div>
            <div class="d-flex flex-row gap-2 pt-4 z-2">
              @if($eleicao->ativa == true)
                <a href="{{route('new_voto', $eleicao->id)}}" class="btn btn-success fw-bold fs-5">
                  Votar
                </a>
              @endif
              <a href="{{route('show_eleicao', $eleicao->id)}}" class="btn btn-warning fw-bold fs-5">
                Acessar eleição
              </a>

            </div>
          </div>
        @endforeach
      </ul>
    </div>

  </div>

@endsection
