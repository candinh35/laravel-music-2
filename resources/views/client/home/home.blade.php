@extends('client.layout')

@section('content')
    <div class="row">
        <!-- New Song -->
        @include('client.home.new_songs')
        <!-- FeatureAlbums -->
        @include('client.home.new_albums')
        <!-- Popular singer -->
        @include('client.home.new_singers')
    </div>
@endsection
