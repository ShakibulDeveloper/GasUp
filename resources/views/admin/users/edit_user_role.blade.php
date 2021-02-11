@extends('layouts.master')
@section('content')
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <h3 class="page-title">Edit Role</h3>
    </div>
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    </div>
    <div class="col-12 col-sm-4 text-right  mb-0">
      <a href="{{url('userroles')}}" class="btn btn-primary"><i class="fa fa-reply"></i>Back</a>
    </div>
  </div>
  {{showFlash()}}
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-body">
          <form action="{{url('creatrole')}}" method="POST">
              @csrf
              <input type="hidden" name="id" value="@isset($model->id){{$model->id}}@endisset">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                         <label>Role</label>
                         <input type="text" name="name" required="" value="@isset($model->name){{$model->name}}@endisset" class="form-control" placeholder="Enter Role">
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <button style="margin-top: 32px;" type="submit" class="btn btn-primary">Save</button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection