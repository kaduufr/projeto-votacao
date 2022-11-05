@extends('layouts.app')
@section('title', 'Nova Votação')

@section('content')
  <h1 class="text-center fw-bold">Nova votação</h1>

  <div class="bg-warning-box p-4 rounded-4 mb-4">
    <p class="fw-bold">Para cadastrar uma nova votação é necessario ter os seguintes dados abaixo:</p>

    <ul class="fw-semibold">
      <li>Nome da Chapa</li>
      <li>Codigo do Chapa</li>
      <li>Nome do Sindico</li>
      <li>CPF do Sindico</li>
      <li>Nome do Subsindico</li>
      <li>CPF do Subsindico</li>
    </ul>
  </div>

  <form method="POST" action="{{route('create_poll')}}">
    @csrf
    <div>
      <h2>Dados da Chapa</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <label class="input-group-text" for="nomeChapa">Nome</label>
          <input type="text" class="form-control" id="nomeChapa" name="nome_chapa" placeholder="Nome da Chapa">
        </div>
        <div class="input-group mb-3">
          <laBel class="input-group-text" for="codigoChapa">Codigo</laBel>
          <input type="text" id="codigoChapa" class="form-control" name="cod_chapa" placeholder="Codigo da chapa">
        </div>
      </div>
    </div>
    <div>
      <h2>Dados do Sindico</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <label class="input-group-text" for="nomeSindico">Nome</label>
          <input type="text" class="form-control" id="nomeSindico" name="nome_sindico" placeholder="Nome do sindico">
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="cpfSindico">CPF</label>
          <input type="text" class="form-control" placeholder="CPF do sindico" name="cpf_sindico" id="cpfSindico">
        </div>
      </div>
    </div>
    <div>
      <h2>Dados do Subsindico</h2>
      <div class="d-flex flex-column flex-md-row gap-3">
        <div class="input-group mb-3">
          <label class="input-group-text" for="nomeSubsindico">Nome</label>
          <input type="text" class="form-control" id="nomeSubsindico" name="nome_subsindico" placeholder="Nome do subsindico">
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="cpfSubsindico">CPF</label>
          <input type="text" id="cpfSubsindico" class="form-control" name="cpf_subsindico" placeholder="Nome do subsindico">
        </div>
      </div>
    </div>
    <div class="text-center pt-5">
      <button type="submit" class="btn btn-outline-success w-25 p-2 fs-5" id="btnSubmit">Cadastrar</button>
    </div>
  </form>

@endsection

@stack('scripts')
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const cpfSindico = document.getElementById('cpfSindico')
    const cpfSubsindico = document.getElementById('cpfSubsindico')
    const btnSubmit = document.getElementById('btnSubmit')
    const nomeChapa = document.getElementById('nomeChapa')
    const codigoChapa = document.getElementById('codigoChapa')
    const nomeSindico = document.getElementById('nomeSindico')
    const nomeSubsindico = document.getElementById('nomeSubsindico')

    const maskCPF = (cpf) => {
      return cpf
        .replace(/\D/g, '')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})/, '$1-$2')
        .replace(/(-\d{2})\d+?$/, '$1')
    }

    btnSubmit.disabled = true

    let cpfSindicoValido = false
    let cpfSubsindicoValido = false


    const regex = /^\d{3}?\.\d{3}?\.\d{3}?-\d{2}$/
    cpfSindico.addEventListener('input', (e) => {
      const value = e.target.value
      const valorLimpo = value.replace(/\D/g, '')
      const valorFormatado = maskCPF(value)
      if (valorLimpo.length >= 11) {
        cpfSindico.value = valorFormatado
      }
      e.target.value = valorFormatado
      cpfSindicoValido = valorFormatado.length === 14 && regex.test(valorFormatado);
    })

    cpfSubsindico.addEventListener('input', (e) => {
      const value = e.target.value
      const valorLimpo = value.replace(/\D/g, '')
      const valorFormatado = maskCPF(value)
      if (valorLimpo.length >= 11) {
        cpfSubsindico.value = valorFormatado
      }
      e.target.value = valorFormatado
      cpfSubsindicoValido = valorFormatado.length === 14 && regex.test(valorFormatado);
    })


    function validaCampos() {
      btnSubmit.disabled = !(nomeChapa.value.length > 0 && codigoChapa.value.length > 0 && nomeSindico.value.length > 0 && nomeSubsindico.value.length > 0 && cpfSindicoValido && cpfSubsindicoValido);
    }

    nomeChapa.addEventListener('input', validaCampos)
    codigoChapa.addEventListener('input', validaCampos)
    nomeSindico.addEventListener('input', validaCampos)
    cpfSindico.addEventListener('input', validaCampos)
    nomeSubsindico.addEventListener('input', validaCampos)
    cpfSubsindico.addEventListener('input', validaCampos)

  })
</script>
