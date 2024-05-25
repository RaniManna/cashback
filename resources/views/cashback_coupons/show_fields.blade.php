<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $cashbackCoupon->title }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $cashbackCoupon->category_id }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    <p>{{ $cashbackCoupon->branch_id }}</p>
</div>

<!-- Cashback Percentage Field -->
<div class="col-sm-12">
    {!! Form::label('cashback_percentage', 'Cashback Percentage:') !!}
    <p>{{ $cashbackCoupon->cashback_percentage }}</p>
</div>

<!-- Cashback Percentage Sys Field -->
<div class="col-sm-12">
    {!! Form::label('cashback_percentage_sys', 'Cashback Percentage Sys:') !!}
    <p>{{ $cashbackCoupon->cashback_percentage_sys }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cashbackCoupon->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cashbackCoupon->updated_at }}</p>
</div>

