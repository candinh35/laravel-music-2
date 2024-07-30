@extends('admin.layout')

@section('content')
    <!-- add album -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($album) ? 'Edit Album' : 'Add Album' }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <form class="form-validate" method="post" action="{{ $action }}" enctype="multipart/form-data">
            @isset($album)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label>Album Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control"
                    value="{{ isset($album->name) ? $album->name : '' }}">
            </div>
            <div class="form-group">
                <label for="singer">Album Singer <span class="text-danger">*</span></label>
                <select class="form-control" id="singer" name="singer_id">
                    <option value="">- - Empty - -</option>
                    @foreach ($singers as $singer)
                        <option @if (isset($album->singer_id) && $album->singer_id == $singer->id) selected @endif value="{{ $singer->id }}">
                            {{ $singer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Album Profile <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image_path"
                        accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label" for="image_path">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                @if (isset($album->image_path))
                    <img src="{{ asset('uploads/images/' . $album->image_path) }}" width="100" height="100"
                        alt="">
                @endif
            </div>
            <div class="form-group">
                <label>Album Description:</label>
                <textarea class="form-control" name="description" rows="4">{{ isset($album->description) ? $album->description : '' }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="{{ route('albums.index') }}" class="text-white btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /add album -->
@endsection
