@extends('layouts.main')
@section('title', 'Редактировать данные о клиенте')
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
                    <form action="{{ route('client.update', $client->id) }}" method="POST">
                            {!! csrf_field() !!}
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">ФИО</label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}" placeholder="Фамилия Имя Отчество">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label mr-3">Пол ({{ $client->gender }})</label>
                                    <input id="gender1" type="radio" class="form-group-input" name="gender" value="1" @if($client->gender!="0") checked @endif>
                                    <label class="form-group-label mr-3" for="gender1">Мужской</label>
                                    <input id="gender0" type="radio" class="form-group-input" name="gender" value="0" @if($client->gender!="1") checked @endif>
                                    <label class="form-group-label mr-3" for="gender0">Женский</label>
                            </div>
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input type="tel" name="phone" class="form-control" value="{{ $client->phone }}" placeholder="+79999999999">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" class="form-control" value="{{ $client->address }}" placeholder="ул. Мира, д.11">
                            </div>
                        <button type="submit" name="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
