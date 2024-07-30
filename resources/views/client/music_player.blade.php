<!-- Footer -->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="player row">
                    <audio src="" id="audio" style="display: none !important;"></audio>
                    <div class="details col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="now-playing"></div>
                        <div class="track-art"></div>
                        <div>
                            <div class="track-name">No tracks found</div>
                            <div class="track-artist">- - - - - - - - - - - - - -</div>
                        </div>
                    </div>
                    <div class="slider_container slider_music col-sm-5 col-md-4 col-lg-4">
                        <div class="current-time">00:00</div>
                        <input type="range" min="1" max="100" value="0" class="seek_slider"
                            onchange="seekTo()">
                        <div class="total-duration">00:00</div>
                    </div>
                    <div class="buttons col-6  col-sm-3 col-md-2  col-lg-2">
                        <div class="prev-track"><i class="fa fa-step-backward fa-2x"></i></div>
                        <div class="playpause-track"><i class="fa fa-play-circle fa-3x"></i></div>
                        <div class="next-track"><i class="fa fa-step-forward fa-2x"></i></div>
                    </div>
                    <div class="slider_container sound col-sm-6 col-md-2  col-lg-2">
                        <i class="fa fa-volume-down"></i>
                        <input type="range" min="1" max="100" value="99" class="volume_slider"
                            onchange="setVolume()">
                        <i class="fa fa-volume-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
