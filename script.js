console.log("Welcome to Vitasta");

let songIndex = 0;
let audioElement = new Audio("songs/bolo har har.mp3");
let masterPlay = document.getElementById("masterPlay");
let myProgressBar = document.getElementById("myProgressBar");
let gif = document.getElementById("gif");
let masterSongName = document.getElementById("masterSongName");
let songItems = Array.from(document.getElementsByClassName("songItem"));

let songs = [
  {
    songName: "Bolo Har Har Har",
    filePath: "songs/bolo har har.mp3",
    coverPath: "covers/bolo har har.jpeg",
  },
  {
    songName: "440 Volt - Mika Singh",
    filePath: "songs/440 volt.mp3",
    coverPath: "covers/440 volt.jpeg",
  },
  {
    songName: "Aaj Jane Ki Zid Na Karo - Sohail Rana",
    filePath: "songs/aaj jane ki zid.mp3",
    coverPath: "covers/aaj jane ki zid.jpeg",
  },
  {
    songName: "Tera Hoke Rahoon - Arijit Singh",
    filePath: "songs/bezubaan fhir se.mp3",
    coverPath: "covers/tere hoke rahoon.jpeg",
  },
  {
    songName: "Gulabi 2.0 - Amaal Malik",
    filePath: "songs/gulabi 2.0.mp3",
    coverPath: "covers/gulabi.jpeg",
  },
  {
    songName: "Ek Vaari Aa - Arijit Singh",
    filePath: "songs/ik vaari aa.mp3",
    coverPath: "covers/ek vaari aa.jpeg",
  },
  {
    songName: "Love You Zindagi - Amit Trivedi",
    filePath: "songs/love you zindagi.mp3",
    coverPath: "covers/love youu zindagi.jpeg",
  },
  {
    songName: "Mann Mera - Gajendra Verma",
    filePath: "songs/maan mera.mp3",
    coverPath: "covers/maan mera.jpeg",
  },
  {
    songName: "Naach Meri Jaan - Pritam",
    filePath: "songs/naach meri jaan.mp3",
    coverPath: "covers/naach meri jaan.jpeg",
  },
  {
    songName: "Bezubaan Phir Se - Vishal Dadlani",
    filePath: "songs/tera hoke rahunga.mp3",
    coverPath: "covers/bezubaan firse.jpg",
  },
];

songItems.forEach((element, i) => {
  element.getElementsByTagName("img")[0].src = songs[i].coverPath;
  element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
});

// Handle play/pause click
masterPlay.addEventListener("click", () => {
  if (audioElement.paused || audioElement.currentTime <= 0) {
    audioElement.play();
    masterPlay.classList.remove("fa-play-circle");
    masterPlay.classList.add("fa-pause-circle");
    gif.style.opacity = 1;
  } else {
    audioElement.pause();
    masterPlay.classList.remove("fa-pause-circle");
    masterPlay.classList.add("fa-play-circle");
    gif.style.opacity = 0;
  }
});
audioElement.addEventListener("timeupdate", () => {
  progress = parseInt((audioElement.currentTime / audioElement.duration) * 100);
  myProgressBar.value = progress;
});

myProgressBar.addEventListener("change", () => {
  audioElement.currentTime =
    (myProgressBar.value * audioElement.duration) / 100;
});

const makeAllPlays = () => {
  Array.from(document.getElementsByClassName("songItemPlay")).forEach(
    (element) => {
      element.classList.remove("fa-pause-circle");
      element.classList.add("fa-play-circle");
    }
  );
};

Array.from(document.getElementsByClassName("songItemPlay")).forEach(
  (element, index) => {
    element.addEventListener("click", (e) => {
      makeAllPlays();
      songIndex = index;
      e.target.classList.remove("fa-play-circle");
      e.target.classList.add("fa-pause-circle");
      audioElement.src = songs[index].filePath;
      masterSongName.innerText = songs[index].songName;
      audioElement.currentTime = 0;
      audioElement.play();
      gif.style.opacity = 1;
      masterPlay.classList.remove("fa-play-circle");
      masterPlay.classList.add("fa-pause-circle");
    });
  }
);

document.getElementById("next").addEventListener("click", () => {
  if (songIndex >= 9) {
    songIndex = 0;
  } else {
    songIndex += 1;
  }
  audioElement.src = songs[songIndex].filePath;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});

document.getElementById("previous").addEventListener("click", () => {
  if (songIndex <= 0) {
    songIndex = 0;
  } else {
    songIndex -= 1;
  }
  audioElement.src = songs[songIndex].filePath;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});
