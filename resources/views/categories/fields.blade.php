<!-- Title Field -->
{{--<div class="form-group col-sm-6 titleTranslate">--}}
{{--    {!! Form::label('title', 'Title:') !!}--}}
{{--    {!! Form::text('title', null, ['class' => 'form-control translate', 'id' => 'Title', 'required', 'maxlength' => 100]) !!}--}}
{{--</div>--}}

<!-- Title Field -->
{{--@include('components.multilingual-input-field', ['name' => 'title', 'languages' => $languages])--}}
<x-multilingual-input-field name="title" :languages="$languages" inputType="input" inputAttrs="required"/>
<x-multilingual-input-field name="description" :languages="$languages" inputType="textarea" inputAttrs=""/>


<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 descriptionTranslate">
    {!! Form::label('description', 'Description:') !!}
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


