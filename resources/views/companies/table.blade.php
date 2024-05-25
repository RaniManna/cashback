<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="companies-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Balance</th>
                <th>Provider Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->title }}</td>
                    <td>{{ $company->description }}</td>
                    <td>{{ $company->image }}</td>
                    <td>{{ $company->balance }}</td>
                    <td>{{ $company->provider_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('companies.show', [$company->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('companies.edit', [$company->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $companies])
        </div>
    </div>
</div>
