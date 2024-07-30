@extends('client.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('uploads/images/' . $singer->image_path) }}" class="img-fluid w-100"
                                alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex align-items-top justify-content-between iq-music-play-detail">
                                <div class="music-detail">
                                    <h3>{{ $singer->name }}</h3>
                                    <p>Song · {{ count($singer->songs) }} Plays</p>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-primary iq-play mr-2">Play music</a>
                                    </div>
                                </div>
                                <div class="music-right">
                                    <div class="d-flex align-items-center">
                                        <div class="iq-circle mr-2 share"><a href="javascript:void();"><i
                                                    class="las la-share-alt-square text-primary"></i></a></div>
                                        <div class="iq-circle mr-2"><a href="javascript:void();"><i
                                                    class="ri-heart-fill  text-primary"></i></a></div>
                                        <div class="iq-circle">
                                            <a href="javascript:void();"><i class="las la-download text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    @if (count($singer->songs) > 0)
                        <ul class="list-unstyled iq-music-slide mb-0">
                            @foreach ($singer->songs as $song)
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
                                            <small>{{ $singer->name }}</small>
                                        </p>
                                        <p class="mb-0 col-2 col-md-2 iq-musc-icone">
                                            @if (auth()->user() && in_array($song->id, $playlist))
                                                <i class="ri-heart-fill font-size-20"></i>
                                            @else
                                                <i class="ri-heart-line font-size-20"></i>
                                            @endif
                                        </p>
                                        <p class="mb-0 col-2 col-md-2 iq-music-play">
                                            <i class="las la-play font-size-32"
                                                onclick="loadAndPlayTrack({{ $loop->index }})"></i>
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
                                                            @if (auth()->user() && in_array($song->id, $playlist))
                                                                <i class="ri-eye-fill mr-2"></i>Remove from playlist
                                                            @else
                                                                <i class="ri-eye-fill mr-2"></i>Add to playlist
                                                            @endif
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
                    @php
                        $songs = $singer->songs;
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection
