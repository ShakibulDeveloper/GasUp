@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 right_contents">
      {{showFlash()}}
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
        
        </div>
      </div> 
      <div class="card">
        <div class="row">
          <div class="col-sm-12 well">
            <table class="datatable table table-striped table-bordered dt-responsive nowrap">
              <thead class="bg-light">
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                            @foreach($data as $row)
                              <tr>
                                <td>{{$loop->index+ 1}}</td>
                                <td class="text-center">
                                  <img src="{{ avatar() }}" alt="{{ $row->name ?? 'No Name' }}" width="50" height="50">
                                </td>
                                <td>
                                  {{ $row->name ?? 'No Name' }}
                                </td>
                                <td>
                                  {{$row->email}}
                                </td>
                                <td>
                                  {{$row->created_at}}
                                </td>
                                <td>
                                  <a href="{{url('store_detail')}}/{{$row->id}}" class="btn btn-primary btn-xs"><i class="fa fa-angle-double-right"></i></a>
                                </td>
                              </tr>
                          @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection