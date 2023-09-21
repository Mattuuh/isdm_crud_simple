@extends('layouts.app')

@section('title', 'Crear un nuevo Producto')

@section('content')

<div class="bg-secondary-subtle min-vh-100 pt-4">
    <div class="container w-25 pb-2 border rounded-2 bg-light">
    <h1>Crear un nuevo Producto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST" novalidate class="">
        @csrf

        <label for="name" class="form-label">Nombre: </label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">

        <br>

        <label for="description" class="form-label">Descripcion: </label><br>
        <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>

        <br>

        <label for="init_price" class="form-label">Precio Unitario: </label>
        <input type="number" name="unit_price" value="{{ old('unit_price') }}" class="form-control">

        <br>

        <label for="stock" class="form-label">Stock: </label>
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">

        <br>

        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger text-end">Cancelar</a>
    </form>
    </div>
</div>
@endsection
