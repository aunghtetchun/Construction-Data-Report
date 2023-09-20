//menu active
let currentUrl = location.href;
let currentUrlArr = currentUrl.split("?");

$(".menu-item").each(function (index) {
    let selected = $(this).attr("href");
    if(selected == currentUrlArr[0]){
        $(this).addClass("active");

        // left menu auto scroll
        let screenHeight = $(window).height();
        let active = $(".menu .active").offset().top;
        if(active > screenHeight*0.8 ){
            $(".aside-menu").animate({
                scrollTop:active
            },1000)
        }
    }
})

// select option search
$(document).ready(function() {
    $('.select2').select2();
});

$(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");


//toast control
$('.toast').toast('show')




//maximize
$(".btn-maximize").click(function () {
    let current = $(this).closest(".card");
    if(current.hasClass("card-full-screen")){
        current.removeClass("card-full-screen");
        $(this).html(`<i class="fas fa-expand-alt fa-fw"></i>`);

    }else{
        current.addClass("card-full-screen");
        $(this).html(`<i class="fas fa-compress-alt fa-fw"></i>`);

    }
});


//mobile menu
$(".aside-menu-open").click(function () {

    $(".aside-menu").animate({marginLeft:"0"});
});
$(".aside-menu-close").click(function () {
    $(".aside-menu").animate({marginLeft:"-100%"});
});


$(window).on("load",function () {
    $(".loader").fadeOut(500,function () {
        $(".page-content").fadeIn(500);
    });
})

function logout(){
    event.preventDefault();document.getElementById('logout-form').submit();
}

// function shortText(string, length) {
//     return string.length > length ?
//         string.substring(0, length) + '...' :
//         string;
// };
function htmltotext(text) {
    return strip_tags(html_entity_decode(text));
}


$(".table").dataTable();
