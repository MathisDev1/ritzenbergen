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
    hash(ev.target.querySelector("#password-input").value).then((hashed)=>{
        ev.target.querySelector("#password-input").value=hashed;
        ev.target.submit();
    });
});
