@extends('admin.layouts.master')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      {{showFlash()}}
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header card_header_bg">
                <h6 class="mb-0">Add New Role</h6>
            </div>
            <div class="card-body">
              <form action="{{url('/creatrole')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" name="name" required="" value="" class="form-control" placeholder="Enter role name">
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
      <div class="row" style="margin-top:15px">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header card_header_bg">
              <h6 class="mb-0">Active Roles</h6>
            </div>
            <div class="card-body">   
              <div class="row">
                <div class="col-sm-12">
                  <table  class="table table-bordered" style="width:100%">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">Roles</th>
                        <th scope="col" class="border-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($alldata))
                        @foreach($alldata as $key=>$value)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>
                              @isset($value->name){{ucfirst($value->name)}}@endisset
                            </td>
                            <td>
                              <a href="{{url('adduserpermissions')}}/{{$value->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"> Assign Permission</i></a>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table> 
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-info">Assign Permission</button>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection