@extends('admin.layout')

@section('content')
    <!-- category view -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Category List</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
    </div>
    <div class="iq-card-body">
        @if (session('success'))
            <x-success-alert />
        @endif
        <div class="table-responsive">
            @if (sizeof($categories) > 0)
                <table class="data-tables table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Song Category</th>
                            <th width="65%">Category Description</th>
                            <th class="text-center" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <p class="mb-0">{{ $category->description }}</p>
                                </td>
                                <td class="text-center stick">
                                    <a href="{{ route('categories.edit', $category->id) }}" data-toggle="tooltip"
                                        title="" data-placement="bottom"
                                        class="btn btn-outline-warning border-0 btn-sm text-center"
                                        data-original-title="Edit">
                                        <span class="btn-icon-wrapper opacity-8 text-center">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-hover-shine text-center btn-outline-danger border-0 btn-sm"
                                            href="" type="submit" data-toggle="tooltip" title=""
                                            data-placement="bottom"
                                            onclick="return confirm('Do you really want to delete this item?')"
                                            data-original-title="Delete">
                                            {{-- <span class="btn-icon-wrapper opacity-8 text-center"> --}}
                                            <i class="fa fa-trash fa-w-20"></i>
                                            {{-- </span> --}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center align-item-center" style="width: 100%">
                    {{ $categories->onEachSide(1)->withQueryString()->links() }}
                </div>
            @else
                <x-empty-data />
            @endif
        </div>
    </div>
    <!-- /category view -->
@endsection
