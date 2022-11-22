@extends('layouts.app')
@section('title', 'Ver Chapa')


@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-bold fs-4">
      Chapa: {{$chapa->nome_chapa}}
    </span>

    <div class="d-flex w-100 justify-content-end">
      <a href="{{route('chapas_index')}}" class="btn btn-warning fw-bold fs-5 px-5 py-2 me-3">
        Voltar
      </a>
      <a href="{{route('edit_chapa', $chapa->id)}}" class="btn btn-success fw-bold fs-5 px-5 py-2 me-3">
        Editar
        <i class="fa fa-edit ms-1"></i>
      </a>
{{--      <div--}}
{{--        class=" mx-2 justify-content-center align-items-center ">--}}
{{--        <form action="{{route('delete_chapa', $chapa->id)}}" method="post">--}}
{{--          @method('delete')--}}
{{--          @csrf--}}
{{--          <button type="submit" class="btn btn-danger d-flex align-items-center fs-5 px-5 py-2 me-3" value="Delete">--}}
{{--            <span>Deletar</span>--}}
{{--            <i class="fa fa-trash ms-2"></i>--}}
{{--          </button>--}}
{{--        </form>--}}
{{--      </div>--}}

    </div>
  </div>

  <div class="d-flex flex-row flex-wrap  align-items-center w-100 z-2" style="margin-top: 4rem;">
    <div class="text-decoration-none w-100 d-flex flex-row border-none position-relative">
      <div
        class="w-100 mx-2 d-flex  btn-eleicao justify-content-center " style="margin-bottom: 4rem">
        <span class="fw-bold fs-2">Síndico: {{$chapa->nome_sindico}}</span>
        <span class="fw-bolder fs-3">Subsíndico: {{$chapa->nome_subsindico}}</span>
      </div>
    </div>
    <div class=" d-flex flex-column position-relative">
      <span class="fw-bold fs-4">Eleições presentes</span>

      <ul class="list-eleicoes">
        @foreach($chapa->eleicao as $eleicao)
          <li class=" d-flex flex-row border-none position-relative list-eleicao-item">
            <a href="{{route('show_eleicao', $eleicao->id)}}" class="text-decoration-none w-100 d-flex flex-row border-none position-relative">
                >> Eleição {{$eleicao->id}} - <b style="padding-left: 4px">{{$eleicao->ativa ? 'Aberta' : 'Encerrada'}}</b>
            </a>
          </li>
        @endforeach
      </ul>
    </div>

  </div>

@endsection
