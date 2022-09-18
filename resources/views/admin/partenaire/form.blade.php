<div class="form-group{{ $errors->has('nom') ? 'has-error' : ''}}">
    {!! Form::label('nom', 'Nom', ['class' => 'control-label']) !!}
    {!! Form::text('nom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
    {!! Form::file('logo',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('site_web') ? 'has-error' : ''}}">
    {!! Form::label('site_web', 'Site Web', ['class' => 'control-label']) !!}
    {!! Form::text('site_web', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control','placeholder'=>'https://siteweb.com']) !!}
    {!! $errors->first('site_web', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control crud-richtext', 'required' => 'required'] : ['class' => 'form-control crud-richtext']) !!}
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
<div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
