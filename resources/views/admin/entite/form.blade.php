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
<div class="form-group{{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
    {!! Form::file('logo',  ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mt-4 {{ $errors->has('description') ? 'has-error' : ''}} mb-3">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control crud-richtext', 'required' => 'required'] : ['class' => 'form-control crud-richtext','rows'=>'3']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('etat') ? 'has-error' : ''}} ">
    {!! Form::label('etat', 'Etat', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('etat', '1') !!} Activé</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('etat', '0', true) !!} Désactivé</label>
</div>
    {!! $errors->first('etat', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
