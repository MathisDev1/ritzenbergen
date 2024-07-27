function convertImageToBlackAndWhite(image) {
  if (image.classList.contains("grayscale")) {
    image.classList.remove("grayscale");
  } else {
    image.classList.add("grayscale");
  }
}

document.querySelector("#save-button").addEventListener("click",(ev)=>{
  var bilder=document.getElementsByClassName("grayscale");
  bilderspeichern(bilder);
});
function bilderspeichern(bilder){
  var bilder2=[];
  document.querySelectorAll("img").forEach((img)=>{
    if(!Array.from(bilder).includes(img)){
      bilder2.push(img.src.split("?")[1].split("&")[0].split("=")[1].split("../../../").join(""));
    }
  });
  console.log("Speichere... ",bilder2);
  $.ajax("bilderspeichern.php",{
    method: "post",
    data: {"bilder": bilder2,whitelistpath: whitelistpath},
    complete: (res)=>{
      window.alert("Gespeichert, Rückmeldung von PHP: "+res.responseText);
    }
  });
}