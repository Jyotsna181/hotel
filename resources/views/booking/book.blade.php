@extends('layouts.master1')

@section('content')
    <div class="container px-4">
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
        @endif
                <div class="card mt-4">
                    <div class="card-heading"><h2 class="text-center m-4">Book a Room</h2></div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('bookings.store')}}">
                            @csrf
                                <div class="row mb-4">
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label col-md-4">Room Type</label>
                                        <div class="form-inline" id="add-me">
                                            <select id="room-type-select" name="room_type_1" class="form-select col-md-4" required>
                                                <option value="">Select a room type</option>
                                                @foreach($rooms as $room)
                                                
                                                <option value="{{ $room->name }} - {{ $room->price }} - {{ $room->gst }}">{{ $room->name }} - {{ $room->price }} - {{ $room->gst }}</option>
                                                @endforeach
                                            </select>
                                            <input type="number" value="0" class="form-control mb-2 m-sm-2 col-md-4" name="no_room_1" required onchange="calculatePrice(this)">
                                            <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_input" hidden>
                                            <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_gst" hidden>
                                        </div>
                                        <a class="btn btn-primary m-2 text-light" id="add-room-link">Add Room</a>
                                      
                                        <div id="room-container"></div>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="">Booking Status</label>
                                       <div class="form-inline">
                                        <div class="form-check m-2">
                                                <input class="form-check-input"value="Confirm Booking"type="radio" name="booking_status" id="flexRadioDefault1" required>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Confirm Booking
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Hold Booking" name="booking_status" id="flexRadioDefault2" checked required>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Hold Booking
                                                </label>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="input-prepend input-append col-md-4">
                                        <label for="">Booking Source</label>
                                        <div class="form-inline ">
                                            <select id="" name="booking_source" class="form-select" required>
                                                <option value="Direct">Direct</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="name">Source Type</label>
                                            <input type="text" class="form-control" id="name" name="booking_type" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="mb-3 col-md-12">
                                      <label for="" class="form-label">Special Note</label>
                                      <textarea class="form-control" name="note" id="" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="checkin_date">Check-in Date:</label>
                                            <input type="date" class="form-control" id="checkin_date" value="{{ old('checkin_date', request('checkin_date')) }}" name="checkin_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="checkout_date">Check-out Date:</label>
                                            <input type="date" class="form-control" id="checkout_date" value="{{ old('checkout_date', request('checkout_date')) }}" name="checkout_date" required>
                                        </div>
                                    </div>
                                </div>
                               <div class="row mb-4">
                                    <div class="input-prepend input-append col-md-4">
                                        <label for="total_price">Discount:</label>
                                        <div class="form-inline">
                                            <input class="span2 form-control" type="number" id="discount-amount" placeholder="Enter percentage amount">
                                            <span class="add-on form-control" id="discount-percent">%</span>
                                            <a style="cursor:pointer;" id="getprice">Add Discount</a>
                                        </div>
                                    </div>
                                    <div class="input-prepend input-append col-md-4">
                                        <label for="">Meal plan</label>
                                        <div class="form-inline">
                                        <select name="mealplan" class="form-select">
                                            <option value="In lounge">In Lounge</option>
                                            <option value="Room Only">Room Only</option>
                                        </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Adults</label>
                                        <input class="span2 form-control" value="{{ old('adult', request('adult')) }}" name="adult" type="number">
                                            
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="total_price">Net Cost:</label>
                                            <input type="number" class="form-control" id="cost" name="cost" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="total_price">Total GST:</label>
                                        <input type="number" class="form-control" id="gst" name="gst" readonly required>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="total_price">Total Discount:</label>
                                        <input type="number" class="form-control" id="discount-amount-display" name="discount" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="total_price">Total Price:</label>
                                        <input type="number" class="form-control" id="payable-amount" name="total_cost" readonly required>
                                    </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </form>
                        </div>
                     </div>
                </div>
            </div>
        
    </div>
@endsection
