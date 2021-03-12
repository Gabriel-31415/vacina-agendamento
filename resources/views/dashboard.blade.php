<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Horário</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidatos as $candidato)
                        <tr>
                            <td>{{$candidato->nome_completo}}</td>
                            <td>{{$candidato->cpf}}</td>
                            <td>-- Dia --</td>
                            <td>-- Horário --</td>
                            <td data-bs-toggle="modal" data-bs-target="#visualizar_candidato_{{$candidato->id}}">
                                <a href="#"><img src="{{asset('img/icons/eye-regular.svg')}}" alt="Visualizar" width="25px;"></a>
                               
                            </td>
                             <!-- Modal -->
                             <div class="modal fade" id="visualizar_candidato_{{$candidato->id}}" tabindex="-1" aria-labelledby="visualizar_candidato_{{$candidato->id}}_label" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="visualizar_candidato_{{$candidato->id}}_label">Visualizar {{$candidato->nome_completo}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <h4>Informações pessoais</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="nome_{{$candidato->id}}">Nome completo</label>
                                                <input id="nome_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->nome_completo}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="data_nacimento_{{$candidato->id}}">Data de nascimento</label>
                                                <input id="data_nacimento_{{$candidato->id}}" type="date" class="form-control" disabled value="{{$candidato->data_de_nascimento}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cpf_{{$candidato->id}}">CPF</label>
                                                <input id="cpf_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->cpf}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="n_cartao_sus_{{$candidato->id}}">Número do cartão do SUS</label>
                                                <input id="n_cartao_sus_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->numero_cartao_sus}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sexo_{{$candidato->id}}">Sexo</label>
                                                <input id="sexo_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->sexo}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="nome_mae_{{$candidato->id}}">Nome completo da mãe</label>
                                                <input id="nome_mae_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->nome_da_mae}}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <h4>Outras informações</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input id="acamado_{{$candidato->id}}" type="checkbox" disabled @if($candidato->paciente_acamado) checked @endif>
                                                <label for="acamado_{{$candidato->id}}">Pasciente acamado</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="agente_saude_{{$candidato->id}}" type="checkbox" disabled @if($candidato->paciente_agente_de_saude) checked @endif>
                                                <label for="agente_saude_{{$candidato->id}}">Agente de saúde</label>
                                            </div>
                                        </div>
                                        @if($candidato->paciente_agente_de_saude)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br>
                                                <label for="unidade_saude_{{$candidato->id}}">Unidade de saúde</label>
                                                <input id="unidade_saude_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->unidade_caso_agente_de_saude}}">
                                            </div>
                                        </div>
                                        @endif
                                        <br>
                                        <div class="row">
                                            <h4>Contato</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="telefone_{{$candidato->id}}">Telefone</label>
                                                <input id="telefone_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->telefone}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="whatsapp_{{$candidato->id}}">Whatsapp</label>
                                                <input id="whatsapp_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->whatsapp}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email_{{$candidato->id}}">Telefone</label>
                                                <input id="email_{{$candidato->id}}" type="email" class="form-control" disabled value="{{$candidato->email}}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <h4>Endereço</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cep_{{$candidato->id}}">Telefone</label>
                                                <input id="cep_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->cep}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cidade_{{$candidato->id}}">Whatsapp</label>
                                                <input id="cidade_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->cidade}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="bairro_{{$candidato->id}}">Bairro</label>
                                                <input id="bairro_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->bairro}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="logradouro_{{$candidato->id}}">Logradouro</label>
                                                <input id="logradouro_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->logradouro}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="numero_residencia_{{$candidato->id}}">Número da residência</label>
                                                <input id="numero_residencia_{{$candidato->id}}" type="text" class="form-control" disabled value="{{$candidato->numero_residencia}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="complemento_{{$candidato->id}}">Complemento</label>
                                                <textarea id="complemento_{{$candidato->id}}" type="text" class="form-control" disabled rows="3">{{$candidato->numero_residencia}}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>RG</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="">Baixar frente do RG</a>
                                                <img src="{{asset($candidato->foto_frente_rg)}}" alt="frente_rg" style="border-radius: 10px;">
                                            </div>
                                            <div class="col-md-6">
                                                <a href="">Baixar verso do RG</a>
                                                <img src="{{asset($candidato->foto_tras_rg)}}" alt="verso_rg" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <td>
                                <form action="">
                                    @csrf 
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select id="confirmacao_{{$candidato->id}}" class="form-control" name="confimacao" id="">
                                                <option value="" selected disabled>-- selecionar resultado --</option>
                                                <option value="1">Confirmar</option>
                                                <option value="0">Horário Ocupado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
