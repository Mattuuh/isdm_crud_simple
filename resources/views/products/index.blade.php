@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
   @if(session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
   @endif
      <a href="{{ route('products.create') }}" class="btn btn-success">Agregar nuevo producto</a>
    @if ($products->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Ultima actualización</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>$ {{ $product->unit_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}">Ver</a>
                            <button class="btn btn-info btn-sm">Editar</button>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                              @csrf @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $products->link() }}
        </div>
    @else
        <h4>No hay productos cargados!</h4>
    @endif
@endsection
