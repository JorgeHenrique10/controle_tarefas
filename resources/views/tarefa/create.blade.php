<x-app-layout>
    <x-slot name="header">
        @if(isset($tarefa->id))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Tarefa') }}
            </h2>
            @else
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Criar nova tarefas') }}
                </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($tarefa->id))
                        <form action="{{route('tarefa.update', ['tarefa' => $tarefa->id])}}" method="POST">
                        @method('PUT')

                        @else
                            <form action="{{route('tarefa.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3 col-sm-4">
                            <label class="form-label">Tarefa</label>
                            <input name="tarefa" type="text" class="form-control" placeholder="Tarefa" value="{{$tarefa->tarefa ?? old('tarefa')}}">
                            {{$errors->has('tarefa') ? $errors->first('tarefa') : ''}}
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label class="form-label">Data limite conclusão</label>
                            <input name="data_limite_conclusao" type="date" class="form-control" value="{{ $tarefa->data_limite_conclusao ?? old('data_limite_conclusao')}}">
                            {{$errors->has('data_limite_conclusao') ? $errors->first('data_limite_conclusao') : ''}}
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
