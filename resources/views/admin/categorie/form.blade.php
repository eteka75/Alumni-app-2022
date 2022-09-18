<div class="row">
    <div class="col-md-4">
        <div class="form-group  {{ $errors->has('site') ? 'has-error' : ''}}">
            {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
            {!! Form::select('site', ['PARAKOU'=>"Site de Parakou","COTONOU"=>"Site de Cotonou"],null,('required' == 'required') ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('site', '<p class="help-block">:message</p>') !!}
        </div>
    </div>   
</div>
<div class="form-group{{ $errors->has('nom') ? 'has-error' : ''}}">
    {!! Form::label('nom', 'Nom de la catégorie', ['class' => 'control-label']) !!}
    {!! Form::text('nom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required crud-richtext','rows'=>'3'] : ['class' => 'form-control crud-richtext','rows'=>'3']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
