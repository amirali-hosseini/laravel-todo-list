@extends('layouts.app')


@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="card shadow">
                        <div class="card-body p-5">

                            <h3 class="text-center mb-4">{{ env('APP_NAME' , 'Todo List') }}</h3>

                            <form
                                class="d-flex flex-column w-100 flex-md-row justify-content-center align-items-center mb-4"
                                method="post"
                                action="{{ route('todos.store') }}">
                                @csrf
                                <div class="form-outline w-100 flex-fill m-1">
                                    <input type="text" name="title" id="form2" class="form-control"/>
                                    <label class="form-label" for="form2">Title ...</label>
                                </div>
                                <div class="form-outline w-100 flex-fill m-1">
                                    <select name="status" id="form2" class="form-control"
                                            style="border: 0.1rem solid lightgrey">
                                        <option value="0" class="form-control">Undone</option>
                                        <option value="1" class="form-control">Done</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info w-100 m-1">Add</button>
                            </form>

                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1"
                                       role="tab"
                                       aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2"
                                       role="tab"
                                       aria-controls="ex1-tabs-2" aria-selected="false">Done</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3"
                                       role="tab"
                                       aria-controls="ex1-tabs-3" aria-selected="false">Undone</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                     aria-labelledby="ex1-tab-1">
                                    <ul class="list-group mb-0">
                                        @foreach($todos as $todo)
                                            <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                style="background-color: #f4f6f7;overflow: auto;">
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <div
                                                        class="d-flex flex-row align-items-center justify-content-between">
                                                        <form action="{{ route('todos.switch' , $todo->id) }}"
                                                              method="post"
                                                              class="m-0 p-0">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="mx-2 p-0 border-0" type="submit"
                                                                    style="font-size: 1px;background-color: inherit;"
                                                                    aria-label="..." {{ $todo->status ? 'checked' : '' }}>
                                                                <i class="material-icons fw-bold {{ $todo->status ? 'text-danger' : 'text-success' }}">{{ $todo->status ? 'close' : 'check' }}</i>
                                                            </button>
                                                        </form>
                                                        <p class="m-0">
                                                            {!! $todo->status ? '<s>' : '' !!}
                                                            {!! $todo->title !!}
                                                            {!! $todo->status ? '</s>' : '' !!}
                                                        </p>
                                                    </div>

                                                    <form action="{{ route('todos.destroy' , $todo->id) }}"
                                                          method="post"
                                                          class="m-0 p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="mx-2 p-0 border-0" type="submit"
                                                                style="font-size: 1px;background-color: inherit;"
                                                                aria-label="...">
                                                            <i class="material-icons fw-bold text-danger">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                    <ul class="list-group mb-0">
                                        @foreach($dones as $todo)
                                            <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                style="background-color: #f4f6f7;">
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <div
                                                        class="d-flex flex-row align-items-center justify-content-between">
                                                        <form action="{{ route('todos.switch' , $todo->id) }}"
                                                              method="post"
                                                              class="m-0 p-0">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="mx-2 p-0 border-0" type="submit"
                                                                    style="font-size: 1px;background-color: inherit;"
                                                                    aria-label="..." {{ $todo->status ? 'checked' : '' }}>
                                                                <i class="material-icons fw-bold {{ $todo->status ? 'text-danger' : 'text-success' }}">{{ $todo->status ? 'close' : 'check' }}</i>
                                                            </button>
                                                        </form>
                                                        {!! $todo->status ? '<s>' : '' !!}
                                                        {!! $todo->title !!}
                                                        {!! $todo->status ? '</s>' : '' !!}
                                                    </div>

                                                    <form action="{{ route('todos.destroy' , $todo->id) }}"
                                                          method="post"
                                                          class="m-0 p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="mx-2 p-0 border-0" type="submit"
                                                                style="font-size: 1px;background-color: inherit;"
                                                                aria-label="...">
                                                            <i class="material-icons fw-bold text-danger">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                    <ul class="list-group mb-0">
                                        @foreach($undones as $todo)
                                            <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                style="background-color: #f4f6f7;">
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <div
                                                        class="d-flex flex-row align-items-center justify-content-between">
                                                        <form action="{{ route('todos.switch' , $todo->id) }}"
                                                              method="post"
                                                              class="m-0 p-0">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="mx-2 p-0 border-0" type="submit"
                                                                    style="font-size: 1px;background-color: inherit;"
                                                                    aria-label="..." {{ $todo->status ? 'checked' : '' }}>
                                                                <i class="material-icons fw-bold {{ $todo->status ? 'text-danger' : 'text-success' }}">{{ $todo->status ? 'close' : 'check' }}</i>
                                                            </button>
                                                        </form>
                                                        {!! $todo->status ? '<s>' : '' !!}
                                                        {!! $todo->title !!}
                                                        {!! $todo->status ? '</s>' : '' !!}
                                                    </div>

                                                    <form action="{{ route('todos.destroy' , $todo->id) }}"
                                                          method="post"
                                                          class="m-0 p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="mx-2 p-0 border-0" type="submit"
                                                                style="font-size: 1px;background-color: inherit;"
                                                                aria-label="...">
                                                            <i class="material-icons fw-bold text-danger">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Tabs content -->
                        </div>
                        <div class="mx-3">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input class="btn btn-outline-danger" type="submit" value="Logout" style="width: 100px">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
