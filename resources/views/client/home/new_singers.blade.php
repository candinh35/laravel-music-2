<div class="col-lg-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center">
            <div class="iq-header-title">
                <h4 class="card-title">Popular Singers</h4>
            </div>
            <div id="feature-album-artist-slick-arrow" class="slick-aerrow-block"></div>
        </div>
        <div class="iq-card-body">
            <ul class="list-unstyled row feature-album-artist mb-0">
                @isset($singers)
                    @foreach ($singers as $singer)
                        <li class="col-lg-2  iq-music-box">
                            <div style="height:200px" class="iq-thumb-artist">
                                <div class="iq-music-overlay"></div>
                                <a href="{{ route('client.singers.detail', $singer->id) }}">
                                    <img style="object-fit: cover;"
                                        src="{{ asset('uploads/images/' . $singer->image_path) }}"
                                        class="w-100 h-100 img-fluid" alt="">
                                </a>
                                <div class="overlay-music-icon">
                                    <a href="{{ route('client.singers.detail', $singer->id) }}">
                                        <i class="las la-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="feature-list text-center">
                                <h6 class="font-weight-600  mb-0">{{ $singer->name }}</h6>
                            </div>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
