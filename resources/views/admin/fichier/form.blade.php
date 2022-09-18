<div class="row">
    <div class="col-md-3">
        <div class="form-group  {{ $errors->has('site') ? 'has-error' : '' }}">
            {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
            {!! Form::select('site', ['PARAKOU' => 'Site de Parakou', 'COTONOU' => 'Site de Cotonou'], null, 'required' == 'required' ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('site', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>
<div class="form-group{{ $errors->has('titre') ? 'has-error' : ''}}">
    {!! Form::label('titre', 'Titre', ['class' => 'control-label']) !!}
    {!! Form::text('titre', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('titre', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('fichier') ? 'has-error' : ''}}">
    {!! Form::label('fichier', 'Fichier', ['class' => 'control-label']) !!}
    {!! Form::file('fichier',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fichier', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="row clearfix form-group mt-3 mb-4{{ $errors->has('etat') ? 'has-error' : ''}}">
    {!! Form::label('etat', 'Activé', ['class' => 'float-start d-flex flex _control-label']) !!} 
    
    <div class="checkbox  col-sm-2 col-md-1">
    <label>{!! Form::radio('etat', '1') !!} Oui</label>
</div>
<div class="checkbox col-sm-3 col-md-1">
    <label>{!! Form::radio('etat', '0', true) !!} Non</label>
</div>
    {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
