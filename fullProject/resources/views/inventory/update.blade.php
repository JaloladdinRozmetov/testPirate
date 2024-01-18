@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Редактировать Инвентарий
                    </div>

                    <div class="card-body">
                        <form action="{{ route('inventories.update', $inventory) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Название:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $inventory->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="employee_id">Выделит сотрудника</label>
                                <select class="form-control" id="employee_id" name="employee_id">
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ $employee->id == $inventory->employee_id ? 'selected' : '' }}>
                                            {{ $employee->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Статус:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="opened" {{ $inventory->status == 'opened' ? 'selected' : '' }}>Доступный</option>
                                    <option value="closed" {{ $inventory->status == 'closed' ? 'selected' : '' }}>Не доступный</option>
                                </select>
                            </div>

                            <button type="submit" class="mt-2 btn btn-primary">
                                <i class="fas fa-check"></i> Обновить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
