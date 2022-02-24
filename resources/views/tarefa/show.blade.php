<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tarefas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <fieldset disabled="disabled">
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
                        </fieldset>
                        <a href="{{route('tarefa.index')}}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
