@extends('layouts.template')
@section('title')
Tasks
@endsection
@section('content')

    <div class="container mb-5">
        <h3 class="text-center">Título</h3>
        <div class="card w-50 text-center m-auto">
            <div class="p-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa-solid fa-list-check"></i> Tarefas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="task-tab" data-toggle="tab" href="#task-panel" role="tab" aria-controls="task" aria-selected="false"><i class="fa-solid fa-plus"></i> Adicionar</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="list-group text-left" id="taskList">
                            @guest
                                <p>Você ainda não possui nenhuma tarefa registrada.</p>
                            @else
                                @if(isset($user))
                                    <input type="hidden" id="id_user" value={{$user->id}}>
                                    @if($user->tasks->count())
                                        @foreach($user->tasks as $taskItem)
                                        <li class="list-group-item d-flex justify-content-between">
                                            <input type="hidden" class="id_task" value={{$taskItem->id}}>
                                            <div>
                                                {{$taskItem->task}}
                                            </div>
                                            <div>
                                                <button class="btn btn-sm {{$taskItem->status==0?'done':'undone'}}"><i class="{{$taskItem->status==0?'fa-regular fa-circle-check':'fa-solid fa-circle-check'}}"></i></button>
                                                <button class="btn btn-sm taskItem-delete"><i class="fa-solid fa-trash-can"></i></button>
                                            </div>
                                        </li>
                                        @endforeach
                                    @else
                                        <p>Você ainda não possui nenhuma tarefa registrada em sua conta.</p>
                                    @endif
                                @endif
                            @endguest

                        </ul>
                    </div>
                    <div class="tab-pane fade" id="task-panel" role="tabpanel" aria-labelledby="task-tab">
                        <form action="{{route('store')}}" id="formTask" method="POST">
                            @csrf
                            <div class="form-group text-left">
                              <label for="task">Tarefa</label>
                              <input type="text" class="form-control" name="tarefa" id="task" placeholder="Escreva sua tarefa aqui">
                            </div>
                        </form>
                        <button id="sendTask" class="btn btn-success btn-sm w-100">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
