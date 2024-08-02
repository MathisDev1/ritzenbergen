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
document.querySelectorAll(".formular-submit-button").forEach((btn)=>{
    btn.addEventListener("click",(ev)=>{
        var form=ev.currentTarget.parentElement.parentElement.parentElement;
        var input1=form.querySelector('[name="name"]');
        var input2=form.querySelector('[name="textarea"]');
        var formid=form.querySelector('[name="id"]').value;
        console.log(formid, ": ",input1," ",input2);
        var text1=input1.value;
        var text2=input2.value;
        input1.value="";
        input2.value="";
        $.ajax("formularergebnisse-eintragen.php",{
            method: "post",
            complete: (res)=>{
                var response=res.responseText;
                console.log(response);
            },
            data: {"id": formid, "name": text1, "textarea":text2}
        });
    });
});
function sendMsg(name,email,msg){
    $.ajax("kloenkasten-nachricht.php",{
        method: "post",
        complete: (res)=>{
            var response=res.responseText;
            console.log(response);
        },
        data: {msg: msg, email: email, name: name}
    });
}
document.querySelector("#chat-input").addEventListener("submit",function(ev){
    ev.preventDefault();
    
    var name=ev.currentTarget.querySelector("#name-input").value;
    var email=ev.currentTarget.querySelector("#email-input").value;
    var msg=ev.currentTarget.querySelector("#message-input").value;
    sendMsg(name,email,msg);
    window.setTimeout(()=>{
        location.href="index.php?newMessage=true";
        window.setTimeout(()=>{location.reload();},50);
    },3000);
    //location.reload();
    return false;
});