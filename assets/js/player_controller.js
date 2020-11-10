function playSongHavingId(id) {


    
    const audioPlayer = document.querySelector(".audio-player");
    const audio = new Audio(
        // "./data/tracks/song1.mp3"
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
    // const prevBtn = audioPlayer.querySelector(".controls .prev-container");
    // prevBtn.addEventListener(
    //     "click",
    //     () => {
    //         if (audio.paused) {
    //             playBtn.classList.remove("play");
    //             playBtn.classList.add("pause");
    //             audio.play();
    //         } else {
    //             playBtn.classList.remove("pause");
    //             playBtn.classList.add("play");
    //             audio.pause();
    //         }
    //     },
    //     false
    // );

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
}