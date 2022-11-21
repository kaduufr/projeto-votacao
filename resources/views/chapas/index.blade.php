@extends('layouts.app')
@section('title', 'Editar Chapa')

@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-semibold fs-4">
      Chapas
    </span>

    <div class="d-flex w-100 justify-content-end">
      <a href="{{route('home')}}" class="btn btn-warning fw-bold fs-5 px-5 py-2 me-3">
        Voltar
      </a>

    </div>
  </div>

  <div class="d-flex flex-row flex-wrap  align-items-center w-100 z-2" style="margin-top: 4rem;">
    <ul class="w-100">
      @foreach($chapas as $chapa)
        <li class="pa-list-item w-100">
          <div class="text-decoration-none w-100 d-flex flex-row border-none position-relative">
            <div
              class="w-100 mx-2 d-flex rounded-2 position-relative btn-eleicao p-2 position-relative justify-content-center ">
              <span class="fw-bold">Chapa: {{$chapa->nome_chapa}}</span>
              <span class="fw-bold fs-5">Síndico: {{$chapa->nome_sindico}}</span>
              <span class="fw-bolder fs-5">Subsíndico: {{$chapa->nome_subsindico}}</span>
            </div>
          </div>
          <div class="text-decoration-none  d-flex flex-row border-none position-relative">
            <div
              class=" mx-2 d-flex flex-row p-2 justify-content-center align-items-center gap-3 ">
              <a class="btn btn-success d-flex align-items-center" href="{{route('show_chapa', $chapa->id)}}">
                <span>
                  Ver
                </span>
                <i class="fa fa-eye ms-2"></i>
              </a>
                <form action="{{route('delete_chapa', $chapa->id)}}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger d-flex align-items-center" value="Delete">
                    <span>Deletar</span>
                    <i class="fa fa-trash ms-2"></i>
                  </button>
                </form>
            </div>
          </div>
        </li>
      @endforeach
    </ul>

  </div>


@endsection
