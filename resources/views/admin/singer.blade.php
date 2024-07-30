@extends('admin.layout')

@section('content')
    <!-- singer view -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Singer Lists</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <a href="{{ route('singers.create') }}" class="btn btn-primary">Add New Singer</a>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <div class="table-responsive">
            @if (sizeof($singers) > 0)
                <table class="data-tables table" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 5%;">Profile</th>
                            <th style="width: 15%;">Singer Name</th>
                            <th style="width: 15%;" class="text-center">Date Of Birth</th>
                            <th style="width: 50%;">Singer Description</th>
                            <th style="width: 10%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($singers as $singer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/images/' . $singer->image_path) }}"
                                        class="img-fluid avatar-50 rounded" alt="author-profile">
                                </td>
                                <td>{{ $singer->name }}</td>
                                <td class="text-center">{{ isset($singer->dob) ? formatDate($singer->dob) : '' }}</td>
                                <td>
                                    <p class="mb-0">{{ $singer->introduction }}</p>
                                </td>
                                <td class="text-center stick">
                                    <a href="{{ route('singers.edit', $singer->id) }}" data-toggle="tooltip" title=""
                                        data-placement="bottom" class="btn text-center btn-outline-warning border-0 btn-sm"
                                        data-original-title="Edit">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('singers.destroy', $singer->id) }}" method="post"
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center align-item-center" style="width: 100%">
                    {{ $singers->onEachSide(1)->withQueryString()->links() }}
                </div>
            @else
                <x-empty-data />
            @endif
        </div>
    </div>
    <!-- /singer view -->
@endsection
