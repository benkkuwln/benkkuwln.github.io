const songs = [
    "Radiohead - High And Dry.mp3",
    "Night Things - Sleeping Beauty.mp3",
    "Faye Webster - Kingston.mp3",
    "Joji - Like You Do.mp3",
    "Men I Trust - Show Me How.mp3",
    "Easy Lovers (From Camille 2000).mp3",
    "The Strokes - Someday.mp3",
    "Deftones - Cherry Waves.mp3",
    "Can't Get Enough - J Cole ft. Trey Songz.mp3",
    "Mac Miller - Objects in the Mirror.mp3",
    "Rex Orange County - Every Way.mp3",
    "Tory Lanez - The Color Violet.mp3",
    "Lana Del Rey - Groupie Love ft. A$AP Rocky.mp3",
    "The Beatles - Something.mp3",
    "Across the Stars (Love Theme from Star Wars Attack of the Clones).mp3",
    "Deftones - Beauty School.mp3",
    "J. Cole - She's Mine Pt. 1.mp3",
    "J. Cole - She's Mine Pt. 2.mp3",
    "Once Upon a December (From Anastasia).mp3",
    "Deftones - Mascara.mp3",
    "Kali Uchis, Don Toliver - Fantasy.mp3",
    "J. Cole - l e t . g o . m y . h a n d.mp3",
    "Radiohead - True Love Waits.mp3",
    "Mac DeMarco - Heart To Heart.mp3",
    "Love Theme (From Blade Runner).mp3",
    "I'll Be Seeing You (From The Notebook).mp3",
    "TV Girl - Lovers Rock.mp3",
    "Frank Ocean - Pyramids.mp3",
    "Grimes - Genesis.mp3",
    "D4vd - Here With Me.mp3",
    "beabadoobee - Glue Song.mp3",
]
const player = document.getElementById('player');

function createSongList() {
    const list = document.createElement('ol');
    for(let i =0;  i < songs.length; i++) {
        const item = document.createElement('li');
        item.appendChild(document.createTextNode(songs[i]));
        list.appendChild(item);
    }
    return list;
}

const links = document.querySelector('li')

const songList = document.getElementById('songList');
songList.appendChild(createSongList());

songList.onclick = function(e) {
document.querySelector('#cover').classList.remove('pulse');
    const source = document.getElementById('source');
    source.src = "songs/"+ e.target.innerText;

    document.querySelector('#currentSong').innerText = `Now Playing: ${e.target.innerText}`

    player.load();
    player.play();
    document.querySelector('#cover').classList.add('pulse');
};

songs.addEventListener('ended',function(){
    //play next song
  });

function playAudio() {
    if(player.readyState) {
        player.play();
    }
}

function pauseAudio() {
    player.pause();
}

const slider = document.getElementById('volumeSlider');
slider.oninput = function(e) {
    const volume = e.target.value;
    player.volume = volume;
};

function updateProgress() {
    if(player.currentTime > 0) {
    const progressBar = document.getElementById('progress');
    progressBar.value = (player.currentTime / player.duration) * 100;
}
}