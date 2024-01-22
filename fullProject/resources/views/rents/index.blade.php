@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1>Все аренды</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Ид</th>
                <th>Первый день</th>
                <th>Последний день</th>
                <th>Цена аренды</th>
                <th>Клиент</th>
                <th>Инвентарий</th>
                <th>Cотрудник</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <a href="{{ route('rents.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Добовит
            </a>
            @foreach($rents as $rent)
                <tr>
                    <td>{{ $rent->id }}</td>
                    <td>{{ $rent->first_date }}</td>
                    <td>{{ $rent->last_date }}</td>
                    <td>{{ $rent->rent_cost }} $</td>
                    <td>{{ $rent->client->first_name }}</td>
                    <td>{{ $rent->inventory->name }}</td>
                    <td>{{ $rent->inventory->employee->first_name }}</td>
                    <td> <form action="{{ route('rents.destroy', $rent->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('А вы точно хотите удалит?')">
                                <i class="fas fa-trash"></i> Удалит
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
