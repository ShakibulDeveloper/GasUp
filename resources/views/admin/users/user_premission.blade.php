@extends('admin.layouts.master')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      {{showFlash()}}
      <form action="{{url('/assignpermissiontorole')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header card_header_bg">
                  <h6 class="mb-0">Assign Permission to Role</h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                         <label>Role</label>
                         <select name="role_id" required="" class="form-control" onChange="window.location='{{url('adduserpermissions')}}/'+this.value">
                           <option value="0">--select role--</option>
                           @if(!empty($userroles))
                              @foreach($userroles as $key=>$value)
                                <option @isset($role_id){{$role_id == $value->id ? 'selected':''}}@endisset
                                  @isset($value->name){{$value->name}}@endisset value="@isset($value->id){{$value->id}}@endisset">
                                  @isset($value->name){{ucfirst($value->name)}}@endisset
                                </option>
                              @endforeach
                           @endif
                         </select>
                      </div>
                    </div>
                    <!-- <div class="col-sm-2">
                      <button style="margin-top: 32px;" type="submit" class="btn btn-primary">Save</button>
                    </div> -->
                </div>               
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:15px">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header card_header_bg">
                <h6 class="mb-0">Set permissions of selected role</h6>
              </div>
              <div class="card-body">   
                <div class="row">
                  <div class="col-sm-12">
                    <table  class="table table-bordered" style="width:100%">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0"></th>
                          @if(!empty($permissions))
                            @foreach($permissions as $value)
                              <th>@isset($value){{$value}}@endisset</th>
                            @endforeach
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @if(!empty($modules))
                          @foreach($modules as $module)
                            <tr>
                              <td>@isset($module->module_name){{$module->module_name}}@endisset</td>
                              @if(!empty($permissions))
                              @php $index = 1; @endphp
                                @foreach($permissions as $value)
                                  <td>
                                    @if(isset($module->permissionss[$index]))
                                      @php 
                                         $permissionss_id = $module->permissionss[$index]->id;
                                      @endphp
                                      @if(isset($module->permissionss[$index]->flag) && $module->permissionss[$index]->flag == 1)
                                       <input name="permissionss[{{$permissionss_id}}]" value="@isset($permissionss_id){{$permissionss_id}}@endisset" checked type="checkbox" class="js-switch1">
                                      @else
                                        <input name="permissionss[{{$permissionss_id}}]" value="@isset($permissionss_id){{$permissionss_id}}@endisset" type="checkbox" class="js-switch1">
                                      @endif
                                    @endif
                                  </td>
                                  @php $index++ @endphp
                                @endforeach
                              @endif
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-info">Assign Permission</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>
@endsection