@extends('layouts.master1')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
	<a class=" float-right" href="{{route('bookings.view')}}">Go to Dashboard</a>
						
				<div class="row" >
					<div class="booking-form">
						<div class="form-header">
							<h1>Your Booking Details</h1>
						</div>
						<form style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 80%; margin: auto;">
							<div class="row">
                                <div class="col-md-4">
									<div class="form-inline">
										<span class="form-label">Name</span>
										<input class="form-control" type="text" value="{{ $booking->name }}" readonly>
									</div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">Email</span>
										<input class="form-control" type="text" value="{{ $booking->email }}" readonly>
									</div>
								</div>
								<div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">Phone</span>
										<input class="form-control" type="text" value="{{ $booking->phone }}" readonly>
									</div>
								</div>
							</div>
                            <div class="row">
                            @if($booking->no_room_1 > 0)
                                <div class="col-md-6"> 
                                    <div class="form-inline">
                                        <span class="form-label">Room Type</span>
                                        <input class="form-control" type="text" value="{{ $booking->room_type_1 }}" readonly >
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-inline">
                                        <span class="form-label">Number of Rooms</span>
                                        <input class="form-control" type="text" value="{{ $booking->no_room_1}}" readonly >
                                    </div>
                                </div>
                            @endif
                            @if($booking->no_room_2 > 0)
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Room Type</span>
										<input class="form-control" type="text" value="{{ $booking->room_type_2 }}" readonly >
									</div>
								</div>
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Number of Rooms</span>
										<input class="form-control" type="text" value="{{ $booking->no_room_2}}" readonly >
									</div>
								</div>
                            @endif
                            @if($booking->no_room_3 > 0)
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Room Type</span>
										<input class="form-control" type="text" value="{{ $booking->room_type_3 }}" readonly >
									</div>
								</div>
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Number of Rooms</span>
										<input class="form-control" type="text" value="{{ $booking->no_room_3}}" readonly >
									</div>
								</div>
                            @endif
                            @if($booking->no_room_4 > 0) 
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Room Type</span>
										<input class="form-control" type="text" value="{{ $booking->room_type_4 }}" readonly >
									</div>
								</div>
                                <div class="col-md-6"> 
                                    <div class="form-inline">
										<span class="form-label">Number of Rooms</span>
										<input class="form-control" type="text" value="{{ $booking->no_room_4}}" readonly >
									</div>
								</div>
                            @endif
                            </div>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-inline">
										<span class="form-label">Check In</span>
                                        <input class="form-control" type="date" name="checkin_date" value="{{ $booking->checkin_date }}" readonly >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-inline">
										<span class="form-label">Check out</span>
										<input class="form-control" type="date" value="{{ $booking->checkout_date }}" readonlyrequired>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-inline">
										<span class="form-label">No of rooms</span>
										    <option value="{{ $booking->no_room_1 + $booking->no_room_2 + $booking->no_room_3 + $booking->no_room_4 }}" readonly>{{ $booking->no_room_1 + $booking->no_room_2 + $booking->no_room_3 + $booking->no_room_4 }}</option>
									</div>
								</div>
								<div class="col-md-3">
                                    <div class="form-inline">
										<span class="form-label">Adults</span>
										    <option value="{{ $booking->adult }}" readonly>{{ $booking->adult }}</option>
                                    </div>
								</div>
                                <div class="col-md-3">
                                    <div class="form-inline">
										<span class="form-label">Meal Plan</span>
										    <option value="{{ $booking->mealplan }}" readonly>{{ $booking->mealplan }}</option>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-4">
									<div class="form-inline">
										<span class="form-label">Booking Status</span>
										<input class="form-control" type="text" value="{{ $booking->booking_status }}" readonly>
									</div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">Booking Source</span>
										<input class="form-control" type="text" value="{{ $booking->booking_source }}" readonly>
									</div>
								</div>
								<div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">Booking Type</span>
										<input class="form-control" type="text" value="{{ $booking->booking_type }}" readonly>
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-4">
									<div class="form-inline">
										<span class="form-label">Net Cost</span>
										<input class="form-control" type="text" value="{{ $booking->cost }}" readonly>
									</div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">GST</span>
										<input class="form-control" type="text" value="{{ $booking->gst }}" readonly>
									</div>
								</div>
								<div class="col-md-4"> 
                                    <div class="form-inline">
										<span class="form-label">Payment Amout</span>
										<input class="form-control" type="text" value="{{ $booking->total_cost }}" readonly>
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
    </div>
</div>
@endsection