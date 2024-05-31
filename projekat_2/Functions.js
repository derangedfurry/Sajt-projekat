var User = 0;

document.addEventListener("DOMContentLoaded", () => {

    const main = document.getElementById("main");
    const filebox = document.getElementById("fileupload");
    const Namebox = document.getElementById("PictureName");
    const ConfirmInput = document.getElementById("ConfirmInput");
    const signput = document.getElementById("signout");
    

});


function createCanvas(main)
{
    const canvas = document.createElement("canvas");
    

    main.appendChild(canvas);
}

function GetPicture()
{


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("main").innerHTML += this.responseText;
      }
    };
    console.log("entry");
    xmlhttp.open("GET", "GetPicture.php", true);
    xmlhttp.send();
    console.log("exit");
}


function GetUser(str)
{
    User = str;
    console.log(User);
}
