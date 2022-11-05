@extends('layouts.app')
@section('title', 'Nova Votação')

@section('content')
  <h1 class="text-center fw-bold">Nova votação</h1>

  <div>
    <p>Para cadastrar uma nova votação é necessario ter os seguintes dados abaixo:</p>

    <ul>
      <li>Nome da Chapa</li>
      <li>Codigo do Chapa</li>
      <li>Nome do Sindico</li>
      <li>CPF do Sindico</li>
      <li>Nome do Subsindico</li>
      <li>CPF do Subsindico</li>
    </ul>
  </div>

  <form>
    <div>
      <h2>Dados da Chapa</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
    </div>
    <div>
      <h2>Dados do Sindico</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
    </div>
    <div>
      <h2>Dados do Subsindico</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
    </div>
  </form>

@endsection
