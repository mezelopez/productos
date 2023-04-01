@extends('app')
@section('content')
<div class="container">

	@if (session('success'))
		<h6 class="alert alert-success">{{ session('success') }}</h6>
	@endif		
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Stock</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	@foreach ($productos as $prod)
		<tr>
			<td>{{ $prod->nombre }}</td>
			<td>{{ $prod->descripcion }}</td>
			<td>{{ $prod->precio }}</td>
			<td>{{ $prod->stock }}</td>
			<td>
				<a href="{{ route('producto-show', ['id' => $prod->id]) }}">
				
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg>
				</a>				 
			</td>
			<td>
				<form action="{{ route('producto-destroy',['id' => $prod->id]) }}" method="post">
					@method('DELETE')
					@csrf
				<button type="submit" class="btn btn-sm btn-default" style="color:red;">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
					</svg>
				</button>	

				</form>				
			</td>
		</tr>
	@endforeach			
		</tbody>
	</table>
</div>
@endsection

<script type="text/javascript">
let perro = {
   nombre:"Scott",
   color:"Cafe",
   edad: 5,
   macho: true,
   ladrar: function(){
     return(`${this.nombre} puede ladrar`)
   }

};

console.log(perro.ladrar()); // Scott puede ladrar

//la lista de clientes.
let arrayCuentas = [
  {
    nroCuenta: 5486273622,
    tipoDeCuenta: "Cuenta Corriente",
    saldoEnPesos: 27771,
    titularCuenta: "Abigael Natte",
  },
  {
    nroCuenta: 1183971869,
    tipoDeCuenta: "Caja de Ahorro",
    saldoEnPesos: 8675,
    titularCuenta: "Ramon Connell",
  },
  {
    nroCuenta: 9582019689,
    tipoDeCuenta: "Caja de Ahorro",
    saldoEnPesos: 27363,
    titularCuenta: "Jarret Lafuente",
  },
  {
    nroCuenta: 1761924656,
    tipoDeCuenta: "Cuenta Corriente",
    saldoEnPesos: 32415,
    titularCuenta: "Ansel Ardley",
  },
  {
    nroCuenta: 7401971607,
    tipoDeCuenta: "Cuenta Unica",
    saldoEnPesos: 18789,
    titularCuenta: "Jacki Shurmer",
  },
];	

let banco = {
	clientes : arrayCuentas,

	consultarCliente : function(nombre){
     
     let cliente = this.clientes.find(element => element.titularCuenta == nombre);
     return(cliente);
   },

	deposito : function(nombre,monto){
     
     let cliente = this.clientes.find(element => element.titularCuenta == nombre);
     let saldo = cliente.saldoEnPesos + monto;
     return('Depósito realizado, su nuevo saldo es: $ '+saldo);
   },

	extraccion : function(nombre,monto){
     
     let cliente = this.clientes.find(element => element.titularCuenta == nombre);
     let saldo = cliente.saldoEnPesos - monto;
     if(saldo < 0)
     	return('Fondos insuficientes.');
     else
     	return('Extracción realizada correctamente, su nuevo saldo es: $ '+saldo);
   }      
}

console.log(banco.consultarCliente('Ramon Connell'));

console.log(banco.deposito('Ramon Connell',10000));

console.log(banco.extraccion('Ramon Connell',10000));
</script>