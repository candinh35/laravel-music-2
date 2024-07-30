@extends('admin.layout')

@section('content')
    <!-- add-category view -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <form class="form-validate" method="post" action="{{ $action }}">
            @isset($category)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label>Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control"
                    value="@isset($category->name){{ $category->name }}@endisset">
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="description" rows="4" s>{{ isset($category->description) ? $category->description : '' }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="{{ route('categories.index') }}" class="text-white btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>
    <!-- /add-category view -->
@endsection
