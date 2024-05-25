<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="admins-table">
            <thead>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Is Active</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->password }}</td>
                    <td>{{ $admin->is_active }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admins.show', [$admin->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admins.edit', [$admin->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $admins])
        </div>
    </div>
</div>
