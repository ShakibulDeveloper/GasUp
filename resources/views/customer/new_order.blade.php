@extends('admin.layouts.master')
@section('content')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Need Some Info before order.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="" action="{{ route('signup') }}" method="post">
          @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">Your Full Name</label>
              <input type="text" class="form-control" name="username"  placeholder="Username">
            </div>
            <div class="form-group col-md-6">

              <input type="hidden" class="form-control" name="email"  placeholder="Your Email" value="{{ Auth::user()->email }}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Your Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
          </div>
          <div class="form-group">
            <label for="inputAddress2">Your Address</label>
            <input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor">
          </div>
          <div class="form-group">

            <input type="hidden" class="form-control" name="password" placeholder="*********" value="{{ Auth::user()->password }}">
          </div>
          <button type="submit" class="btn btn-primary">Verify Now</button>
        </div>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="col-sm-9 right_contents">
  <div class="main_inner_content">

    <div class="bredcrums">
      <ul>
        <li><a href="{{ route('new_order') }}" class="active">New Order</a></li>
      </ul>
    </div>
    {{showFlash()}}
    <div class="row">
      <div class="col-sm-6 Details_Box">
        <div class="main_heading">
          <h3>New Order</h3>
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


            <form method="POST" action="{{ route('new.order.store') }}">


                @csrf
                <input type="hidden" id="get_gas_price" value="{{ route('gas.get.price') }}">
                <input type="hidden" id="calc_gas_price" value="{{ route('calc.gas.price') }}">


                 <div class="form_box mt-3">
                        <input type="text" placeholder="Enter Name" name="name" value="" class="form-control @error('name') is-invalid @enderror" required id="name" required autocomplete="name">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="form_box mt-3">

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
                        <input type="text" placeholder="dd-mm-yyyy"  name="date" class="form-control" required id="date">

                    </div>

                    <div class="form_box mt-3">
                        <label>Tank Size</label>
                        <select class="form-control" name="tank">
                          <option value="14KG">14KG</option>
                          <option value="12KG">12KG</option>
                          <option value="10KG">10KG</option>
                        </select>
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
                        <textarea placeholder="Enter address" name="address" class="form-control @error('address') is-invalid @enderror" required id="address" required autocomplete="address">{{ Auth::user()->email }}</textarea>

                        @error('litre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


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
                          @if ($marge_validation_check == 0)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Verify before submit
                            </button>
                            @else
                              <button type="submit" class="btn btn-primary">
                                  {{ __('SUBMIT') }}
                              </button>
                          @endif
                        </div>
                    </div>

            </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection                                                                                                                                                                                                                                                                   
