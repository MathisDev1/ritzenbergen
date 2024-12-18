document.querySelectorAll(".modal-container").forEach((element)=>{
    if(element.querySelector(".openBtn")==null){
        document.getElementById(element.dataset.id).addEventListener("click",(ev)=>{
            var btn=ev.target;
            var modal=document.getElementById(btn.dataset.id);
            var content=modal.querySelector(".modal");
            content.style.display="block";
        });
    }else{
    element.querySelector(".openBtn").addEventListener("click",(ev)=>{
        var btn=ev.target
        var modal=btn;
        do{
            modal=modal.parentElement;
        }while(!modal.classList.contains("modal-container"));
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