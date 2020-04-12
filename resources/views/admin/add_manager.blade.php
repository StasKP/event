@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">Панель администатора (Назвачение менеджера на мероприятие {{$data->name}})</div>

                    <div class="card-body">
                        <form action="{{url('/event_add/'.$data->id)}}" method="POST">
                            @csrf
                            <select class="form-control" id="manager" name="manager">
                                @foreach($manager as $item)
                                    <option value="{{$item->id}}">{{$item->firstname}} {{$item->surname}}</option>
                                @endforeach
                            </select>
                            <br />
                            <button class="btn btn-dark">Назначить менеджера</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
