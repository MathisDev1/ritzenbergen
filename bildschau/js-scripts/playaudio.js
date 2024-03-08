function playaudio(src) {
    tag=document.createElement("audio");
    tag.src=src;
    tag.play();
}