@extends('layout')
 
@section('breadcrumb')
<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Brands</li>
    </ol>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Liste des marques
  </div>
  <div class="card-body">
     <div class="row">
        <div class="col">
            <div class="float-right">
                <div class="form-group">
                    <a href="{{ route('brands.create') }}" class="btn btn-primary">Ajouter</a>   
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Label</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <th scope="row">{{ $brand->id }}</th>
                <td>{{ $brand->title }}</td>
                <td>
                    <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
    
                        <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">Voir</a>

                        <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Editer</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <div class="float-right">
                {{ $brands->links() }}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection