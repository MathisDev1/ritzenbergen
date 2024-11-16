function tippen(json){
    
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
