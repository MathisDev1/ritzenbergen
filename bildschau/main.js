const ACTIVECLASS = "active";
const IMAGES = document.querySelectorAll(".flex-card-container");
const UNACTIVECLASS = "unactive";

function showImage(image) {
  if (image) {
    image.style.backgroundImage = "url(" + image.dataset.src + ")";
    console.log("image " + image.style.backgroundImage + " wurde geladen");
  }
}

function removeActiveClass() {
  const elm = document.querySelector(`.${ACTIVECLASS}`);
  if (elm) {
    elm.classList.remove(ACTIVECLASS);
  }
}

function addClass(target) {
  if(target.classList.contains(ACTIVECLASS)) return;
  removeActiveClass();
  target.classList.add(ACTIVECLASS);
  document.querySelector(".bildform").value = target.dataset.title;
  hiddenkommentarfield(target);
  removeUnactiveClass();
  addUnactiveClass(target);
  changecomments(target);
}

function previous() {
  if (!touchtimeout) addClass(document.querySelector(".unactive"));
}

function next() {
  if (!touchtimeout) addClass(document.querySelectorAll(".unactive").item(1));
}

var touchtimeout = false;

IMAGES.forEach((image) => {
  image.addEventListener("click", (ev)=>addClass(ev.target));
  image.addEventListener("touchstart", (ev) => {
    // console.log(ev.changedTouches[0].screenX);
    ev.target.addEventListener("touchend", (ev2) => {
      var left =
        ev2.changedTouches[0].screenX - ev.changedTouches[0].screenX > 0;
      console.log(left);
      if (left) {
        previous();
      } else {
        next();
      }
      touchtimeout=true;
      setTimeout(()=>{
        touchtimeout=false;
      },200);
    });
  });
});

function addUnactiveClass(target) {
  var myarr = target.dataset.id.split("-");
  myarr.forEach(function (element) {
    element--;
    if (IMAGES[element]) {
      IMAGES[element].classList.add(UNACTIVECLASS);
    }
    showImage(IMAGES[element]);
  });
}

function removeUnactiveClass() {
  const elm = document.querySelectorAll(`.${UNACTIVECLASS}`);
  elm.forEach((element) => {
    element.classList.remove(UNACTIVECLASS);
  });
}
if (getURLData().bild && getURLData().path) {
  IMAGES[getURLData().bild].classList.add(ACTIVECLASS);
  showImage(IMAGES[getURLData().bild]);
  addUnactiveClass(IMAGES[getURLData().bild]);
} else if (!getURLData().path) {
  window.location.href = "../galerie.php";
} else {
  window.location.href = "index.php?path=" + getURLData().path + "&bild=0";
}
function hiddenkommentarfield(target) {
  // console.log(target.style.backgroundImage.split('url("')[1].split('")')[0]);
  if (target.style.backgroundImage.split('url("')[1] == undefined) {
    return;
  }
  document.querySelector(`.bilderpath`).value = target.style.backgroundImage
    .split('url("')[1]
    .split('")')[0];
  // document.querySelector(`.bildform`).value = document.querySelector(
  //   `.${ACTIVECLASS}`
  // ).dataset.title;
}
function htmlDecodeEntities(text) {
  var temp = document.createElement("div");
  temp.innerHTML = text;
  var result = temp.childNodes[0].nodeValue;
  temp.removeChild(temp.firstChild);
  return result;
}
hiddenkommentarfield(document.querySelector(`.${ACTIVECLASS}`));
function changecomments(target) {
  var aktuell = target.dataset.name;
  document.querySelector(".kommentare").innerHTML = aktuell;
}
$(document).ready(function () {
  changecomments(document.querySelector(`.${ACTIVECLASS}`));
});
