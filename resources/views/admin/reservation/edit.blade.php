@extends('layouts.admin.master')
@section('title', 'Reservations')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Reservation "{{ $reservation->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.reservations.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Customer Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id=""
                                    type="text" name="name" value="{{ old('name', $reservation->name) }}"
                                    placeholder="">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Phone Number</label>
                                <input class="form-control @error('phone') is-invalid @enderror" id=""
                                    type="number" name="phone" value="{{ old('phone', $reservation->phone) }}"
                                    placeholder="">
                                @error('phone')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id=""
                                    type="text" name="email" value="{{ old('email', $reservation->email) }}"
                                    placeholder="">
                                @error('email')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Your Country</label>
                                <input class="form-control @error('country') is-invalid @enderror" id=""
                                    type="text" name="country" value="{{ old('country', $reservation->country) }}"
                                    placeholder="">
                                @error('country')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Type</label>
                                <select class="form-control" name="type">
                                    <option value="{{ $reservation->type }}" selected>{{ $reservation->roomtype }}
                                    </option>

                                    <option value="{{ $reservation->types }}">{{ $reservation->roomtypes }}</option>

                                </select>
                                @error('type')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Quantity of Room</label>
                                <input class="form-control @error('quantity') is-invalid @enderror" id=""
                                    type="number" name="quantity" value="{{ old('quantity', $reservation->quantity) }}"
                                    placeholder="" autocomplete="off">
                                @error('quantity')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Check in Date</label>
                                <input class="form-control flatpicker @error('checkindate') is-invalid @enderror"
                                    id="" type="text" name="checkindate"
                                    value="{{ old('checkindate', $reservation->checkindate) }}" placeholder=""
                                    autocomplete="off">
                                @error('checkindate')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Check out Date</label>
                                <input class="form-control flatpicker @error('checkoutdate') is-invalid @enderror"
                                    id="" type="text" name="checkoutdate"
                                    value="{{ old('checkoutdate', $reservation->checkoutdate) }}" placeholder=""
                                    autocomplete="off">
                                @error('checkoutdate')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Airport Pickup?</label>

                                <div class="form-check">
                                    <input class="form-check-input" id="radio2" type="radio" name="airportpickup"
                                        value="yes" @if ($reservation->airportpickup == 'yes') checked @endif>Yes
                                    <label></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="airportpickup"
                                        value="no"@if ($reservation->airportpickup == 'no') checked @endif>No
                                    <label class="form-check-label"></label>
                                </div>
                                @error('airportpickup')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Message</label>
                                <input class="form-control  @error('message') is-invalid @enderror" id=""
                                    type="text" name="message" value="{{ old('message', $reservation->message) }}"
                                    placeholder="" autocomplete="off">
                                @error('message')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                        Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".image").change(function() {
            input = this;
            var nthis = $(this);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    nthis.siblings('.old-image').hide();
                    nthis.siblings('.view-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
