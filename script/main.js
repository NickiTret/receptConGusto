import "./_vendor";
import vars from "./_vars";
import "./_functions";
import "./_components";

// JavaScript для скрытия загрузочного экрана
window.onload = function () {
    document.getElementById("loader").style.opacity = 0;
    document.getElementById("loader").style.zIndex = -1;


    setTimeout(() => {
        document.getElementById("loader").style.display = "none";
    }, 100);
};
