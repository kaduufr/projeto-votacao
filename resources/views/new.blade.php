@extends('layouts.app')
@section('title', 'Nova Votação')

@section('content')
  <div class="overflow-visible">
    <h1 class="text-center fw-bold">Nova eleição</h1>

    <div class="bg-warning-box p-4 rounded-4 mb-4">
      <p class="fw-bold text-black">Para cadastrar uma nova votação é necessario informar os dados de cada chapa:</p>

      <ul class="fw-semibold">
        <li>Nome da Chapa</li>
        <li>Codigo do Chapa</li>
        <li>Nome do Sindico</li>
        <li>CPF do Sindico</li>
        <li>Nome do Subsindico</li>
        <li>CPF do Subsindico</li>
      </ul>

      <span
        class="text-black">Obs: Você pode selecionar chapas de outras eleições como tambem adicionar quantas quiser.</span>
    </div>

    <form method="POST" action="{{route('create_eleicao')}}">
      @csrf

      @if(count($chapas)> 0)
        <div class="mb-4">
          <h3>Chapas Anteriores</h3>
          <span>Você pode selecionar quantas chapas forem participar</span>
          <div>
            @foreach($chapas as $chapa)
              <div class="d-flex flex-row  align-items-center">
                <input type="checkbox" name="chapas[]" value="{{$chapa->id}}"
                       aria-label="Chapa {{$chapa->nome_chapa}}"/>
                <span class="fw-bold fs-5 ms-3">Chapa: {{$chapa->nome_chapa}}</span>
                <span class="fw-bold fs-5 ms-3">Sindico: {{$chapa->nome_sindico}}</span>
                <span class="fw-bold fs-5 ms-3">Subsindico: {{$chapa->nome_subsindico}}</span>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      <div class="d-flex flex-row gap-4">
        <button type="button" class="btn btn-success d-flex flex-row justify-content-center align-items-center mb-3"
                id="btnAdicionarChapa">
          <span>Adicionar Chapa</span>
          <i class="fa fa-plus fs-5 ms-1 "></i>
        </button>
      </div>

      <div id="chapas">

      </div>


      <div class="text-center pt-5">
        <button type="submit" class="btn btn-success w-25 p-2 fs-5" id="btnSubmit">Cadastrar</button>
      </div>
    </form>
  </div>
@endsection

@stack('scripts')
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const btnSubmit = document.getElementById('btnSubmit')


    const btnAdicionarChapa = document.getElementById('btnAdicionarChapa')
    const chapas = document.getElementById('chapas')

    const inputs = document.getElementsByTagName('input')

    const checkbox = Array.from(inputs).filter(input => input.type === 'checkbox')

    checkbox.forEach(input => {
      input.addEventListener('change', () => {
        validaCampos()
      })
    })

    btnSubmit.disabled = true

    const maskCPF = (cpf) => {
      return cpf
        .replace(/\D/g, '')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})/, '$1-$2')
        .replace(/(-\d{2})\d+?$/, '$1')
    }


    let count = 0

    btnAdicionarChapa.addEventListener('click', function () {
      btnSubmit.disabled = true

      const novoGroupInputs = document.createElement('div')

      novoGroupInputs.innerHTML = `
      <div id="chapa" class="mb-3">
        <div>
          <h2>Dados da Chapa</h2>
          <div class="d-flex flex-column flex-md-row gap-3">
            <div class="input-group mb-3">
              <label class="input-group-text" for="nomeChapa${count}">Nome</label>
              <input type="text" class="form-control" id="nomeChapa${count}" name="nome_chapa[]" placeholder="Nome da Chapa">
            </div>
            <div class="input-group mb-3">
              <laBel class="input-group-text" for="codigoChapa${count}">Codigo</laBel>
              <input type="text" id="codigoChapa${count}" class="form-control" name="cod_chapa[]" placeholder="Codigo da chapa">
            </div>
          </div>
        </div>
        <div>
          <h2>Dados do Sindico</h2>
          <div class="d-flex flex-column flex-md-row gap-3">
            <div class="input-group mb-3">
              <label class="input-group-text" for="nomeSindico${count}">Nome</label>
              <input type="text" class="form-control" id="nomeSindico${count}" name="nome_sindico[]" placeholder="Nome do sindico">
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="cpfSindico${count}">CPF</label>
              <input type="text" class="form-control" placeholder="CPF do sindico" name="cpf_sindico[]" id="cpfSindico${count}">
            </div>
          </div>
        </div>
        <div>
          <h2>Dados do Subsindico</h2>
          <div class="d-flex flex-column flex-md-row gap-3">
            <div class="input-group mb-3">
              <label class="input-group-text" for="nomeSubsindico${count}">Nome</label>
              <input type="text" class="form-control" id="nomeSubsindico${count}" name="nome_subsindico[]" placeholder="Nome do subsindico">
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="cpfSubsindico${count}">CPF</label>
              <input type="text" id="cpfSubsindico${count}" class="form-control" name="cpf_subsindico[]" placeholder="Nome do subsindico">
            </div>
          </div>
        </div>

       </div>
      `

      chapas.appendChild(novoGroupInputs)

      const cpfSindico = document.getElementById('cpfSindico' + count)
      const cpfSubsindico = document.getElementById('cpfSubsindico' + count)
      const nomeChapa = document.getElementById('nomeChapa' + count)
      const codigoChapa = document.getElementById('codigoChapa' + count)
      const nomeSindico = document.getElementById('nomeSindico' + count)
      const nomeSubsindico = document.getElementById('nomeSubsindico' + count)

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

      nomeChapa.addEventListener('input', validaCampos)
      codigoChapa.addEventListener('input', validaCampos)
      nomeSindico.addEventListener('input', validaCampos)
      cpfSindico.addEventListener('input', validaCampos)
      nomeSubsindico.addEventListener('input', validaCampos)
      cpfSubsindico.addEventListener('input', validaCampos)

      // const btnRemoverChapa = document.getElementById(`btnRemoverChapa${count}`)
      // btnRemoverChapa.addEventListener('click', function () {
      //   const chapa = document.getElementById('chapa')
      //   chapa.parentNode.removeChild(btnRemoverChapa)
      // })

      count++
    })

    function checkboxChecked() {
      let values = []
      checkbox.forEach((item) => {
        if (item.checked) {
          values.push(item.value)
        }
      })
      return values.includes(true)
    }

    function validaCampos() {
      Array.from(inputs).forEach((input) => {
        btnSubmit.disabled = !(input.value !== '' || !checkboxChecked()) ;
      })
    }

  })
</script>
