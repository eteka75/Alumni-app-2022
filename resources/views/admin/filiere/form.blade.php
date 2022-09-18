<div class="form-group{{ $errors->has('nom') ? 'has-error' : ''}}">
    {!! Form::label('nom', 'Nom', ['class' => 'control-label']) !!}
    {!! Form::text('nom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sigle') ? 'has-error' : ''}}">
    {!! Form::label('sigle', 'Sigle', ['class' => 'control-label']) !!}
    {!! Form::text('sigle', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sigle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('entite_id') ? 'has-error' : ''}}">
    {!! Form::label('entite_id', 'Etablissement', ['class' => 'control-label']) !!}
    {!! Form::select('entite_id',isset($entites)?$entites:[''], null, ('required' == 'required') ? ['class' => 'form-select ', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('entite_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('etat') ? 'has-error' : ''}}">
    {!! Form::label('etat', 'Etat', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('etat', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('etat', '0', true) !!} No</label>
</div>
    {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
