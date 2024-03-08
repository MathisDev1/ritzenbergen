function jsphp() {
    this.php=function (code) {
        code=encodeURI(code);
        document.cookie="jsphp="+code+";";
        window.location.reload();
    }
    return this;
}