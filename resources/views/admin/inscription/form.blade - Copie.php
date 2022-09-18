<div class="form-group{{ $errors->has('nom') ? 'has-error' : ''}}">
    {!! Form::label('nom', 'Nom', ['class' => 'control-label']) !!}
    {!! Form::text('nom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('prenom') ? 'has-error' : ''}}">
    {!! Form::label('prenom', 'Prenom', ['class' => 'control-label']) !!}
    {!! Form::text('prenom', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sexe') ? 'has-error' : ''}}">
    {!! Form::label('sexe', 'Sexe', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('sexe', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('sexe', '0', true) !!} No</label>
</div>
    {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('date_naissance') ? 'has-error' : ''}}">
    {!! Form::label('date_naissance', 'Date de naissance', ['class' => 'control-label']) !!}
    {!! Form::date('date_naissance', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date_naissance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('lieu_naissance') ? 'has-error' : ''}}">
    {!! Form::label('lieu_naissance', 'Lieu de naissance', ['class' => 'control-label']) !!}
    {!! Form::text('lieu_naissance', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('lieu_naissance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('contact') ? 'has-error' : ''}}">
    {!! Form::label('contact', 'Contact', ['class' => 'control-label']) !!}
    {!! Form::text('contact', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('nom_pere') ? 'has-error' : ''}}">
    {!! Form::label('nom_pere', 'Nom du Père', ['class' => 'control-label']) !!}
    {!! Form::text('nom_pere', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_pere', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('nom_mere') ? 'has-error' : ''}}">
    {!! Form::label('nom_mere', 'Nom de la mère', ['class' => 'control-label']) !!}
    {!! Form::text('nom_mere', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_mere', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('contact_parents') ? 'has-error' : ''}}">
    {!! Form::label('contact_parents', 'Contact des parents', ['class' => 'control-label']) !!}
    {!! Form::text('contact_parents', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact_parents', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('nom_tuteur') ? 'has-error' : ''}}">
    {!! Form::label('nom_tuteur', 'Nom du tuteur', ['class' => 'control-label']) !!}
    {!! Form::text('nom_tuteur', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_tuteur', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('contact_tuteur') ? 'has-error' : ''}}">
    {!! Form::label('contact_tuteur', 'Contact du tuteur', ['class' => 'control-label']) !!}
    {!! Form::text('contact_tuteur', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact_tuteur', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('formartion_id') ? 'has-error' : ''}}">
    {!! Form::label('formartion_id', 'Filière choisie ', ['class' => 'control-label']) !!}
    {!! Form::number('formartion_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('formartion_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('classe') ? 'has-error' : ''}}">
    {!! Form::label('classe', 'Classe', ['class' => 'control-label']) !!}
    {!! Form::text('classe', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('classe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('acte_de_naissance') ? 'has-error' : ''}}">
    {!! Form::label('acte_de_naissance', 'Acte de naissance', ['class' => 'control-label']) !!}
    {!! Form::file('acte_de_naissance',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('acte_de_naissance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('dernier_bulletin') ? 'has-error' : ''}}">
    {!! Form::label('dernier_bulletin', 'dernier_bulletin', ['class' => 'control-label']) !!}
    {!! Form::file('dernier_bulletin',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('dernier_bulletin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('certificat') ? 'has-error' : ''}}">
    {!! Form::label('certificat', 'Certificat de scolarité', ['class' => 'control-label']) !!}
    {!! Form::file('certificat',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('certificat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', "Photo d'identité", ['class' => 'control-label']) !!}
    {!! Form::file('photo',  ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
