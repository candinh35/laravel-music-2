@extends('admin.layout')

@section('content')
    <!-- add song -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($song) ? 'Edit Song' : 'Add Song' }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <form class="form-validate" method="post" action="{{ $action }}" enctype="multipart/form-data">
            @isset($song)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label>Song Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control"
                    value="{{ isset($song->name) ? $song->name : '' }}">
            </div>
            <div class="form-group">
                <label for="singer">Singer <span class="text-danger">*</span></label>
                <select class="form-control" id="singer" name="singer_id">
                    <option value="">- - Empty - -</option>
                    @foreach ($singers as $singer)
                        <option @if (isset($song->singer_id) && $song->singer_id == $singer->id) selected @endif value="{{ $singer->id }}">
                            {{ $singer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="singer">Album</label>
                <select class="form-control" id="singer" name="album_id">
                    <option value="">- - Empty - -</option>
                    @foreach ($albums as $album)
                        <option @if (isset($song->album_id) && $song->album_id == $album->id) selected @endif value="{{ $album->id }}">
                            {{ $album->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="singer">Category</label>
                <select class="form-control" id="singer" name="category_id">
                    <option value="">- - Empty - -</option>
                    @foreach ($categories as $category)
                        <option @if (isset($song->category_id) && $song->category_id == $category->id) selected @endif value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Song Price</label>
                <input type="number" name="price" class="form-control"
                    value="{{ isset($song->price) ? $song->price : 0 }}">
            </div>
            <div class="form-group">
                <label>Song Image <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image_path"
                        accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label text-secondary" for="image_path">Choose image file</label>
                </div>
            </div>
            @if (isset($song->image_path))
                <div class="form-group">
                    <img src="{{ asset('uploads/images/' . $song->image_path) }}" width="100" height="100"
                        alt="">
                </div>
            @endif
            <div class="form-group">
                <label>Song Audio <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="music_path" id="music_path" accept=".mp3">
                    <label class="custom-file-label text-secondary" for="music_path">Choose music file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Song Introduction</label>
                <textarea class="form-control" name="introduction" rows="4">{{ isset($song->introduction) ? $song->introduction : '' }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="{{ route('songs.index') }}" class="text-white btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /add song -->
@endsection
