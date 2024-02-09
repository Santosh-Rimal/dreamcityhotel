@extends('layouts.admin.master')
@section('title', 'Food And Drink')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit food or drink "{{ $food_drink->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.food_drinks.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.food_drinks.update', $food_drink->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id=""
                                    type="text" value="{{ old('name', $food_drink->name) }}" name="name"
                                    placeholder="">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname"> Type</label>
                                <input class="form-control  @error('type') is-invalid @enderror" id=""
                                    type="text" value="{{ old('type', $food_drink->type) }}" name="type"
                                    placeholder="">
                                @error('type')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname"> Order</label>
                                <input class="form-control @error('order') is-invalid @enderror" id=""
                                    type="number" name="order" value="{{ old('order', $food_drink->order) }}"
                                    placeholder="Order" autocomplete="off">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" id=""
                                    type="number" name="price" value="{{ old('price', $food_drink->price) }}"
                                    placeholder="Price of the fooddrink" autocomplete="off">
                                @error('price')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                        rows="8" placeholder="Description of the fooddrink">{{ old('description', $food_drink->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-default-message">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror image"
                                            id="" type="file" name="image">
                                        <img class="view-image mt-2" src="" height="60" alt="">
                                        @if ($food_drink->image)
                                            <img class="mt-2 old-image"
                                                src="{{ asset('admin/assets/img/food_drink/' . $food_drink->image) }}"
                                                width="100">
                                        @endif
                                        @error('image')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                Update</button>
                        </div>

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
