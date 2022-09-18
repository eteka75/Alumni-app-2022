<div class="row">
    <div class="col-md-4">
        <div class="form-group  {{ $errors->has('site') ? 'has-error' : ''}}">
            {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
            {!! Form::select('site', ['PARAKOU'=>"Site de Parakou","COTONOU"=>"Site de Cotonou"],null,('required' == 'required') ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('site', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
   
</div>
<div class="form-group{{ $errors->has('titre') ? 'has-error' : ''}}">
    {!! Form::label('titre', 'Titre', ['class' => 'control-label']) !!}
    {!! Form::text('titre', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('titre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file('image',  ($formMode === 'edit') ? ['class' => 'form-control'] : ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('sous_titre') ? 'has-error' : ''}}">
    {!! Form::label('sous_titre', 'Sous Titre', ['class' => 'control-label']) !!}
    {!! Form::textarea('sous_titre', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required','rows'=>'2'] : ['class' => 'form-control','rows'=>'2']) !!}
    {!! $errors->first('sous_titre', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','rows'=>'3'] : ['class' => 'form-control crud-richtext','rows'=>'6']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="row clearfix form-group mb-4{{ $errors->has('etat') ? 'has-error' : ''}}">
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
