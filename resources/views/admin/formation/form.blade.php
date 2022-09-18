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
    {!! Form::file('image', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('conditions') ? 'has-error' : ''}}">
    {!! Form::label('conditions', "Conditions d'admission", ['class' => 'control-label']) !!}
    {!! Form::textarea('conditions', null, ('' == 'required') ? ['class' => 'form-control crud-richtext', 'required' => 'required','rows'=>'3'] : ['class' => 'form-control crud-richtext','rows'=>'3']) !!}
    {!! $errors->first('conditions', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group mt-4 {{ $errors->has('debouches') ? 'has-error' : ''}}">
    {!! Form::label('debouches', 'Debouchés', ['class' => 'control-label']) !!}
    {!! Form::textarea('debouches', null, ('' == 'required') ? ['class' => 'form-control crud-richtext', 'required' => 'required'] : ['class' => 'form-control crud-richtext','rows'=>'3']) !!}
    {!! $errors->first('debouches', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mt-4 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control crud-richtext', 'required' => 'required'] : ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="row clearfix mt-3 form-group mb-4{{ $errors->has('etat') ? 'has-error' : ''}}">
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
