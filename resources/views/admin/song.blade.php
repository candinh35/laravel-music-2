@extends('admin.layout')

@section('content')
    <!-- song content -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Song List</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <a href="{{ route('songs.create') }}" class="btn btn-primary">Add New Song</a>
        </div>
    </div>
    <div class="iq-card-body">
        @if (session('success'))
            <x-success-alert />
        @endif
        <div class="table-responsive">
            @if (sizeof($songs) > 0)
                <table class="data-tables table" style="width:100%; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Song Image</th>
                            <th style="width: 15%;">Song Name</th>
                            <th style="width: 10%;">Singer</th>
                            <th style="width: 10%;">Album</th>
                            <th style="width: 10%;">Category</th>
                            <th class="text-right" style="width: 5%;">Price</th>
                            <th class="text-center" style="width: 5%;">Audio</th>
                            <th style="width: 50%;">Introduction</th>
                            <th style="width: 10%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($songs as $song)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('uploads/images/' . $song->image_path) }}"
                                        class="img-fluid avatar-50 rounded" alt="author-profile">
                                </td>
                                <td>{{ $song->name }}</td>
                                <td>{{ $song->singer->name }}</td>
                                <td>{{ isset($song->album->name) ? $song->album->name : '' }}</td>
                                <td>{{ isset($song->category->name) ? $song->category->name : '' }}</td>
                                <td class="text-right">{{ $song->price }}</td>
                                <td class="text-center">
                                    <audio controls>
                                        <source src="{{ asset('uploads/audios/' . $song->music_path) }}">
                                    </audio>
                                </td>
                                <td>
                                    <p class="mb-0"><?php echo $song['introduction']; ?></p>
                                </td>
                                <td class="text-center stick">
                                    <a href="{{ route('songs.edit', $song->id) }}" data-toggle="tooltip" title=""
                                        data-placement="bottom" class="btn text-center btn-outline-warning border-0 btn-sm"
                                        data-original-title="Edit">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('songs.destroy', $song->id) }}" method="post" class="d-inline">
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
                    {{ $songs->onEachSide(1)->withQueryString()->links() }}
                </div>
            @else
                <x-empty-data />
            @endif
        </div>
    </div>
@endsection
