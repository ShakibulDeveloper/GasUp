@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 right_contents">
  <div class="main_inner_content">


    @include('component.search')
    
    <div class="bredcrums">
      <ul>
        <li><a href="{{ route('new_order') }}" class="active">New Gas</a></li>
      </ul>
    </div>
    {{showFlash()}}
    <div class="row">
      <div class="col-sm-6 Details_Box">
        <div class="main_heading">
          <h3>New Gas</h3>
        </div>
      </div>
      <div class="col-sm-6 reject_box">
        <div class="validate_btns">
         
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-sm-12 card_pasport">
        <div class="inner_card">
          

            <form method="POST" action="{{ route('gas.store') }}">

                    @csrf

                    

                    <div class="form_box mt-3">
                        <input type="text" placeholder="Enter Gas Name" name="name" value="" class="form-control @error('name') is-invalid @enderror" required="required" id="name" required autocomplete="price">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                      


                    <div class="form_box mt-3">
                        <input type="number" placeholder="Enter Per Litre Price" name="price" value="" class="form-control @error('price') is-invalid @enderror" required="required" id="price" required autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>



                    <div class="form_box mt-3">

                        <div class="login_btn mt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('SUBMIT') }}
                            </button>
                        </div>
                    </div>

            </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection


