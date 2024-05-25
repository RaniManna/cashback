<!-- Title Field -->
<div class="form-group col-sm-6 titleTranslate">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control translate', 'id' => 'Title', 'required', 'maxlength' => 100]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 descriptionTranslate">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control translate', 'id' => 'description']) !!}
</div>
<div id="newlang" class="form-group">
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<div id="newlang" class="form-group">
</div>


