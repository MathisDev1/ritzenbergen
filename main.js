const modalOpenBtnClass="modal-open-btn";
const modalClass="eventmodal";
const modalCloseBtnClass="modal-close-btn";


function openmodal(ev){
    var target=ev.currentTarget;
    var id=target.dataset.id;
    document.querySelector(`.${modalClass}${id}`).style.display="block";
}

function closemodal(ev){
    ev.currentTarget.parentElement.parentElement.style.display="none";
}

var modalOpenBtns=document.querySelectorAll(`.${modalOpenBtnClass}`);
modalOpenBtns.forEach((element)=>{
    element.addEventListener("click",openmodal);
});
var modalCloseBtns=document.querySelectorAll(`.${modalCloseBtnClass}`);
modalCloseBtns.forEach((element)=>{
    element.addEventListener("click",closemodal);
});
document.querySelectorAll(".js-link").forEach((element)=>{
    element.addEventListener("click",(ev)=>{
        window.location.href=ev.currentTarget.dataset.href;
    })
});