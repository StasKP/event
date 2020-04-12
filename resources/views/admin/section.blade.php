@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">Панель администатора (Разделы)</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url ('/section/store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Название раздела">
                            </div>
                            <button class="btn btn-dark">Создать раздел</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />

    @if(count($data)>0)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">Разделы</div>
                    <div class="card-body">
                        <table class="table table-striped task-table">
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$item->name}}</div>
                                    </td>
                                    @if($item -> is_event == 1)
                                        <td>
                                            <div>Данный раздел заполнен мероприятиями</div>
                                        </td>
                                    @else
                                        @if($item -> is_theme == 1)
                                            <td>
                                                <div>Данный раздел заполнен темами по интересам</div>
                                            </td>
                                        @else
                                            <td>
                                                <form action="{{url('/section/event/'.$item->id)}}" method="GET">
                                                    @csrf
                                                    {{--                                                    @method('PATCH')--}}
                                                    <button class="btn btn-outline-primary">Заполнить мероприятиями</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="/section/theme/{{$item->id}}" method="GET">
                                                    @csrf
                                                    {{--                                                    @method('PATCH')--}}
                                                    <button class="btn btn-outline-success">Заполнить темами по интересам</button>
                                                </form>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
