@extends('layouts.main')
@section('title', 'Клиенты')
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
            <div class="col"><h1>@yield('title')</h1></div>
            <div class="float-right"><a href="{{ route('client.create') }}" class="btn btn-success">+ Добавить</a></div>
            <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Имя</th>
                      <th scope="col">Телефон</th>
                      <th scope="col">Автомобиль</th>
                      <th scope="col">Гос. номер</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            @if (isset($client->brand))
                                {{ $client->color }} {{ $client->brand }} &laquo;{{ $client->model }}&raquo;</td>
                            @endif

                        <td>{{ $client->number }}</td>
                        <td>
                            @if (isset($client->brand))
                                <a href="{{ route('client.edit', $client->id) }}" class="btn btn-success">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if (isset($client->brand))
                                <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Удалить?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('car.create') }}" class="btn btn-success">Добавить машину</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            {{ $clients->links() }}

        </div>
    </div>
@endsection
