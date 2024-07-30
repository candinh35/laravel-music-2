@extends('client.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Singers</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if (isset($singers))
                        <ul class="list-unstyled row iq-box-hover mb-0">
                            @foreach ($singers as $singer)
                                <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                                    <a href="{{ route('client.singers.detail', $singer->id) }}">
                                        <div class="iq-card">
                                            <div class="iq-card-body p-0">
                                                <div class="iq-thumb">
                                                    <div class="iq-music-overlay"></div>
                                                    <img src="{{ asset('uploads/images/' . $singer->image_path) }}"
                                                        style="object-fit: cover;" class="img-border-radius img-fluid w-100"
                                                        alt="">
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
                    @else
                        <x-empty-data />
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
