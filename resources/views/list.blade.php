
@extends('app')
@section('content')
<div class="container">
    <div class="row">
         {!! Form::open(['route' => 'movie/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "name" >
          </div>
          <button type="submit" class="btn btn-default">BUscar</button>
        <a href="{{ route('movie.index') }}" class="btn btn-primary">Todo</a>
         <a href="{{ route('movie.create') }}" class="btn btn-primary">Nuevo</a>
        {!! Form::close() !!}
        <br>
		<table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Accion</th>

                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ route('movie.edit',['id' => $movie->id] )}}" >Editar</a>
                        <a class="btn btn-danger btn-xs" href="{{ route('movie/eliminar',['id' => $movie->id] )}}" >Eliminar</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>
@endsection
