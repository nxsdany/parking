@extends('layouts.main')
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
                    <h2 class="text-center my-3">Добавить нового клиента</h2>
                        @yield('card-body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
