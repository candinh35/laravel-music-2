@extends('client.layout')

@section('content')
    <div class="row">
        @if (count($songs) > 0 || count($singers) > 0)
            @if (count($songs) > 0)
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Songs</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="list-unstyled iq-music-slide mb-0">
                                @foreach ($songs as $song)
                                    <li class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center row">
                                            <div class="media align-items-center col-8 col-md-5">
                                                <div class="iq-realese-song ">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ asset('uploads/images/' . $song->image_path) }}"
                                                            class="img-border-radius avatar-60 img-fluid"
                                                            alt=""></a>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <p class="mb-0">{{ $song->name }}</p>
                                                </div>
                                            </div>
                                            <p class="mb-0 col-md-2 col-md-2 iq-music-time">
                                                <small>{{ $song->singer->name }}</small>
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
                                                                    {{ $song->price }}
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
                        </div>
                    </div>
                </div>
            @endif
            @if (count($singers) > 0)
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Singers</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="list-unstyled row iq-box-hover mb-0">
                                @foreach ($singers as $singer)
                                    <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                                        <a href="{{ route('client.singers.detail', $singer->id) }}">
                                            <div class="iq-card">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <div class="iq-music-overlay"></div>
                                                        <img src="{{ asset('uploads/images/' . $singer->image_path) }}"
                                                            style="object-fit: cover;"
                                                            class="img-border-radius img-fluid w-100" alt="">
                                                    </div>
                                                    <div class="feature-list text-center">
                                                        <h6 class="font-weight-600  mb-0">{{ $singer->name }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <x-empty-data />
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
