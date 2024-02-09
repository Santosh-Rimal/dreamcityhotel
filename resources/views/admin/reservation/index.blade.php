@extends('layouts.admin.master')
@section('title', 'Reservations')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">reservations ({{ $reservations->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.reservations.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($reservations->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Room Type</th>
                            <th>Room Quantity</th>
                            <th>Check in Date</th>
                            <th>Check out Date</th>
                            <th>Airport pickup?</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($reservations as $key => $reservation)
                            <tr>
                                <td><strong>{{ $key + $reservations->firstItem() }}</strong></td>

                                <td><strong>{{ $reservation->name ?? '' }}</strong></td>
                                <td>{{ $reservation->phone ?? '' }}</td>
                                <td>{{ $reservation->email ?? '' }}</td>
                                <td>{{ $reservation->country ?? '' }}</td>
                                <td>.{{ $reservation->roomtype ?? '' }}({{ $reservation->type ?? '' }})</td>
                                <td>{{ $reservation->quantity ?? '' }}</td>
                                <td>{{ $reservation->checkindate ?? '' }}</td>
                                <td>{{ $reservation->checkoutdate ?? '' }}</td>
                                <td>{{ $reservation->airportpickup ?? '' }}</td>
                                <td>{{ $reservation->message ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.reservations.edit', $reservation->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form"
                                        action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_blog mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $reservations->links() }}
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
        $('.delete_blog').click(function(e) {
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
