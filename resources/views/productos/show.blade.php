@extends('app')
@section('content')
<form action="{{ route('producto-update',['id' => $producto->id]) }}" method="post">
	@method('PATCH')
	@csrf

	<div class="container">
	@if (session('success'))
		<h6 class="alert alert-success">{{ session('success') }}</h6>
	@endif		

	@error('nombre')
		<h6 class="alert alert-danger">{{ $message }}</h6>
	@enderror

	@error('descripcion')
		<h6 class="alert alert-danger">{{ $message }}</h6>
	@enderror	

	@error('precio')
		<h6 class="alert alert-danger">{{ $message }}</h6>
	@enderror

	@error('stock')
		<h6 class="alert alert-danger">{{ $message }}</h6>
	@enderror		
		<legend>Nuevo Producto</legend>
	  <div class="mb-3">
	    <label for="nombre" class="form-label">Nombre</label>
	    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
	  </div>
	  <div class="mb-3">
	    <label for="descripcion" class="form-label">Descripción</label>
	    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}">
	  </div>
	  <div class="mb-3">
	    <label for="precio" class="form-label">Precio</label>
	    <input type="number" step="0.1" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
	  </div>
	  <div class="mb-3">
	    <label for="stock" class="form-label">Stock</label>
	    <input type="number" step="1" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}">
	  </div>	  
	  <button type="submit" class="btn btn-primary">Modificar</button>
	</div>  
</form>
@endsection