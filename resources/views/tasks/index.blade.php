@extends('layouts.template')

@section('content')

    <div class="container mt-3">
        <h3 class="text-center">Título</h3>
        <div class="card w-50 text-center m-auto">
            <div class="p-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa-solid fa-list-check"></i> Tarefas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-plus"></i> Adicionar</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="list-group text-left" id="taskList">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    Cras justo odio 
                                </div>
                                <div>
                                    <button class="btn btn-sm undone"><i class="fa-regular fa-circle-check"></i></button>
                                    <button class="btn btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection