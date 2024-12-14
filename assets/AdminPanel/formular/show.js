var id=document.querySelector("#select").querySelector("option").value;
document.querySelector("#select").addEventListener("change",(ev)=>{
    console.log(id);
    if(id!=-1){
        document.querySelector(`#table${id}`).style.display="none";
    }
    id=ev.currentTarget.value;
    document.querySelector(`#table${id}`).style.display="block"; 
});