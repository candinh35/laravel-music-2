@extends('client.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">My playlist</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (count($songs) > 0)
                        <ul class="list-unstyled iq-music-slide mb-0">
                            @foreach ($songs as $song)
                                <li class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center row">
                                        <div class="media align-items-center col-8 col-md-5">
                                            <div class="iq-realese-song ">
                                                <a href="javascript:void(0);"><img
                                                        src="{{ asset('uploads/images/' . $song->image_path) }}"
                                                        class="img-border-radius avatar-60 img-fluid" alt=""></a>
                                            </div>
                                            <div class="media-body ml-3">
                                                <p class="mb-0">{{ $song->name }}</p>
                                            </div>
                                        </div>
                                        <p class="mb-0 col-md-2 col-md-2 iq-music-time">
                                            <small>{{ $song->singer->name }}</small>
                                        </p>
                                        <p class="mb-0 col-2 col-md-2 iq-musc-icone">
                                            <i class="ri-heart-fill font-size-20"></i>
                                        </p>
                                        <p class="mb-0 col-2 col-md-2 iq-music-play">
                                            <i class="las la-play font-size-32"  onclick="loadAndPlayTrack({{ $loop->index }})"></i>
                                        </p>
                                        <div
                                            class="iq-card-header-toolbar iq-music-drop d-flex align-items-center col-2 col-md-1">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton2"
                                                    data-toggle="dropdown" aria-expanded="false" role="button">
                                                    <i class="ri-more-2-fill text-primary"></i>
                                                </span>
                                                <div onclick="window.event.stopPropagation()"
                                                    class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenuButton2" style="">
                                                    <form method="post"
                                                        action="{{ route('client.playlist.update', $song->id) }}">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">
                                                            <i class="ri-eye-fill mr-2"></i>Remove from playlist
                                                        </button>
                                                    </form>
                                                    @if (auth()->user() && in_array($song->id, $transactions))
                                                        <a class="dropdown-item"
                                                            href="{{ asset('uploads/audios/' . $song->music_path) }}"
                                                            download="">
                                                            <i class="ri-file-download-fill mr-2"></i>Download
                                                        </a>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('client.transactions.update', $song->id) }}">
                                                            @csrf
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="ri-file-download-fill mr-2"></i>Purchase
                                                                {{ $song->price }} VND
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <x-empty-data />
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
