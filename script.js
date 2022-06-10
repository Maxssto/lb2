function upload() {
    if("download" in localStorage) {
        document.getElementById("upload").innerHTML = decodeURI(localStorage.getItem("download"));
        localStorage.setItem("download", document.getElementById("download").innerHTML);
    }
    else {
        document.getElementById("upload").innerHTML = "No saved content";
    }
}

function download() {
    localStorage.setItem("download", document.getElementById("download").innerHTML);
}