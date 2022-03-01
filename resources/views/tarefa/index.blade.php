<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tarefas') }}
        </h2>
        <a href="{{ route('tarefa.create') }}" class="float-right">Nova Tarefa</a>
        <a href="{{ route('tarefa.exportar', ['extensao' => 'xlsx']) }}" class="float-right">Excel</a>
        <a href="{{ route('tarefa.exportar', ['extensao' => 'csv']) }}" class="float-right">CSV</a>
        <a href="{{ route('tarefa.exportar', ['extensao' => 'pdf']) }}" class="float-right" target="_blank">PDF</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data Limite Conclusão</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $tarefa)
                                <tr>
                                    <td>{{ $tarefa->id }}</td>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                    <td class="d-inline-flex">
                                        <a href="{{ route('tarefa.show', ['tarefa' => $tarefa->id]) }}">Visualizar</a> |
                                        <a href="{{ route('tarefa.edit', ['tarefa' => $tarefa->id]) }}">Editar</a> |
                                        <form id="form_{{ $tarefa->id }}"
                                            action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="#"
                                                onclick="document.querySelector('#form_{{ $tarefa->id }}').submit()">Excluir</a>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tarefas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
