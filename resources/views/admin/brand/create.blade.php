@extends('layout')
  
@section('breadcrumb')
<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('brands.index') }}">Brands</a></li>
        <li class="breadcrumb-item active">Editer</li>
    </ol>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Ajouter une marque
  </div>
  <div class="card-body">
     <form class="form-horizontal" action="{{ route('brands.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="title">Titre</label>
            <div class="col-md-9">
                <input class="form-control" id="title" type="text" name="title" placeholder="Titre">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="slug">Slug</label>
            <div class="col-md-9">
                <input class="form-control" id="slug" type="text" name="slug" placeholder="Slug">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="type">Type</label>
            <div class="col-md-9">
                <input class="form-control" id="type" type="text" name="type" placeholder="Type">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="image">Image</label>
            <div class="col-md-9">
                <input class="form-control" id="image" type="text" name="image" placeholder="Image">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="color">Couleur</label>
            <div class="col-md-9">
                <input class="form-control" id="color" type="text" name="color" placeholder="Couleur">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="position">Position</label>
            <div class="col-md-9">
                <input class="form-control" id="position" type="number" name="position" placeholder="Position">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="status">Status</label>
            <div class="col-md-9">
                <input class="form-control" id="status" type="number" name="status" placeholder="Status">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-actions float-right">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            <a class="btn btn-secondary" href="{{ route('brands.index') }}">Annuler</a>
        </div>
     </form>       
    </div>
  </div>
</div>
@endsection