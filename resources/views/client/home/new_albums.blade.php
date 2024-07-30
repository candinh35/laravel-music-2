<div class="col-lg-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Feature Albums</h4>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b class="mb-0 text-primary"><a href="{{ route('client.albums') }}">View More <i
                            class="las la-angle-right"></i></a></b>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="list-unstyled row iq-box-hover mb-0">
                @foreach ($albums as $album)
                    <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-thumb">
                                    <div class="iq-music-overlay"></div>
                                    <a href="{{ route('client.albums.detail', $album->id) }}">
                                        <img src="{{ asset('uploads/images/' . $album->image_path) }}"
                                            style="object-fit: cover;" class="img-border-radius img-fluid w-100"
                                            alt="">
                                    </a>
                                    <div class="overlay-music-icon">
                                        <a href="{{ route('client.albums.detail', $album->id) }}">
                                            <i class="las la-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="feature-list text-center">
                                    <h6 class="font-weight-600  mb-0">{{ $album->name }}</h6>
                                    <p class="mb-0">{{ $album->singer->name }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
