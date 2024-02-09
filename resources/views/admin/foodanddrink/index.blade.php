@extends('layouts.admin.master')
@section('title', 'Food And Drinks')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">food_drinks ({{ $food_drinks->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.food_drinks.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($food_drinks->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Order</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($food_drinks as $key => $food_drink)
                            <tr>
                                <td><strong>{{ $key + $food_drinks->firstItem() }}</strong></td>
                                <td><strong>{{ $food_drink->name ?? '' }}</strong></td>
                                <td>{{ $food_drink->type ?? '' }}</td>
                                <td>{{ $food_drink->order ?? '' }}</td>
                                <td>{{ $food_drink->price ?? '' }}</td>
                                <td>{{ $food_drink->description ?? '' }}</td>
                                <td class="">
                                    <a class="fancybox" data-fancybox="demo"
                                        href="{{ asset('admin/assets/img/food_drink/') }}/{{ $food_drink->image ?: 'avatar.png' }}">
                                        <img src="{{ asset('admin/assets/img/food_drink/') }}/{{ $food_drink->image ?: 'avatar.png' }}"
                                            alt="{{ $food_drink->title }}" width="80px">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.food_drinks.edit', $food_drink->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form"
                                        action="{{ route('admin.food_drinks.destroy', $food_drink->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_food_drink mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $food_drinks->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_food_drink').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
