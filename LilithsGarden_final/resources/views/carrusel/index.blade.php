@extends('layouts.app')
@section('title', 'Administración Carruseles')
@section('content')
    <div class="container">
        <h1>Carruseles</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($carruseles as $carrusel)
                <div class="col p-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="col"><b>Id de carrusel:</b> {{ $carrusel->id }}</div>
                        </div>
                            <div class="card-body">
                                <img src="{{URL::asset('storage/'.$carrusel->url)}}" alt="..." width="100%">
                            </div>
                        <div class="card-footer text-muted">
                            <div class="col-md-8 ">
                                <form action="{{ route('carrusel.destroy', $carrusel) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Borrar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            {{ $carruseles->links() }}
        </div>
        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    @endsection