<!-- Modal -->
<div class="modal fade" id="modalAddCount" tabindex="-1" role="dialog" aria-labelledby="modalAddCountTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddCountTitle">Ajouter un compteur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
                        <label class="col-md-3 col-form-label" for="value">Value</label>
                        <div class="col-md-9">
                            <input class="form-control" id="value" type="number" name="value" placeholder="Value">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="is_primary">is_primary</label>
                        <div class="col-md-9">
                            <input class="form-control" id="is_primary" type="number" name="is_primary" placeholder="is_primary">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="position">position</label>
                        <div class="col-md-9">
                            <input class="form-control" id="position" type="number" name="position" placeholder="position">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="status">Statut</label>
                        <div class="col-md-9">
                            <input class="form-control" id="status" type="number" name="status" placeholder="Statut">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-actions float-right">
                    <button id="saveAddCount" class="btn btn-primary" type="submit">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent

<script>
    $(function () {
        $('#saveAddCount').on('click', function(e) {
            $.post("{{ route('api.admin.counts.store') }}", { 
                title: $('#title').val(), 
                slug: $('#slug').val(), 
                value: $('#value').val(), 
                is_primary: $('#is_primary').val(), 
                position: $('#position').val(), 
                status: $('#status').val(),
                brandId: 1
            }).done( function() {
                // On affiche le nouveau compteur dans le html
                $('.badges').append('<span class="badge badge-secondary">' +  $('#title').val() + '</span>');
                $('#title').val('');
                $('#slug').val('');
                $('#value').val('');
                $('#is_primary').val('');
                $('#position').val('');
                $('#status').val('');
            }).fail( function(e) {
                console.log(e.responseJSON.errors);
            }).always( function() {
                $('#modalAddCount').modal('hide')
            });
        });
    });
    
</script>

@endsection()