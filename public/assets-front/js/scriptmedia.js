const musicContainer = document.getElementById('music-container');
const playBtn = document.getElementById('play');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

const audio = document.getElementById('audio11');
const audioAds = document.getElementById('audioads');
const progress = document.getElementById('progress');
const devItem = document.getElementById('devItem');
const progressContainer = document.getElementById('progress-container');
 const title = document.getElementById('title');
  const titleAds = document.getElementById('titleAds');
// const cover = document.getElementById('cover');
const currTime = document.querySelector('#currTime');
const durTime = document.querySelector('#durTime');
const forword = document.querySelector('#forword');
const rewind = document.querySelector('#rewind');
const buffer = document.querySelector('#buffer');
const value_range = document.querySelector('.value-of-range');
const play_contol = document.querySelector('.play-contol');
const  List_Episode= document.querySelectorAll('.movies-1 .episod ');
//console.log(List_Episode);
// Keep track of song


progress.style.width = 0;
// Initially load song details into DOM
loadSong(songs[songIndex]);

function update_ajax_duration(){
// function update_ajax_duration(crtime,dur){
    const crtime = localStorage.getItem("mycurrentTime");
    const dur = localStorage.getItem("myendTime");
    // set csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   var status_delete;
   let end_dur;
//   $(document).on('click','.fa-play',function(){
    let duration_time = $('#devItem').text();
    let cr_time = $('#currTime').text();
    let end_time = $('#durTime').text();
    let product_media_id = $('#audio_id').val();
    let product_id = $('#pro_id').val();
    if(isNaN(dur)){
       end_dur = 0;
    }
    else{
        end_dur = dur;
    }
    
    if(crtime == dur-1){
         status_delete = 1;
    }
    else{
          status_delete = 0;
    }
    
   
    
    $.ajax({
      url:"/suno-kahaniya/audio-save",
      type:"post",
      data:{ duration_time : duration_time,end_time:end_dur,product_media_id:product_media_id,product_id:product_id,status:status_delete},
      success:function(res){
        let time = res.duration_time;
        let endTime = res.end_time;
      },
      error:function(res){
        console.log(res.responseText);
      }
    });
// });
}
setInterval( update_ajax_duration, 5000);
// Update song details
function loadSong(song) {
   title.innerText = song.split("#")[1];
  audio.src = `/suno-kahaniya/uploads/product/audio/${song.split("#")[0]}`;
 
  //alert(`product/audio/${song}`);
 // cover.src = `images/${song}.jpg`;
}

// Play song
function playSong() {
   musicContainer.classList.add('play');
    playBtn.querySelector('i.fas').classList.remove('fa-play');
    playBtn.querySelector('i.fas').classList.add('fa-pause');
    play_contol.style.opacity = 1;
    value_range.style.opacity = 1;
    title.style.display = 'block';
    titleAds.style.display = 'none';
    audio.play();
   
    document.getElementById("buffer").style.display = "block";
  }
  // Pause song
function pauseSong() {
   musicContainer.classList.remove('play');
  playBtn.querySelector('i.fas').classList.add('fa-play');
  playBtn.querySelector('i.fas').classList.remove('fa-pause');
  audio.pause();
}


// Previous song
function prevSong() {
  songIndex--;

  if (songIndex < 0) {
    songIndex = songs.length - 1;
  }
  songs.forEach((number, index) => {
    List_Episode[index].classList.remove('bg-section-2');
    List_Episode[index].classList.remove('bg-section-1');
  });
  loadSong(songs[songIndex]);
  List_Episode[songIndex].classList.add('bg-section-1')
  playSong();
}

// Next song
function nextSong() {
  songIndex++;

  if (songIndex > songs.length - 1) {
    songIndex = 0;
  }
  songs.forEach((number, index) => {
    List_Episode[index].classList.remove('bg-section-2');
    List_Episode[index].classList.remove('bg-section-1');
  });

  loadSong(songs[songIndex]);
  
  List_Episode[songIndex].classList.add('bg-section-1');
  // console.log();
  playSong();
}
var abc = 0;
// Update progress bar
function updateProgress(e) {
  var { duration, currentTime } = e.srcElement;
  var progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
    if(progressPercent > 0.1){
      document.getElementById("buffer").style.display = "none";
    }
    devItem.innerHTML = currentTime;
     localStorage.removeItem("mycurrentTime");
     localStorage.removeItem("myendTime");
     localStorage.setItem("mycurrentTime", currentTime);
     localStorage.setItem("myendTime", duration);
    //update_ajax_duration(currentTime,duration);
    
    if(Math.trunc(currentTime) == adsAfter && abc === 0){
        //console.log(currentTime);
        play_contol.style.opacity = 0;
        value_range.style.opacity = 0;
        title.style.display = 'none';
         titleAds.style.display = 'block';
        abc = abc + 1 ;
        //alert('adstime');
        pauseSong();
        adsPlay();

    }
    //console.log(currentTime);
}

function AdsupdateProgress(e) {
  var { duration, currentTime } = e.srcElement;
  var progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
    if(progressPercent > 0.1){
      document.getElementById("buffer").style.display = "none";
    }
    
    //console.log(currentTime);
}

// function for ads
function adsPlay(){
    audioAds.play();
    //currentTime = currentTime + 1 ;
//     audioAds.onended = function() {
//         audio.play();
//   //alert("The audio has ended");
// }
 audioAds.addEventListener('ended', playSong);
 
}


// Set progress bar
function setProgress(e) {
  const width = this.clientWidth;
  const clickX = e.offsetX;
  const duration = audio.duration;
  audio.currentTime = (clickX / width) * duration;
}
// // forword skip time 30 second
 function forword_time(){
  //audio.load(3);
	    audio.currentTime += 3.0; /**tried also with audio.currentTime here. Didn't worked **/
  }

  function duration_time(durationProductTime){
    //audio.load(3);
   
        audio.currentTime = durationProductTime; /**tried also with audio.currentTime here. Didn't worked **/
    }

//   // forword skip time 30 second
 function rewind_time(){
	    audio.currentTime += -3; /**tried also with audio.currentTime here. Didn't worked **/
	   
  }



//get duration & currentTime for Time of song
function DurTime (e) {
	const {duration,currentTime} = e.srcElement;
	var sec;
	var sec_d;

	// define minutes currentTime
	let min = (currentTime==null)? 0:
	 Math.floor(currentTime/60);
	 min = min <10 ? '0'+min:min;

	// define seconds currentTime
	function get_sec (x) {
		if(Math.floor(x) >= 60){
			
			for (var i = 1; i<=60; i++){
				if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
					sec = Math.floor(x) - (60*i);
					sec = sec <10 ? '0'+sec:sec;
				}
			}
		}else{
		 	sec = Math.floor(x);
		 	sec = sec <10 ? '0'+sec:sec;
		 }
	} 

	get_sec (currentTime,sec);

	// change currentTime DOM
	if(currTime){
	currTime.innerHTML = min +':'+ sec;
}

	// define minutes duration
	let min_d = (isNaN(duration) === true)? '0':
		Math.floor(duration/60);
	 min_d = min_d <10 ? '0'+min_d:min_d;


	 function get_sec_d (x) {
		if(Math.floor(x) >= 60){
			
			for (var i = 1; i<=60; i++){
				if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
					sec_d = Math.floor(x) - (60*i);
					sec_d = sec_d <10 ? '0'+sec_d:sec_d;
				}
			}
		}else{
		 	sec_d = (isNaN(duration) === true)? '0':
		 	Math.floor(x);
		 	sec_d = sec_d <10 ? '0'+sec_d:sec_d;
		 }
	} 

	// define seconds duration
	
	get_sec_d (duration);

	// change duration DOM
	let tm = min_d +':'+ sec_d;
	durTime.innerHTML = min_d +':'+ sec_d;

}
function checkBuffering() {
  // buffer.classList.add('play');
  // clearInterval(buffInterval);
  // buffInterval = setInterval(function () {
  //   if (nTime == 0 || bTime - nTime > 1000) albumArt.addClass("buffering");
  //   else albumArt.removeClass("buffering");

  //   bTime = new Date();
  //   bTime = bTime.getTime();
  // }, 100);
}

// Event listeners
playBtn.addEventListener('click', () => {
  const isPlaying = musicContainer.classList.contains('play');
  if (isPlaying) {
    pauseSong();
  } else {
    playSong();
  }
 
  });

  // Time of song
  // Change song
prevBtn.addEventListener('click', prevSong);
nextBtn.addEventListener('click', nextSong);
forword.addEventListener('click', forword_time);
rewind.addEventListener('click', rewind_time);

// Time/song update
audio.addEventListener('timeupdate', updateProgress);
if(audioAds){
audioAds.addEventListener('timeupdate', AdsupdateProgress);
}

// Click on progress bar
progressContainer.addEventListener('click', setProgress);

// Song ends
if(songs.lengths > 0){
  audio.addEventListener('ended', nextSong);
  }
audio.addEventListener('timeupdate',DurTime);

if(durationProductTime){
  duration_time(durationProductTime);
}