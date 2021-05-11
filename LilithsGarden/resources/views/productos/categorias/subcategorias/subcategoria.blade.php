@extends('layouts.app')
@section('title', $subcategoria->name)
@section('content')
<div class="container">
    <h1>{{$subcategoria->name}}</h1>
    <div class="row row-cols-2 row-cols-md-4">
    @foreach ($productos as $producto)
        <div class="col p-2">
        <a href="{{route('productos.show', $producto->slug)}}" class="enlaces-productos">
            <div class="card">
                <div class="card-body">
                    @foreach ($producto->photos->take(1) as $imagen)
                        <img src="{{URL::asset('storage/'.$imagen->url)}}" class="card-img-top" style="width:100%;">
                    @endforeach
                    <div class="col text-center"><b>{{ $producto->name }}</b></div>
                    <div class="col text-center">{{$producto->price}}&euro;</div>
                </div>
            </div>
        </a>
        </div>
    @endforeach
</div>
{{ $productos->links() }}

</div>

@endsection