@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des compteurs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('counts.create') }}"> Ajouter un compteur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($counts as $count)
        <tr>
            <td>{{ $count->id }}</td>
            <td>{{ $count->title }}</td>
            <td>
                <form action="{{ route('counts.destroy',$count->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('counts.show',$count->id) }}">Voir</a>
    
                    <a class="btn btn-primary" href="{{ route('counts.edit',$count->id) }}">Editer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $counts->links() !!}
      
@endsection