<div class="col-lg-12">
    <div class="iq-card iq-realease">
        <div class="iq-card-header d-flex justify-content-between border-0">
            <div class="iq-header-title">
                <h4 class="card-title">New Realeases</h4>
            </div>
        </div>
        <div class="iq-card-body  iq-realeses-back">
            <div class="row">
                <div class="col-lg-5 iq-realese-box ">
                    <div class="iq-music-img">
                        <div class="equalizer">
                            <span class="bar bar-1"></span>
                            <span class="bar bar-2"></span>
                            <span class="bar bar-3"></span>
                            <span class="bar bar-4"></span>
                            <span class="bar bar-5"></span>
                        </div>
                    </div>
                    <!-- dashboard player -->
                    <div class="player row">
                        <div class="details1 music-list col-6 col-sm-6 col-lg-6">
                            <div class="now-playing"></div>
                            <div class="track-art"></div>
                            <div>
                                <div class="track-name">No tracks found</div>
                                <div class="track-artist">--------------</div>
                            </div>
                        </div>
                        <div class="buttons1 col-6 col-sm-2 col-lg-3">
                            <div class="prev-track"><i class="fa fa-step-backward fa-2x"></i></div>
                            <div class="playpause-track"><i class="fa fa-play-circle fa-3x"></i></div>
                            <div class="next-track"><i class="fa fa-step-forward fa-2x"></i></div>
                        </div>
                    </div>
                    <!-- /dashboard player -->
                </div>
                <div class="col-lg-7">
                    <ul id="list-song" class="list-unstyled iq-song-slide mb-0 realeases-banner">
                        @if (isset($songs))
                            @foreach ($songs as $song)
                                <li class="row song">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="media align-items-center col-10 col-md-5">
                                            <div class="iq-realese-song ">
                                                <a href="music-player.html">
                                                    <img src="{{ asset('uploads/images/' . $song->image_path) }}"
                                                        class="img-border-radius avatar-60 img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body text-white ml-3">
                                                <p class="mb-0 iq-music-title">{{ $song->name }}</p>
                                                <small>{{ $song->singer->name }}</small>
                                            </div>
                                        </div>
                                        <p class="mb-0 col-2 col-md-2">
                                            <i onclick="loadAndPlayTrack({{ $loop->index }})"
                                                class="las la-play font-size-24"></i>
                                        </p>
                                        <p class="mb-0 col-md-2 col-md-2 iq-musc-icone">
                                            @if (auth()->user() && in_array($song->id, $playlist))
                                                <i class="ri-heart-fill font-size-20"></i>
                                            @else
                                                <i class="ri-heart-line font-size-20"></i>
                                            @endif
                                        </p>
                                        <div
                                            class="iq-card-header-toolbar iq-music-drop d-flex align-items-center col-2 col-md-1">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton2"
                                                    data-toggle="dropdown" aria-expanded="false" role="button">
                                                    <i class="ri-more-2-fill text-primary"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right"
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
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
