<div class="row">
    <div class="col-md-6">
        <div class="form-group  {{ $errors->has('site') ? 'has-error' : '' }}">
            {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
            {!! Form::select('site', ['PARAKOU' => 'Site de Parakou', 'COTONOU' => 'Site de Cotonou'], null, 'required' == 'required' ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('site', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nom') ? 'has-error' : '' }}">
            {!! Form::label('nom', 'Nom', ['class' => 'control-label']) !!}
            {!! Form::text('nom', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('prenom') ? 'has-error' : '' }}">
            {!! Form::label('prenom', 'Prenom', ['class' => 'control-label']) !!}
            {!! Form::text('prenom', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-6">
        <div class="form-group  {{ $errors->has('sexe') ? 'has-error' : '' }}">
            {!! Form::label('sexe', 'Sexe', ['class' => 'control-label']) !!}
            {!! Form::select('sexe', ['M' => 'Masculin', 'F' => 'Féminin'], null, 'required' == 'required' ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('sexe', '<p class="help-block">:sexe</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('poste') ? 'has-error' : '' }}">
            {!! Form::label('poste', 'Poste', ['class' => 'control-label']) !!}
            {!! Form::text('poste', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('poste', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('photo') ? 'has-error' : '' }}">
    {!! Form::label('photo', 'Photo', ['class' => 'control-label']) !!}
    {!! Form::file('photo', '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="row ">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('telephone') ? 'has-error' : '' }}">
            {!! Form::label('telephone', 'Téléphone', ['class' => 'control-label']) !!}
            {!! Form::text('telephone', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('lien_facebook') ? 'has-error' : '' }}">
            {!! Form::label('lien_facebook', 'Lien Facebook', ['class' => 'control-label']) !!}
            {!! Form::text('lien_facebook', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('lien_facebook', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('lien_linkedin') ? 'has-error' : '' }}">
            {!! Form::label('lien_linkedin', 'Lien Linkedin', ['class' => 'control-label']) !!}
            {!! Form::text('lien_linkedin', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('lien_linkedin', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('biographie') ? 'has-error' : '' }}">
    {!! Form::label('biographie', 'Biographie', ['class' => 'control-label']) !!}
    {!! Form::textarea('biographie', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('biographie', '<p class="help-block">:message</p>') !!}
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
