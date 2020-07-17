@extends('layouts.main')
@section('title')Автомобили @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
            <div class="col"><h1>Автомобили</h1></div>
            <div class="float-right"><a href="{{ route('car.create') }}" class="btn btn-success">+ Добавить</a></div>
            <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Автомобиль</th>
                      <th scope="col">На парковке</th>
                      <th scope="col">Гос. номер</th>
                      <th scope="col">Владелец</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>{{ $car->color }} {{ $car->brand }} &laquo;{{ $car->model }}&raquo;</td>
                        <td>@if ($car->parked) Да @endif</td>
                        <td>{{ $car->number }}</td>
                        <td>{{ $car->name }}</td>
                        <td>
                            <a href="{{ route('car.edit', $car->id) }}" class="btn btn-success">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('car.destroy', $car->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Удалить?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            {{ $cars->links() }}

        </div>
    </div>
@endsection
