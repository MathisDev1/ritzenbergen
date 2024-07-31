var id=-1;
document.querySelector("#select").addEventListener("change",(ev)=>{
    if(id!=-1){
        document.querySelector(`#table${id}`).style.display="none";
    }
    id=ev.currentTarget.value;
    document.querySelector(`#table${id}`).style.display="block"; 
});