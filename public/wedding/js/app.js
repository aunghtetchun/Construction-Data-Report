let currentUrl = location.href;
let currentUrlArr = currentUrl.split("?");

$(".nav-link").each(function (index) {
    let selected = $(this).attr("href");
    if(selected == currentUrlArr[0]){
        $(this).addClass("active");
    }
})
