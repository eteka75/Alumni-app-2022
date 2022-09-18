<div class="form-group{{ $errors->has('nom_prenom') ? 'has-error' : ''}}">
    {!! Form::label('nom_prenom', 'Nom et prénom', ['class' => 'control-label']) !!}
    {!! Form::text('nom_prenom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_prenom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', 'Photo (Carrée)', ['class' => 'control-label']) !!}
    {!! Form::file('photo',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('fonction') ? 'has-error' : ''}}">
    {!! Form::label('fonction', 'Fonction', ['class' => 'control-label']) !!}
    {!! Form::text('fonction', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fonction', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('avis') ? 'has-error' : ''}}">
    {!! Form::label('avis', 'Avis', ['class' => 'control-label']) !!}
    {!! Form::textarea('avis', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('avis', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group mb-4 {{ $errors->has('etat') ? 'has-error' : ''}}">
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
