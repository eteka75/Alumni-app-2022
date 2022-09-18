<div class="row">
    <div class="col-12">
        <h5 class="text-lg text-primary text-light">Informations sur l'apprenant</h5>
        <hr class="mb-3 m-0">
    </div>
    <div class="col-md-6 mb-2">
        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
            {!! Form::label('nom', 'Votre nom de famille (*)', ['class' => 'control-label bold']) !!}
            {!! Form::text('nom', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
            {!! Form::label('prenom', 'Votre prénom (*)', ['class' => 'control-label bold']) !!}
            {!! Form::text('prenom', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
        <div class="form-group   {{ $errors->has('sexe') ? 'has-error' : '' }}">
            {!! Form::label('sexe', 'Sexe (*)', ['class' => 'control-label bold']) !!}
            <div class="border p-2 rounded-3">
                <div class="row ">
                    <div class="checkbox  col-4">
                        <label>{!! Form::radio('sexe', 'M') !!} Masculin</label>
                    </div>
                    <div class="checkbox col-4">
                        <label>{!! Form::radio('sexe', 'F') !!} Féminin</label>
                    </div>
                </div>
            </div>
            {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <div class="form-group {{ $errors->has('date_naissance') ? 'has-error' : '' }}">
            {!! Form::label('date_naissance', 'Date de naissance (*)', ['class' => 'control-label bold']) !!}
            {!! Form::date('date_naissance', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('date_naissance', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('lieu_naissance') ? 'has-error' : '' }}">
    {!! Form::label('lieu_naissance', 'Lieu de naissance (*)', ['class' => 'control-label bold']) !!}
    {!! Form::text('lieu_naissance', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('lieu_naissance', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
    {!! Form::label('contact', 'Téléphone', ['class' => 'control-label bold']) !!}
    {!! Form::text('contact', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-12">
        <h5 class="text-lg text-primary text-light">Informations sur les parents</h5>
        <hr class="mb-3 m-0">
    </div>
    <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('nom_pere') ? 'has-error' : '' }}">
    {!! Form::label('nom_pere', 'Nom du Père (*)', ['class' => 'control-label bold']) !!}
    {!! Form::text('nom_pere', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_pere', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="col-md-6 mb-2">

<div class="form-group {{ $errors->has('nom_mere') ? 'has-error' : '' }}">
    {!! Form::label('nom_mere', 'Nom de la mère (*)', ['class' => 'control-label bold']) !!}
    {!! Form::text('nom_mere', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_mere', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
<div class="form-group {{ $errors->has('contact_parents') ? 'has-error' : '' }}">
    {!! Form::label('contact_parents', 'Contact des parents (*)', ['class' => 'control-label bold']) !!}
    {!! Form::text('contact_parents', null, 'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact_parents', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('nom_tuteur') ? 'has-error' : '' }}">
    {!! Form::label('nom_tuteur', 'Nom du tuteur', ['class' => 'control-label bold']) !!}
    {!! Form::text('nom_tuteur', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nom_tuteur', '<p class="help-block">:message</p>') !!}
</div>
</div>
 <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('contact_tuteur') ? 'has-error' : '' }}">
    {!! Form::label('contact_tuteur', 'Contact du tuteur', ['class' => 'control-label bold']) !!}
    {!! Form::text('contact_tuteur', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact_tuteur', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
   
    <div class="col-md-12 mb-2">
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class' => 'control-label bold']) !!}
    {!! Form::email('email', null, '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-12">
        <h5 class="text-lg text-primary text-light">Choix de la formation</h5>
        <hr class="mb-3 m-0">
    </div>
    <div class="col-md-6 mb-2">
<div class="form-group {{ $errors->has('formation_id') ? 'has-error' : '' }}">
    {!! Form::label('formation_id', 'Filière choisie (*) ', ['class' => 'control-label bold']) !!}
    {!! Form::select('formation_id',isset($formations)?$formations:['Sélectionnez une filières'], null, 'required' == 'required' ? ['class' => 'form-select input-lg py-2', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('formation_id', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="col-md-6 mb-2">

<div class="form-group {{ $errors->has('classe') ? 'has-error' : '' }}">
    {!! Form::label('classe', 'Classe (*)', ['class' => 'control-label bold']) !!}
    {!! Form::select('classe',isset($classes)?$classes:['Sélectionnez une classe'], null, 'required' == 'required' ? ['class' => 'form-select py-2', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('classe', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
<div class="form-group {{ $errors->has('acte_de_naissance') ? 'has-error' : '' }}">
    {!! Form::label('acte_de_naissance', 'Acte de naissance (*)', ['class' => 'control-label bold']) !!}
    {!! Form::file('acte_de_naissance', $formMode !== 'edit'  ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('acte_de_naissance', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="col-md-12 mb-2">
<div class="form-group {{ $errors->has('dernier_bulletin') ? 'has-error' : '' }}">
    {!! Form::label('dernier_bulletin', 'Dernier Bulletin (*)', ['class' => 'control-label bold']) !!}
    {!! Form::file('dernier_bulletin', $formMode !== 'edit'  ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('dernier_bulletin', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="form-group {{ $errors->has('certificat') ? 'has-error' : '' }}">
    {!! Form::label('certificat', 'Certificat de scolarité (*)', ['class' => 'control-label bold']) !!}
    {!! Form::file('certificat', $formMode !== 'edit'  ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('certificat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    {!! Form::label('photo', "Photo d'identité (*)", ['class' => 'control-label bold']) !!}
    {!! Form::file('photo', $formMode !== 'edit' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group ">
    
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : "S'inscrire", ['class' => 'btn btn-primary mt-3']) !!}
</div>
