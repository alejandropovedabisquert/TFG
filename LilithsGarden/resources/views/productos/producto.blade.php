@extends('layouts.app')
@section('title', $producto->name)
@section('content')
<div class="container">
    <h1>Aqui ira la pagina del producto {{$producto->name}}</h1>
    <p>{{$producto->description}}</p>
    @foreach ($imagenes as $imagen)
    <img src="{{URL::asset('storage/'.$imagen->url)}}">
    @endforeach
    <form action="{{route('cart.add', $producto)}}" method="post">
        @csrf
        <input type="submit" name="btn" class="btn btn-success" value="Añadir al carrito">
    </form>

   
    @foreach ($comentarios as $comentario)
    <p>{{'Anónimo'}}</p>
    <p>{{$comentario->comment}}{{$comentario->created_at}}</p>

    @endforeach
@if (Auth::check())
<form action="{{route('comentario.store')}}" method="post">
    @csrf
    <div class="bg-light p-2">
        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
        <input type="hidden" name="product_id" id="product_id" value="{{$producto->id}}">
        <input type="hidden" name="rating" id="rating" value="5">
        <textarea class="form-control ml-1 shadow-none textarea @error('description') is-invalid @enderror" name="comment" placeholder="Deja un comentario" rows="5"></textarea>
        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">{{'Envia un comentario'}}</button></div>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
    </div>

</form>
@endif

</div>
    
@endsection