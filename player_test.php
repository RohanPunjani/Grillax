<?php 


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Player</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        body{
            background-color: #000;
        }

        .audio-player {
            min-height: 30vh;
            margin: 20px;
            width: 350px;
            box-shadow: 0 0 20px 0 #000a;
            background-color: #202026;
            border-radius: 5px;
            color: white;
            display: flex;
            align-items:center;
            flex-direction:column;
            /* padding: 20px */
        }
        .audio-player .cover{
            height: 200px;
            width: 200px;
            border-radius: 20px;
            margin: 20px;
            overflow: hidden;
        }
        .audio-player .cover img{
            height: inherit;
            width: inherit;
            object-fit: cover;
        }

        .audio-player .time {
            width: 90%;
            margin: 20px auto;
            cursor: pointer;
            display: flex;
            justify-content:center;
            align-items:center;
            /* box-shadow: 0 2px 10px 0 #0008; */
        }
        .audio-player .time .timeline {
            background: rgba(255,255,255,.4);
            width: 70%;
            margin: auto;
            height: 2px;
            cursor: pointer;
            /* box-shadow: 0 2px 10px 0 #0008; */
        }

        .audio-player .time .timeline .progress {
            background: white;
            width: 0%;
            height: 100%;
            transition: 0.25s;
        }


        .audio-player .controls {
            display: flex;
            justify-content:space-around;
            align-items: stretch;
            padding: 0 20px;
            width: 100%;
            height: 100px;
            background-color: #5773ff;
            border-radius: 10px 10px 5px 5px;
        }

        .audio-player .controls>* {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .audio-player .controls .toggle-play.play {
            cursor: pointer;
            position: relative;
            left: 0;
            height: 0;
            width: 0;
            border: 7px solid #0000;
            border-left: 13px solid white;
        }

        .audio-player .controls .toggle-play.play:hover {
            transform: scale(1.1);
        }

        .audio-player .controls .toggle-play.pause {
            height: 15px;
            width: 20px;
            cursor: pointer;
            position: relative;
        }

        .audio-player .controls .toggle-play.pause:before {
            position: absolute;
            top: 0;
            left: 0px;  
            background: white;
            content: "";
            height: 15px;
            width: 3px;
        }

        .audio-player .controls .toggle-play.pause:after {
            position: absolute;
            top: 0;
            right: 8px;
            background: white;
            content: "";
            height: 15px;
            width: 3px;
        }

        .audio-player .controls .toggle-play.pause:hover {
            transform: scale(1.1);
        }


    </style>
  </head>
  <body class="text-white">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="audio-player">
            <div class="heading d-flex w-100">
                <b class="mr-auto m-4 lead">Player</b>
                <b class="m-4"><i class="fas fa-list-alt"></i></b>
            </div>
            <div class="cover">
                <img src="./data/covers/img1.jpg" alt="">
            </div>
            <br>
            <div class="name">
                <h1>Lovely</h1>
            </div>
            <div class="name">Khalid</div>

            <div class="time">
                <div class="current">0:00</div>
                <div class="timeline">
                    <div class="progress"></div>
                </div>
                <div class="length"></div>
            </div>
            <div class="controls">
                <button class="repeat-container btn text-white">
                    <i class="fas fa-redo"></i>
                </button>
                <button class="prev-container btn text-white">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="play-container btn text-white">
                    <div class="toggle-play play">
                    </div>
                </div>
                <div class="next-container btn text-white">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="shuffle-container btn text-white">
                    <i class="fas fa-random"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        const audioPlayer = document.querySelector(".audio-player");
        const audio = new Audio(
            "./data/tracks/song1.mp3"
        );
        console.dir(audio);
        audio.addEventListener(
            "loadeddata",
            () => {
                audioPlayer.querySelector(".time .length").textContent = beautifulTime(
                    audio.duration
                );
                audio.volume = 1;
            },
            false
        );

        //click on timeline to skip around
        const timeline = audioPlayer.querySelector(".timeline");
        timeline.addEventListener("click", e => {
            const timelineWidth = window.getComputedStyle(timeline).width;
            const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
            audio.currentTime = timeToSeek;
        }, false);

        //check audio percentage and update time accordingly
        setInterval(() => {
            const progressBar = audioPlayer.querySelector(".progress");
            progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
            audioPlayer.querySelector(".time .current").textContent = beautifulTime(
                audio.currentTime
            );
        }, 500);

        // Pause and play
        const playBtn = audioPlayer.querySelector(".controls .toggle-play");
        playBtn.addEventListener(
            "click",
            () => {
                if (audio.paused) {
                    playBtn.classList.remove("play");
                    playBtn.classList.add("pause");
                    audio.play();
                } else {
                    playBtn.classList.remove("pause");
                    playBtn.classList.add("play");
                    audio.pause();
                }
            },
            false
        );
        const prevBtn = audioPlayer.querySelector(".controls .prev-container");
        prevBtn.addEventListener(
            "click",
            () => {
                if (audio.paused) {
                    playBtn.classList.remove("play");
                    playBtn.classList.add("pause");
                    audio.play();
                } else {
                    playBtn.classList.remove("pause");
                    playBtn.classList.add("play");
                    audio.pause();
                }
            },
            false
        );

        function beautifulTime(num) {
            let seconds = parseInt(num);
            let minutes = parseInt(seconds / 60);
            seconds -= minutes * 60;
            const hours = parseInt(minutes / 60);
            minutes -= hours * 60;

            if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
            return `${String(hours).padStart(2, 0)}:${minutes}:${String(
                    seconds % 60
                ).padStart(2, 0)}`;
        }

    </script>
  </body>
</html>