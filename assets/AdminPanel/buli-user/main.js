function hash(string) {
    const utf8 = new TextEncoder().encode(string);
    return crypto.subtle.digest("SHA-256", utf8).then((hashBuffer) => {
      const hashArray = Array.from(new Uint8Array(hashBuffer));
      const hashHex = hashArray
        .map((bytes) => bytes.toString(16).padStart(2, "0"))
        .join("");
      return hashHex;
    });
}

document.querySelector("#loginform").addEventListener("submit",(ev)=>{
    var passwordInput1=ev.target.querySelector("#password-input");
    var passwordInput2=ev.target.querySelector("#password-input2");
    var form=ev.target;
    hash(passwordInput1.value).then((hashed)=>{
        passwordInput1.value=hashed;
        hash(passwordInput2.value).then((hashed)=>{
            passwordInput2.value=hashed;
            form.submit();
        });
    });
});

document.querySelectorAll(".removeButtons").forEach((el)=>{
  el.addEventListener("click",(ev)=>{
    var button=ev.target;
    var id=button.dataset.id;
    var username2=button.querySelector("span").innerText;
    $.ajax("delete.php",{
      method: "post",
      complete: (res)=>{
          var response=res.responseText;
          window.alert("Benutzer "+username2+" gelöscht. Antwort von PHP: "+response);
          window.location.reload();
      },
      data: {id: id, username: username, password: password}
    });
  });
});
