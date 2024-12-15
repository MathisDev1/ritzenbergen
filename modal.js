document.querySelectorAll(".modal-container").forEach((element)=>{
    if(element.querySelector(".openBtn")==null){

    }else{
    element.querySelector(".openBtn").addEventListener("click",(ev)=>{
        var btn=ev.target;
        var modal=btn.parentElement;
        var content=modal.querySelector(".modal");
        content.style.display="block";
    });
}
    element.querySelector(".closeBtn").addEventListener("click",(ev)=>{
        var btn=ev.target;
        var modal=btn.parentElement.parentElement.parentElement;
        var content=modal.querySelector(".modal");
        content.style.display="none";
    });
});