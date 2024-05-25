<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="cashback-coupons-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category Id</th>
                <th>Branch Id</th>
                <th>Cashback Percentage</th>
                <th>Cashback Percentage Sys</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cashbackCoupons as $cashbackCoupon)
                <tr>
                    <td>{{ $cashbackCoupon->title }}</td>
                    <td>{{ $cashbackCoupon->category_id }}</td>
                    <td>{{ $cashbackCoupon->branch_id }}</td>
                    <td>{{ $cashbackCoupon->cashback_percentage }}</td>
                    <td>{{ $cashbackCoupon->cashback_percentage_sys }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['cashbackCoupons.destroy', $cashbackCoupon->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cashbackCoupons.show', [$cashbackCoupon->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('cashbackCoupons.edit', [$cashbackCoupon->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $cashbackCoupons])
        </div>
    </div>
</div>
