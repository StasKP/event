@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">Панель администатора</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <form action="{{url('/section')}}" method="GET">
                                            @csrf
                                            <button class="btn btn-outline-dark">Разделы</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{url('/event')}}" method="GET">
                                            @csrf
                                            <button class="btn btn-outline-dark">Мероприятия</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
