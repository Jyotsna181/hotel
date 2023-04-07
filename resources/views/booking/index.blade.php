@extends('layouts.master1')

@section('content')

<div class="container px-4">
    <div class="card mt-4">
        
        <div class="card-header">
            <h4 class="text-center"style="font-weight: 600; font-size: 2rem;">Booking History<a href="{{ url('/')}}" class="btn btn-primary float-right">Book Room</a>
            </h4>
        </div>
        <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class=" container table table-borderd">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Checkin Date</th>
                    <th>Checkout Date</th>
                    <th>Adults</th>
                    <th>Booking Status</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->checkin_date }}</td>
                        <td>{{ $booking->checkin_date }}</td>
                        <td>{{ $booking->adult }}</td>
                        <td>{{ $booking->booking_status }}</td>
                        <td>{{ $booking->total_cost }}</td>
                        <td>
                            <a href="{{ url('/viewbooking/'.$booking->id) }}" class="btn btn-success">View Booking</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection