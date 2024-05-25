<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="cashback-offers-table">
            <thead>
            <tr>
                <th>Category Id</th>
                <th>Branch Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Points</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cashbackOffers as $cashbackOffer)
                <tr>
                    <td>{{ $cashbackOffer->category_id }}</td>
                    <td>{{ $cashbackOffer->branch_id }}</td>
                    <td>{{ $cashbackOffer->Title }}</td>
                    <td>{{ $cashbackOffer->description }}</td>
                    <td>{{ $cashbackOffer->image }}</td>
                    <td>{{ $cashbackOffer->points }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['cashbackOffers.destroy', $cashbackOffer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cashbackOffers.show', [$cashbackOffer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('cashbackOffers.edit', [$cashbackOffer->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $cashbackOffers])
        </div>
    </div>
</div>
