@extends('layouts.admin.master')
@section('title', 'Rooms')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">rooms ({{ $rooms->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.rooms.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($rooms->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Room Number</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Located Floor</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Short Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($rooms as $key => $room)
                            <tr>
                                <td><strong>{{ $key + $rooms->firstItem() }}</strong></td>
                                <td><strong>{{ $room->roomno ?? '' }}</strong></td>
                                <td>{{ $room->type ?? '' }}</td>
                                <td>{{ $room->price ?? '' }}</td>
                                <td>{{ $room->floor ?? '' }}</td>
                                <td>{{ $room->status ?? '' }}</td>
                                <td>{{ $room->order ?? '' }}</td>
                                <td>{{ $room->short_description ?? '' }}</td>
                                <td class="">
                                    <a class="fancybox" data-fancybox="demo"
                                        href="{{ asset('admin/assets/img/room/') }}/{{ $room->image ?: 'avatar.png' }}">
                                        <img src="{{ asset('admin/assets/img/room/') }}/{{ $room->image ?: 'avatar.png' }}"
                                            alt="{{ $room->title }}" width="80px">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.rooms.edit', $room->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('admin.rooms.destroy', $room->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_room mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rooms->links() }}
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
        $('.delete_room').click(function(e) {
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
