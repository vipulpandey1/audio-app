let songArray; let songIndex;let songName;let adsDuration;let UserDuration;let songs = 0;let pro_id;let proaudio_id;  let likeCount;let player_status
 function load_player(id,status){
   
    
    //  localStorage.removeItem("songslist");
    //  localStorage.removeItem("songindex");
    
    var songsArray = [];
       $.ajax({
      // url:"{{ route('Onpage_play_audio') }}",
       url:"/suno-kahaniya/play/onpage/",
       type:"post",
       data:{id :id },
       success:function(res){
            document.getElementById('progress').style.width = 0;
           console.log(res.result);
           document.getElementById("audio11").src = '/suno-kahaniya/uploads/product/audio/'+res.result.audio.media_name;
           document.getElementById('cover').src = '/suno-kahaniya/uploads/product/desktop-image/'+res.result.audio.product.desktop_image;
           document.getElementById('title').innerHTML = res.result.audio.title;
           document.getElementById('countlink').innerHTML = res.result.audio.count_likes_count+" Like";
           if(res.result.likeStatus == 1 ){
               document.querySelector('.bi-suit-heart').classList.add('red-text');
                document.querySelector('.bi-suit-heart').classList.remove('grey-text');
               likeCount = 2;
           }else{
               document.querySelector('.bi-suit-heart').classList.add('grey-text');
                document.querySelector('.bi-suit-heart').classList.remove('red-text');
               likeCount = 1;
           }
           pro_id = res.result.audio.product_id;
           proaudio_id = res.result.audio.id;
           player_status = status;
           res.result.related_audio.forEach((val, index) => {
             songsArray.push(val.media_name+'#'+val.title+'#'+val.id);
           });
           
           songs = songsArray;
           songval = songs.indexOf(res.result.audio.media_name+'#'+res.result.audio.title+'#'+res.result.audio.id);
           loadSong(songs[songval]);
           //alert(songs[songval]);
           //
           if(res.result.audio.popup_status == 1){
              // alert("status active");
               document.getElementById("audioads").src = '/suno-kahaniya/uploads/product/audio/attachment/'+res.result.audio.product_ads.media_file;
               adsDuration = res.result.audio.product_ads.after_time;
               
               
           }
           else{
               adsDuration = false;
           }
           if(res.result.produration){
                
               UserDuration = res.result.produration.duration_time;
              // alert(UserDuration);
              
           }
           else{
                 UserDuration = false;
           }
          
           playSong();
           home_status(proaudio_id,pro_id);
           if(status == 0){
           $('#listview').modal('show');
           }
           else{
               //alert('bottom');
           }
       },
       error:function(text){
           console.log(text.responseText);
       }
    });
       // alert(rv);
    }   

//  click_hll.addEventListener('click', function(){
//         console.log(rv);
//   });

function home_status(media,product){
     $.ajax({
      url:"/suno-kahaniya/watch-home-status",
      type:"post",
       data:{ id : media, product_id : product},
      success:function(res){
        //console.log(res);

      },
      error:function(res){
        //console.log(res.responseText);
      }
    });
}


   function get_playlist(id,proid,status){
    $.ajax({
      url:"/suno-kahaniya/recent-save-list",
      type:"post",
       data:{ id : id, product_id : proid, status: status},
      success:function(res){
        console.log(res);
         $("#refreshDivID").load("#refreshDivID .reloaded-divs > *");
        //alert('Media Successfully add to playlist')
      },
      error:function(res){
        console.log(res.responseText);
      }
    });

  }

  
     function like_list(){
         if(likeCount == 1 || likeCount%2!=0){
             likeDislike = 1;
             $(document).find('.bi-suit-heart').addClass('red-text');
             $(document).find('.bi-suit-heart').removeClass('grey-text');
         }
         //if(likeCount%2==0){
         else{
             likeDislike = 2;
             $(document).find('.bi-suit-heart').removeClass('red-text');
             $(document).find('.bi-suit-heart').addClass('grey-text');
         }
         
    //   if(likeCount == 1){
    //          likeDislike = 1;
    //          $(document).find('.bi-suit-heart').addClass('red-text');
    //          $(document).find('.bi-suit-heart').removeClass('grey-text');
    //      }
    //      if(likeCount == 2){
    //          likeDislike = 2;
    //          $(document).find('.bi-suit-heart').removeClass('red-text');
    //          $(document).find('.bi-suit-heart').addClass('grey-text');
    //      }    
    //       if(likeCount > 2){
    //           likeDislike = 1;
    //           linkCount = 1;
    //           $(document).find('.bi-suit-heart').addClass('red-text');
    //          $(document).find('.bi-suit-heart').removeClass('grey-text');
    //       }
    $.ajax({
      url:"/suno-kahaniya/like-save-list",
      type:"post",
      data:{ id : proaudio_id, product_id : pro_id,likeDislike:likeDislike},
      success:function(res){
        
        if(res.status == 200){
            $('#countlink').text(res.count+" Like");
        }
        //  document.querySelector('.bi-suit-heart').style.color = 'red';
        // location.reload();
      },
      error:function(res){
        console.log(res.responseText);
      }
    });
   
    likeCount++;

  }
  
 
  

  



const musicContainer = document.getElementById('music-container');
const playBtn = document.getElementById('play');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

const playBtn_bottom = document.getElementById('play-1');
const prevBtn_bottom = document.getElementById('prev-1');
const nextBtn_bottom = document.getElementById('next-1');

const audio = document.getElementById('audio11');
const currTime = document.querySelector('#currTime');
const durTime = document.querySelector('#durTime');
const currTime1 = document.querySelector('#currTime-1');
const durTime1 = document.querySelector('#durTime-1');
const forword = document.querySelector('#forword');
const rewind = document.querySelector('#rewind');
const forword1 = document.querySelector('#forword1');
const rewind1 = document.querySelector('#rewind1');
const buffer = document.querySelector('#buffer');
const progress = document.getElementById('progress');
const progress1 = document.querySelector('.progress__bar_1');
//const progress1ads = document.querySelector('.progress__bar_1ads');
const devItem = document.getElementById('devItem');
const progressContainer = document.getElementById('progress-container');
const progressContainer1 = document.querySelector('.progress-container-1');
const audioAds = document.getElementById('audioads');
const title = document.getElementById('title');
const titleAds = document.getElementById('titleAds');
const likebtn = document.querySelector('#likebtn');
const value_range = document.querySelector('.value-of-range');
const play_contol = document.querySelector('.play-contol');
const title1 = document.querySelector('.track__title');
const title1Ads = document.querySelector('.track__title_ads');
const closepopupBtn = document.querySelector('#closepopup');
const bt_player_con = document.querySelector('#bt-player');
const pl_1= document.querySelector('.pl-1');
const pl_2= document.querySelector('.pl-2');
const track_time= document.querySelector('.track__time');

// const abar= document.getElementById('abar');
 const mbar= document.getElementById('mbar');

 progress.style.width = 0;
// var songs = localStorage.getItem("songslist").split("#,");
// var songIndex = localStorage.getItem("songsindex");
//console.log(songs);
// // Initially load song details into DOM
// loadSong(songs[songIndex]);

// function load_songlength(){
//     return songs.lengths;
// }

let proID;
function loadSong(songs) {
   
  title.innerText = songs.split("#")[1];
  title1.innerText = songs.split("#")[1];
  audio.src = '/suno-kahaniya/uploads/product/audio/'+songs.split("#")[0];
  //alert(`product/audio/${song}`);
 // cover.src = `images/${song}.jpg`;
  proID = songs.split("#")[2];
  
}

let Getcurrenttime , GetDuration ; let status_ad_bar;
// Update progress bar
function updateProgress(e) {
  var { duration, currentTime } = e.srcElement;
  Getcurrenttime = currentTime;
  GetDuration = duration;
  var progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
    progress1.style.width = `${progressPercent}%`;
    if(progressPercent > 0.1){
      document.getElementById("buffer").style.display = "none";
    }
    
    if(duration == currentTime){
        update_ajax_duration();
    }
    status_ad_bar = false;
    //devItem.innerHTML = currentTime;
    if(Math.trunc(currentTime) == adsDuration  && adsDuration){
        //alert(adsDuration);
       // console.log(currentTime);
        play_contol.style.opacity = 0;
        value_range.style.opacity = 0;
        title.style.display = 'none';
        title1.style.display = 'none';
        titleAds.style.display = 'block';
        title1Ads.style.display = 'block';
        likebtn.style.display = 'none';
        // mbar.style.display = 'none';
        // abar.style.display = 'block';
        pl_1.style.display = 'none';
        pl_2.style.display = 'none';
        mbar.style.cssText = "margin-top:5px";
        track_time.style.display = 'none';
        //abc = abc + 1 ;
        //alert('adstime');
        adsDuration = false;
        status_ad_bar = true;
        pauseSong();
        adsPlay();
        

    }
    //console.log(currentTime);
}

function update_ajax_duration(){
    // set csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   var status_delete;

    let duration_time = $('#devItem').text();
    
    if(isNaN(GetDuration)){
       end_dur = 0;
    }
    else{
        end_dur = GetDuration;
    }
    
    if(Getcurrenttime == GetDuration){
         status_delete = 1;
    }
    else{
          status_delete = 0;
    }
    
//   alert(Getcurrenttime );
//   alert(GetDuration);
    
    $.ajax({
      url:"/suno-kahaniya/audio-save",
      type:"post",
      data:{ duration_time : Getcurrenttime,end_time:end_dur,product_media_id:proID,product_id:pro_id,status:status_delete},
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





function AdsupdateProgress(e) {
    status_ad_bar = true;
  var { duration, currentTime } = e.srcElement;
  var progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
   // progress1ads.style.width = `${progressPercent}%`;
    progress1.style.width = `${progressPercent}%`;
    if(progressPercent > 0.1){
      document.getElementById("buffer").style.display = "none";
    }
    
    //console.log(currentTime);
}

// function for ads
function adsPlay(){
 audioAds.play();
 audioAds.addEventListener('ended', playSong);
 
}

// Set progress bar
function setProgress(e) {
    
  const width = this.clientWidth;
  const clickX = e.offsetX;
  const duration = audio.duration;
  if(status_ad_bar == false){
  audio.currentTime = (clickX / width) * duration;
  }
}

// Play song
function playSong() {
    // if(adsDuration && empty(UserDuration)){ audio.currentTime = adsDuration; }
    if(UserDuration) {audio.currentTime = UserDuration }  
    // else{
    //     audio.currentTime = 0;
    // }
   
  musicContainer.classList.add('play');
    playBtn.querySelector('i.fas').classList.remove('fa-play');
    playBtn.querySelector('i.fas').classList.add('fa-pause');
    playBtn_bottom.querySelector('i.fas').classList.remove('fa-play');
    playBtn_bottom.querySelector('i.fas').classList.add('fa-pause');
    play_contol.style.opacity = 1;
    value_range.style.opacity = 1;
    title.style.display = 'block';
    title1.style.display = 'block';
    titleAds.style.display = 'none';
    title1Ads.style.display = 'none';
    // abar.style.display = 'none';
    // mbar.style.display = 'block';
     likebtn.style.display = 'block';
     mbar.style.cssText = "margin-top:25px";
     pl_1.style.display = 'flex';
        pl_2.style.display = 'flex';
        track_time.style.display = 'block';
    audio.play();
    const progress = document.getElementById('progress');
const devItem = document.getElementById('devItem');
const progressContainer = document.getElementById('progress-container');

  }
  
  
  // Pause song
function pauseSong() {
  musicContainer.classList.remove('play');
  playBtn.querySelector('i.fas').classList.add('fa-play');
  playBtn.querySelector('i.fas').classList.remove('fa-pause');
  playBtn_bottom.querySelector('i.fas').classList.add('fa-play');
  playBtn_bottom.querySelector('i.fas').classList.remove('fa-pause');
  audio.pause();
}

// Previous song
function prevSong(st) {
    
  songval--;
  if (songval < 0) {
    songval = songs.length - 1;
  }
//   songs.forEach((number, index) => {
//     List_Episode[index].classList.remove('bg-section-2');
//     List_Episode[index].classList.remove('bg-section-1');
//   });
  loadSong(songs[songval]);
//   List_Episode[songIndex].classList.add('bg-section-1')
  playSong();
  load_player(proID,st); 
}

// Next song
function nextSong(st) {
    
  songval++;
  if (songval > songs.length - 1) {
    songval = 0;
  }
  loadSong(songs[songval]);
  UserDuration = false;
  if(songval == songs.length){
      pauseSong();
  }
  else{
      playSong();
      load_player(proID,st); 
  }
  
}

 function forword_time(){
  //audio.load(3);
	    audio.currentTime += 3.0; /**tried also with audio.currentTime here. Didn't worked **/
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
	currTime1.innerHTML = min +':'+ sec;
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
	durTime1.innerHTML = min_d +':'+ sec_d;

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
  
  // Event listeners
playBtn_bottom.addEventListener('click', () => {
  const isPlaying = musicContainer.classList.contains('play');
  if (isPlaying) {
    pauseSong();
  } else {
    playSong();
  }
 
  });
  
  closepopupBtn.addEventListener('click', () => {
  bt_player_con.style.display = 'block';
 
  });

// function btPlayer{
//     bt_player_con.style.display = 'block';
// }
  // Time of song
  // Change song
// closepopupBtn.addEventListener('click', btPlayer);
prevBtn.addEventListener('click', (evt) => prevSong('0') );
nextBtn.addEventListener('click', (evt) => nextSong('0') );

prevBtn_bottom.addEventListener('click', (evt) => prevSong('1') );
nextBtn_bottom.addEventListener('click', (evt) => nextSong('1') );

forword.addEventListener('click', forword_time);
rewind.addEventListener('click', rewind_time);

forword1.addEventListener('click', forword_time);
rewind1.addEventListener('click', rewind_time);

// // Time/song update
audio.addEventListener('timeupdate', updateProgress);
 if(audioAds){
 audioAds.addEventListener('timeupdate', AdsupdateProgress);
 }

// // Click on progress bar

   progressContainer.addEventListener('click', setProgress); 
   progressContainer1.addEventListener('click', setProgress);



// // Song ends
//   if(songsArray.lenght > 0){
  audio.addEventListener('ended', (evt) => nextSong('0'));
//   }
 audio.addEventListener('timeupdate',DurTime);

// // if(durationProductTime){
// //   duration_time(durationProductTime);
// // }