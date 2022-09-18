<div class="row">
    <div class="col-md-6">
        <div class="form-group  {{ $errors->has('site') ? 'has-error' : ''}}">
            {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
            {!! Form::select('site', ['PARAKOU'=>"Site de Parakou","COTONOU"=>"Site de Cotonou"],null,('required' == 'required') ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control ']) !!}
            {!! $errors->first('site', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group  {{ $errors->has('categorie_id') ? 'has-error' : ''}}">
            {!! Form::label('categorie_id', 'Catégorie', ['class' => 'control-label']) !!}
            {!! Form::select('categorie_id',isset($categories)?$categories:[], null, ('required' == 'required') ? ['class' => 'form-select', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('categorie_id', '<p class="help-block">:message</p>') !!}
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
    {!! Form::file('image',  ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('resume') ? 'has-error' : ''}}">
    {!! Form::label('resume', 'Resumé', ['class' => 'control-label']) !!}
    {!! Form::textarea('resume', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required',"rows"=>"3"] : ['class' => 'form-control']) !!}
    {!! $errors->first('resume', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3  {{ $errors->has('contenu') ? 'has-error' : ''}}">
    {!! Form::label('contenu', 'Contenu', ['class' => 'control-label ']) !!}
    {!! Form::textarea('contenu', null,  ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('contenu', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group mb-3  {{ $errors->has('contenu') ? 'has-error' : ''}}">
    {!! Form::label('contenus', 'Contenu', ['class' => 'control-label ']) !!}
    {!! Form::textarea('contenus', null,  ['class' => 'form-control js-ckeditor5','id'=>'js-ckeditor5-classic']) !!}
    {!! $errors->first('contenus', '<p class="help-block">:message</p>') !!}
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


