@extends('layouts.admin.master')
@section('title', 'Rooms')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Room "{{ $room->title }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.rooms.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.rooms.update', $room->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Number</label>
                                <input class="form-control @error('roomno') is-invalid @enderror" id=""
                                    type="text" value="{{ old('roomno', $room->roomno) }}" name="roomno" placeholder="">
                                @error('roomno')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Type</label>
                                <input class="form-control  @error('type') is-invalid @enderror" id=""
                                    type="text" value="{{ old('type', $room->type) }}" name="type" placeholder="">
                                @error('type')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" id=""
                                    type="number" name="price" value="{{ old('price', $room->price) }}"
                                    placeholder="Price of the room" autocomplete="off">
                                @error('price')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Floor</label>
                                <input class="form-control @error('floor') is-invalid @enderror" id=""
                                    type="text" name="floor" value="{{ old('floor', $room->floor) }}"
                                    placeholder="Floor" autocomplete="off">
                                @error('floor')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Status</label>
                                <div class="form-check">

                                    <input class=""form-check-input id=""
                                        @error('status') is-invalid @enderror" type="radio" name="status" value="booked"
                                        placeholder="" autocomplete="off"
                                        @if ($room->status == 'booked') {{ 'checked' }} @endif{{ '' }}>Booked
                                    <label class="form-check"></label>
                                </div>

                                <div class="form-check">
                                    <input class=""form-check-input id=""
                                        @error('status') is-invalid @enderror" type="radio" name="status" value="open"
                                        placeholder="" autocomplete="off"
                                        @if ($room->status == 'open') {{ 'checked' }} @endif{{ '' }}>Open
                                    <label class="form-check"></label>

                                </div>
                                @error('status')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Room Order</label>
                                <input class="form-control @error('order') is-invalid @enderror" id=""
                                    type="number" name="order" value="{{ old('order', $room->order) }}"
                                    placeholder="Order" autocomplete="off">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                    rows="8" placeholder="Description of the Room">{{ old('description', $room->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id=""
                                    name="short_description" rows="4" placeholder="Short Description of the room">{{ old('short_description', $room->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="form-label" for="basic-default-message">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror image" id=""
                                        type="file" name="image">
                                    <img class="view-image mt-2" src="" height="60" alt="">
                                    @if ($room->image)
                                        <img class="mt-2 old-image"
                                            src="{{ asset('admin/assets/img/room/' . $room->image) }}" width="100">
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i> Update</button>
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
