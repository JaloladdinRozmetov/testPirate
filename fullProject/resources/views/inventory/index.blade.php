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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Назывния</th>
                        <th>Имя Сотрудника</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <a href="{{ route('inventories.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Добовит
                    </a>
                    @foreach($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->name }}</td>
                            <td>{{ $inventory->employee->first_name }}</td>
                            <td>{{ $inventory->status }}</td>
                            <td>
                                <a href="{{ route('inventories.edit', $inventory) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt"></i> Изменит
                                </a>

                                <form action="{{ route('inventories.destroy', $inventory) }}" method="post" style="display:inline;">
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
        </div>
    </div>
@endsection
