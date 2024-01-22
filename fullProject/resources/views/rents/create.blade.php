@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Rent</h1>
        <form method="POST" action="{{ route('rents.store') }}">
            @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_date">Начало дня:</label>
                        <input type="date" name="first_date" id="first_date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_date">Конец дня:</label>
                        <input type="date" name="last_date" id="last_date" class="form-control" required>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="client_id">Клиенты:</label>
                <select name="client_id" id="client_id" class="form-control" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->first_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="inventory_id">Доступные Аренды:</label>
                <select name="inventory_id" id="inventory_id" class="form-control" required>
                    @foreach($inventories as $inventory)
                        <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="rent_cost">Цена:</label>
                <input type="number" name="rent_cost" id="rent_cost" class="form-control" required>
            </div>

            <button type="submit" class="mt-3 btn btn-primary">Добовит</button>
        </form>
    </div>
@endsection
