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
    Editer la marque
  </div>
  <div class="card-body">
     <form class="form-horizontal" action="{{ route('brands.update',$brand->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="title">Titre</label>
            <div class="col-md-9">
                <input class="form-control" id="title" type="text" name="title" value="{{ $brand->title }}" placeholder="Titre">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="slug">Slug</label>
            <div class="col-md-9">
                <input class="form-control" id="slug" type="text" name="slug" value="{{ $brand->slug }}" placeholder="Slug">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="type">Type</label>
            <div class="col-md-9">
                <input class="form-control" id="type" type="text" name="type" value="{{ $brand->type }}" placeholder="Type">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="image">Image</label>
            <div class="col-md-9">
                <input class="form-control" id="image" type="text" name="image" value="{{ $brand->image }}" placeholder="Image">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="color">Couleur</label>
            <div class="col-md-9">
                <input class="form-control" id="color" type="text" name="color" value="{{ $brand->color }}" placeholder="Couleur">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="position">Position</label>
            <div class="col-md-9">
                <input class="form-control" id="position" type="number" name="position" value="{{ $brand->position }}" placeholder="Position">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="status">Status</label>
            <div class="col-md-9">
                <input class="form-control" id="status" type="number" name="status" value="{{ $brand->status }}" placeholder="Status">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="status">
                Compteurs
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAddCount">Ajouter</button>
            </label>
            <div class="col-md-9">                
                <div class="input-group mb-3">
                    <div class="badges mb-4" style="font-size: 18px;line-height: 9px;">
                    @foreach ($counts as $count)
                        <form action="{{ route('counts.destroy',$count->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <span class="badge badge-secondary">
                                {{$count->title}}
                                <button id="count-label-{{$count->id}}" type="button" class="btn btn-sm btn-info button-edit" data-toggle="modal" data-target="#modalEditCount"  
                                    data-id="{{ $count->id }}"
                                    data-title="{{ $count->title }}"
                                    data-slug="{{ $count->slug }}"
                                    data-value="{{ $count->value }}"
                                    data-is_primary="{{ $count->is_primary }}"
                                    data-position="{{ $count->position }}"
                                    data-status="{{ $count->status }}"
                                    >Editer</button>
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </span>
                        </form>
                    @endforeach
                    </div>
                </div>
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

@include('admin/partials/modals/_modal-add-count')
@include('admin/partials/modals/_modal-edit-count')