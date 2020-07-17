@extends('layouts.main')
@section('title', 'Добавить автомобиль')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12 col-md-8 col-lg-6 offset-lg-3 offset-md-2">
            <div class="card">
                <div class="card-body mx-5 mb-4">
                    <h2 class="text-center my-3">@yield('title')</h2>
                    <form action="{{ route('car.store') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="brand">Марка</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="model">Модель</label>
                            <input type="text" name="model" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="color">Цвет</label>
                            <input type="text" name="color" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Гос. номер</label>
                            <input type="text" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="client_id">Клиент
                                <select class="form-control" name="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <label for="parked" class="form-check-inline">
                            <input type="checkbox" name="parked" value="1">
                             Припаркован
                        </label>
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
