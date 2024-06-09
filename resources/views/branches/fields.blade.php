<!-- Title Field -->
<x-multilingual-input-field name="title" :languages="$languages" inputType="input" inputAttrs="required"/>


<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Lan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lan', 'Lan:') !!}
    {!! Form::text('lan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
