@extends('admin.layout')

@section('content')
    <!-- user content -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">User List</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <div class="table-responsive">
            @if (sizeof($users) > 0)
                <table class="data-tables table" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Name</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">Phone number</th>
                            <th style="width: 10%;" class="text-right">Wallet</th>
                            <th style="width: 10%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phonenumber }}</td>
                                <td class="text-right">{{ $user->wallet }}</td>
                                <td class="text-center stick">
                                    <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" title=""
                                        data-placement="bottom" class="btn text-center btn-outline-warning border-0 btn-sm"
                                        data-original-title="Edit">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    @if ($user->role == 0)
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                href="" type="submit" data-toggle="tooltip" title=""
                                                data-placement="bottom"
                                                onclick="return confirm('Do you really want to delete this item?')"
                                                data-original-title="Delete">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-trash fa-w-20"></i>
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center align-item-center" style="width: 100%">
                    {{ $users->onEachSide(1)->withQueryString()->links() }}
                </div>
            @else
                <x-empty-data />
            @endif
        </div>
    </div>
@endsection
