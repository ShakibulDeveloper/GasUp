@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 right_contents">
  <div class="main_inner_content">

    @include('component.search')
    
    <div class="bredcrums">
      <ul>
        <li>Delivery Order</li>
      </ul>
    </div>
    {{showFlash()}}
    <div class="row">
      <div class="col-sm-6 Details_Box">
        <div class="main_heading">
          <h3>Delivery Order</h3>
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
          

            <form method="POST" action="{{ route('recent_delivery_store') }}">

                @csrf
                      
                    <div class="form_box">

                        <select name="gas" id="gas" class="form-control" onchange="getGasPrice(this)" required>

                            @foreach (gases() as $gas)
                                <option value="{{ $gas->name }}">{{ $gas->name }}</option>
                            @endforeach

                        </select>

                        @error('gas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>



                    <div class="form_box mt-3">
                        <input type="number" placeholder="Enter Litre" min="1" name="litre" value="1" class="form-control @error('litre') is-invalid @enderror" required id="litre" required autocomplete="litre">

                        @error('litre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="form_box mt-3">
                        <input type="number" placeholder="Calculated Price" disabled name="price" value="" class="form-control @error('price') is-invalid @enderror" required id="price" required autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <button type="button" class="btn-sm btn-primary mt-2" onclick="CalculatePrice()">Calculate</button>


                    <div class="form_box mt-3">

                        <select name="payment_status" id="" class="form-control" required>
                            <option value="Due">Due</option>
                            <option value="Paid">Paid</option>
                        </select>

                        @error('payment_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

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


