@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">Панель администатора (Мероприятия)</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>
                                    Название
                                </th>
                                <th>
                                    Дата
                                </th>
                                <th>

                                </th>
                                <th>
                                    Менеджер
                                </th>
                                <th>

                                </th>
                            </tr>
                            @foreach($data as $item)
                                <tr>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->date}}
                                    </td>
                                    @if($item->manager == 0)
                                        <td>
                                            <form action="{{url('/event_add/'.$item->id)}}" method="GET">
                                                @csrf
                                                <button class="btn btn-outline-dark">Назначить менеджера</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            Менеджер
                                        </td>
                                        <td>
                                            <form action="{{url('/event_upd/'.$item->id)}}" method="GET">
                                                @csrf
                                                <button class="btn btn-outline-dark">Изменить менеджера</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

