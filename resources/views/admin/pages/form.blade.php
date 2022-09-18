<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode === 'edit')
<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file('image', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-2 {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
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
<div class="form-group mt-4 mb-2">
    {!! Form::submit($formMode === 'edit' ? 'Mettre à jour' : 'Enrégistrer', ['class' => 'btn btn-primary']) !!}
</div>
