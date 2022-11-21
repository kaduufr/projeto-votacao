@extends('layouts.app')
@section('title', 'Editar Chapa')

@section('content')
  <div class="w-100 text-center">
    <h1 class="text-center fw-bold">Voto.com</h1>
    <span class="text-center fw-semibold fs-2">
      Editar Chapa - {{$chapa->nome_chapa}}
    </span>

    <div class="d-flex w-100 justify-content-end">
      <a href="{{route('show_chapa', $chapa->id)}}" class="btn btn-warning fw-bold fs-5 px-5 py-2 me-3">
        Voltar
      </a>

    </div>
  </div>

  <div class="d-flex flex-row flex-wrap  align-items-center w-100 z-2" style="margin-top: 4rem;">
{{--    <div class="text-decoration-none w-100 d-flex flex-row border-none position-relative">--}}
{{--      <div--}}
{{--        class="w-100 mx-2 d-flex  btn-eleicao justify-content-center ">--}}
{{--        <span class="fw-bold fs-2">Síndico: {{$chapa->nome_sindico}}</span>--}}
{{--        <span class="fw-bolder fs-3">Subsíndico: {{$chapa->nome_subsindico}}</span>--}}
{{--      </div>--}}
{{--    </div>--}}
    <div class="w-100">
      <form action="{{route('update_chapa')}}" method="post">
        @method('put')
        @csrf
        <input type="hidden" value="{{$chapa->id}}" name="id">
        <div id="chapa" class="mb-3">
          <div>
            <h2>Dados da Chapa</h2>
            <div class="d-flex flex-column flex-md-row gap-3">
              <div class="input-group mb-3">
                <label class="input-group-text" for="nomeChapa">Nome</label>
                <input type="text" class="form-control" id="nomeChapa" name="nome_chapa" placeholder="Nome da Chapa"
                       value="{{$chapa->nome_chapa}}">
              </div>
              <div class="input-group mb-3">
                <laBel class="input-group-text" for="codigoChapa">Codigo</laBel>
                <input value="{{$chapa->cod_chapa}}"
                  type="text" id="codigoChapa" class="form-control" name="cod_chapa" placeholder="Codigo da chapa">
              </div>
            </div>
          </div>
          <div>
            <h2>Dados do Sindico</h2>
            <div class="d-flex flex-column flex-md-row gap-3">
              <div class="input-group mb-3">
                <label class="input-group-text" for="nomeSindico">Nome</label>
                <input type="text" class="form-control"
                       value="{{$chapa->nome_sindico}}"
                       id="nomeSindico" name="nome_sindico" placeholder="Nome do sindico">
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="cpfSindico">CPF</label>
                <input type="text" class="form-control"
                       value="{{$chapa->cpf_sindico}}"
                       placeholder="CPF do sindico" name="cpf_sindico" id="cpfSindico">
              </div>
            </div>
          </div>
          <div>
            <h2>Dados do Subsindico</h2>
            <div class="d-flex flex-column flex-md-row gap-3">
              <div class="input-group mb-3">
                <label class="input-group-text" for="nomeSubsindico">Nome</label>
                <input type="text" class="form-control"
                       value="{{$chapa->nome_subsindico}}"
                       id="nomeSubsindico" name="nome_subsindico" placeholder="Nome do subsindico">
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="cpfSubsindico">CPF</label>
                <input type="text" id="cpfSubsindico"
                       value="{{$chapa->cpf_subsindico}}"
                       class="form-control" name="cpf_subsindico" placeholder="Nome do subsindico">
              </div>
            </div>
          </div>

          <div class="w-100 text-center mt-4">
            <button type="submit" class="btn btn-primary w-50 fs-4">Atualizar</button>
          </div>

        </div>
      </form>
    </div>

  </div>


@endsection
