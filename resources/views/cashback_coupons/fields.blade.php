<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::number('branch_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Cashback Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cashback_percentage', 'Cashback Percentage:') !!}
    {!! Form::number('cashback_percentage', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Cashback Percentage Sys Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cashback_percentage_sys', 'Cashback Percentage Sys:') !!}
    {!! Form::number('cashback_percentage_sys', null, ['class' => 'form-control', 'required']) !!}
</div>