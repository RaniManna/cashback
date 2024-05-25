@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Create Categories
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'categories.store', 'id' => 'categoryAjaxForm']) !!}

            {{-- <div class="card-body" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label"
                 aria-hidden="true">

                <div class="form-group ">
                    <!-- Button to open Modal 2 for lang -->
                    <button type="button" class="btn btn-secondary langBtn float-right"
                        data-toggle="modal" data-target="#modal2">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="row">

                    <div class="modal-body">
                        <form id="categoryAjaxForm" method="POST" action="{{ route('admin.category.create') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="parent_id" value="">
                            <div class="form-group ">
                                <!-- Button to open Modal 2 for lang -->
                                <button type="button" class="btn btn-secondary langBtn float-right"
                                    data-toggle="modal" data-target="#modal2">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 titleTranslate">
                                    <label for="title" class="col-form-label">Title: *</label>
                                    <input type="text" lang="en" class="form-control" id="title"
                                        name="title" required>
                                </div>
                            </div>

                            <div class="form-group descriptionTranslate">
                                <label for="description" class="col-form-label">Description</label>

                                <textarea class="form-control" required name="description" lang="en" id="description" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image: *</label>
                                <input type="file" class="form-control" id="image" name="file" required>
                            </div>
                            <div id="newlang" class="form-group"> </div>
                            <div class="modal-footer">
                                <button id="submitBtn" data-nameOfArray="title" type="submit"
                                class="btn btn-primary">Save</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-default"> Cancel </a>
                            </div>
                        </form>
                    </div>


                    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content  ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal2Label">Add Country in a specific language</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body langModal">
                                <div class="form-group">
                                    <label for="languages" class="col-form-label"> Language</label>
                                    <select id="languages" class="form-control" name="languages">
                                        @foreach (json_decode($languages->language, true) as $key => $lang)
                                            <option value="{{ $key }}">{{ $lang }}</option>
                                        @endforeach
                                    </select>
                                    <label for="langTitle" class="col-form-label">Service Name: *</label>
                                    <input type="text" class="langTitle form-control" name="langTitle">
                                </div>

                                <div class="form-group ">
                                    <label for="description" class="col-form-label">Description *</label>
                                    <textarea class="langDescription  form-control" required name="description" lang="en" id="description"
                                        cols="30" rows="10"></textarea>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button id="addServiceInput" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

            <div class="card-body">

                <div class="row">
                    @include('companies.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('categories.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
