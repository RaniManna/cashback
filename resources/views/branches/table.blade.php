<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="branches-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Lat</th>
                <th>Lan</th>
                <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->title }}</td>
                    <td>{{ $branch->lat }}</td>
                    <td>{{ $branch->lan }}</td>
                    <td>{{ $branch->address }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['branches.destroy', $branch->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('branches.show', [$branch->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('branches.edit', [$branch->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $branches])
        </div>
    </div>
</div>
