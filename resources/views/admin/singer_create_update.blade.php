@extends('admin.layout')

@section('content')
    <!-- add singer -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($singer) ? 'Edit Singer' : 'Add Singer' }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <form class="form-validate" method="post" action="{{ $action }}" enctype="multipart/form-data">
            @isset($singer)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label>Singer Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control"
                    value="{{ isset($singer->name) ? $singer->name : '' }}">
            </div>
            <div class="form-group">
                <label>Singer Date Of Birth</label>
                <input type="date" name="dob" class="form-control"
                    value="{{ isset($singer->dob) ? $singer->dob : '' }}">
            </div>
            <div class="form-group">
                <label>Singer Profile <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image"
                        accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label" for="image">Choose
                        file</label>
                </div>
            </div>
            @if (isset($singer->image_path))
                <div class="form-group">
                    <img src="{{ asset('uploads/images/' . $singer->image_path) }}" width="100" height="100"
                        alt="">
                </div>
            @endif
            <div class="form-group">
                <label>Singer Introduction</label>
                <textarea class="form-control" name="introduction" rows="4">{{ isset($singer->introduction) ? $singer->introduction : '' }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="{{ route('singers.index') }}" class="text-white btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /add singer -->
@endsection
