@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
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
                            <button class="btn btn-success btn-sm">Ver</button>
                            <button class="btn btn-info btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $products->render() }}
        </div>
    @else
        <h4>No hay productos cargados!</h4>
    @endif
@endsection