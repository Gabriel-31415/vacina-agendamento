<x-app-layout>
    <x-slot name="header">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-5">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                    {{ __('Lista de Lotes') }}
                </h2>
            </div>
            <div class="...">
                <a href="{{ route('lotes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Adicionar Lote
                </a>

            </div>

          </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">Nº do lote</th>
                          <th scope="col">Fabricante</th>
                          <th scope="col">Nº de vacinas</th>
                          <th scope="col">Segunda dose</th>
                          <th scope="col">Fabricação</th>
                          <th scope="col">Validade</th>
                          <th scope="col">Ações</th>

                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($lotes as $lote)
                      <tr>
                          <td>{{$lote->numero_lote}}</td>
                          <td>{{$lote->fabricante}}</td>
                          <td>{{$lote->qtdVacina}}</td>
                          <td>{{$lote->segunda_dose ? 'Sim' : 'Não'}}</td>
                          <td>{{ date('d/m/Y', strtotime($lote->data_fabricacao))  }}</td>
                          <td>{{ date('d/m/Y', strtotime($lote->data_validade))}}</td>
                          <td>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Excluir
                            </button>

                          </td>

                      </tr>
                      @endforeach
                  </tbody>
              </table>
              {{ $lotes->links() }}
            </div>
        </div>
    </div>
  </x-app-layout>
