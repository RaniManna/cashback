@extends('layouts.app')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Profile</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Profile Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Profile</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Update Profile</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
               <form action="{{route('admin.updateProfile')}}" method="post" role="form">
                 {{csrf_field()}}
                 <div class="form-body">
                     <div class="form-group">
                         <div class="col-md-12">
                           <label>Email</label>
                         </div>
                        <div class="col-md-12">
                           <input class="form-control input-lg" name="email" value="{{$admin->email}}" placeholder="Your Email" type="text">
                           @if ($errors->has('email'))
                             <p style="margin:0px;" class="text-danger">{{$errors->first('email')}}</p>
                           @endif
                        </div>
                     </div>
                    <div class="form-group">
                        <div class="col-md-12">
                          <label>First Name</label>
                        </div>
                       <div class="col-md-12">
                          <input class="form-control input-lg" name="first_name" value="{{$admin->first_name}}" placeholder="Your First Name" type="text">
                          @if ($errors->has('first_name'))
                            <p style="margin:0px;" class="text-danger">{{$errors->first('first_name')}}</p>
                          @endif
                       </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                       <label>Last Name</label>
                      </div>
                       <div class="col-md-12">
                          <input class="form-control input-lg" name="last_name" value="{{$admin->last_name}}" placeholder="Your Last Name" type="last_name">
                          @if ($errors->has('last_name'))
                            <p style="margin:0px;" class="text-danger">{{$errors->first('last_name')}}</p>
                          @endif
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-success">Submit</button>
                       </div>
                    </div>
                 </div>
               </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
