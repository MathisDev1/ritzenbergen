function newMindMapURL(url) {
    fetch(url)
      .then((response) => {
        return response.json();
      })
      .then((jsondata) => {
        newMindMapObject(jsondata);
      });
  }
  function newMindMapObject(obj) {
    console.log("New MindMap - Data:", obj);
    obj.forEach((element, i) => {
      var idarr=getElmByIdArr(element);
      var color = element.color;
      var backcolor = element.backgroundColor;
      var domelm = document.getElementById(element.id);
      var nodes = element.nodes;
      var ctx = domelm.getContext("2d");
      ctx.globalCompositeOperation = "destination-over";
      ctx.fillStyle = backcolor;
  
      // Text schreiben
      nodes.forEach((element, i) => {
        writeText(element.text, element.pos, color, ctx);
      });
  
      // Ellipsen zeichnen
      nodes.forEach((element, i) => {
        var xpos = element.pos[0];
        var ypos = element.pos[1];
        var xradius=element.xradius;
        if(xradius){}else{
          xradius=70
        }
        var yradius=element.yradius;
        if(yradius){}else{
          yradius=30
        }
        ctx.fillStyle = backcolor;
        ctx.beginPath();
        ctx.ellipse(xpos, ypos, xradius, yradius, 0, 0, Math.PI * 2);
        ctx.fill();
        ctx.closePath();
      });
  
      // Linien ziehen
      nodes.forEach((node, i) => {
        node.linesto.forEach((element, i) => {
          lineTo(node.id, element, ctx, idarr);
        });
      });
    });
  }
  function lineTo(startelm, endelm, ctx,idarr) {
    console.log(startelm);
    ctx.strokeStyle = "black";
    ctx.moveTo(idarr[startelm].pos[0],idarr[startelm].pos[1]);
    ctx.lineTo(idarr[endelm].pos[0],idarr[endelm].pos[1]);
    ctx.stroke();
    ctx.closePath();
  }
  function writeText(text, position, color, ctx) {
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillStyle = color;
    ctx.fillText(text, position[0], position[1]);
  }
  function getElmByIdArr(obj) {
    var myarr=[];
    obj.nodes.forEach((element, i) => {
      myarr[element.id]=element;
    });
    return myarr;
  }
  