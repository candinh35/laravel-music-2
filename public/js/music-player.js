let now_playing = $(".now-playing");
let track_art = $(".track-art");
let track_name = $(".track-name");
let track_artist = $(".track-artist");

let playpause_btn = $(".playpause-track");
let next_btn = $(".next-track");
let prev_btn = $(".prev-track");

let seek_slider = document.querySelector(".seek_slider");
let volume_slider = document.querySelector(".volume_slider");
let curr_time = document.querySelector(".current-time");
let total_duration = document.querySelector(".total-duration");

let track_index = 0;
let isPlaying = false;
let updateTimer;

// Create new audio element
let curr_track = document.createElement('audio');

// A $( document ).ready() block.
$( document ).ready(function() {
    hanldePlayerBtn();
});

function hanldePlayerBtn() {
  $(".iq-music-time").set

  $(".prev-track").click(function () {
    prevTrack();
  });

  $(".playpause-track").click(function () {
    playpauseTrack()
  });

  $(".next-track").click(function () {
    nextTrack()
  })
}

let track_list = [];

console.log(songList);
console.log(publicPath);

songList.map(item =>{
    let track = {}
    track.name = item.name;
    track.artist = item.singer.name;
    track.path = `${publicPath}/${item.music_path}`;
    track_list.push(track);
});


console.log(track_list);

// // Define the tracks that have to be played
// let track_list = [
//   {
//     name: "Hiệu ứng trốn chạy",
//     artist: "Cá hồi hoang",
//     image: "assets/uploads/imgs/1677205000_ab67616d0000b273538febfe1d8baad2ff791ac5",
//     path: "assets/uploads/audios/1677205062_Hiệu Ứng Trốn Chạy.mp3"
//   },
//   {
//     name: "Hiệu ứng trốn chạy",
//     artist: "Cá hồi hoang",
//     image: "assets/uploads/imgs/1677205000_ab67616d0000b273538febfe1d8baad2ff791ac5",
//     path: "assets/uploads/audios/1677205062_Hiệu Ứng Trốn Chạy.mp3"
//   },
//   {
//     name: "Hiệu ứng trốn chạy",
//     artist: "Cá hồi hoang",
//     image: "assets/uploads/imgs/1677205000_ab67616d0000b273538febfe1d8baad2ff791ac5",
//     path: "assets/uploads/audios/1677205062_Hiệu Ứng Trốn Chạy.mp3"
//   },
// ];

function random_bg_color() {

  // Get a number between 64 to 256 (for getting lighter colors)
  let red = Math.floor(Math.random() * 256) + 64;
  let green = Math.floor(Math.random() * 256) + 64;
  let blue = Math.floor(Math.random() * 256) + 64;

  // Construct a color withe the given values
  let bgColor = "rgb(" + red + "," + green + "," + blue + ")";

}

function loadTrack(track_index) {
  clearInterval(updateTimer);
  resetValues();
  curr_track.src = track_list[track_index].path;
  curr_track.load();

  track_name.text(track_list[track_index].name);
  track_artist.text(track_list[track_index].artist);
  now_playing.textContent = "PLAYING " + (track_index + 1) + " OF " + track_list.length;

  updateTimer = setInterval(seekUpdate, 1000);
  curr_track.addEventListener("ended", nextTrack);
  random_bg_color();
}

function loadAndPlayTrack(track_index){
  loadTrack(track_index);
  playTrack();
}

function resetValues() {
  curr_time.textContent = "00:00";
  total_duration.textContent = "00:00";
  seek_slider.value = 0;
}

// Load the first track in the tracklist
loadTrack(track_index);

function playpauseTrack() {
  if (!isPlaying) playTrack();
  else pauseTrack();
}

function playTrack() {
  curr_track.play();
  isPlaying = true;
  playpause_btn.html('<i class="fa fa-pause-circle fa-3x"></i>');
}

function pauseTrack() {
  curr_track.pause();
  isPlaying = false;
  playpause_btn.html('<i class="fa fa-play-circle fa-3x"></i>');
}

function nextTrack() {
  if (track_index < track_list.length - 1)
    track_index += 1;
  else track_index = 0;
  loadTrack(track_index);
  playTrack();
}

function prevTrack() {
  if (track_index > 0)
    track_index -= 1;
  else track_index = track_list.length;
  loadTrack(track_index);
  playTrack();
}

function seekTo() {
    // debugger
  seekto = curr_track.duration * (seek_slider.value / 100);
  curr_track.currentTime = seekto;
}

function setVolume() {
  curr_track.volume = volume_slider.value / 100;
}

function seekUpdate() {
  let seekPosition = 0;

  if (!isNaN(curr_track.duration)) {
    seekPosition = curr_track.currentTime * (100 / curr_track.duration);

    seek_slider.value = seekPosition;

    let currentMinutes = Math.floor(curr_track.currentTime / 60);
    let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
    let durationMinutes = Math.floor(curr_track.duration / 60);
    let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

    if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
    if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
    if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

    curr_time.textContent = currentMinutes + ":" + currentSeconds;
    total_duration.textContent = durationMinutes + ":" + durationSeconds;
  }
}


