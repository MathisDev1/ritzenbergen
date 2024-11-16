function tippen(json){
    $.ajax("tippeintragen.php",{
        method: "post",
        data: {user: username, pass: password, spieltag: spieltag, tipp: json},
        complete: (response)=>{
            window.alert("Tipp wurde eingesendet. Antwort vom Server: "+response.responseText);
            window.location.reload();
        }
    });
    window.alert("Tipp wird gesendet...");
}


document.querySelector("#mainform").addEventListener("submit",(ev)=>{
    var json=[];
    var heim="";
    var mannschaft1=1;
    document.querySelectorAll("span.paarung").forEach((element)=>{
        paarungTipp={};
        paarungTipp[element.querySelectorAll("input")[0].placeholder]=element.querySelectorAll("input")[0].value;
        paarungTipp[element.querySelectorAll("input")[1].placeholder]=element.querySelectorAll("input")[1].value;
        json.push(paarungTipp);
    });
    tippen(json);
});
