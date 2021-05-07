    <img src="{{ URL::asset('storage/uploads/logo/logo-header-liliths-garden.png') }}" alt="no funciona" width="300vh">
    <div class="container">
        <h1>Correo electronico</h1>
        <p><strong>Nombre:</strong><br>{{$contacto['name']}}</p>
        <p><strong>Correo:</strong><br>{{$contacto['email']}}</p>
        <p><strong>Teléfono:</strong><br>{{$contacto['movil']}}</p>
        <p><strong>Número pedido:</strong><br>{{$contacto['number-order']}}</p>
        <p><strong>Mensaje:</strong><br>{{$contacto['message']}}</p>

    </div>

