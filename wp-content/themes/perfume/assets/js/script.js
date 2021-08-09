$(function (){
    var link = "<a href=''>طراحی و اجرا توسط کدکس</a>"
    $("#ourlink").html(link);
    $('#new-carousel-2').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
    $('#new-carousel-3').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
});
$(window).load(function () {
    $(".dd-loading-background").addClass('d-none');
    var menuItems = $("ul.top-menu").children();
    console.log(typeof(menuItems));
    var len = menuItems.length;
    console.log(len);
    var i=0;
    var checher =0;
    $(".menu_and_logo .menu").append("<ul class='top-menu new'></ul>")
 

    // createMenu(menuItems);
    // function createMenu(array) {
    //     var main = $(".menu_and_logo .menu");
    //     for (var i = 0; i < array.length; i++) {          
    //         main.append($("<li>").append("<a href='#'>"+array.eq[i]+"<span></span></a>"));
    //     }    
    // }
    if(len>9){
        $("ul.top-menu").children().each(function(){
            // console.log($(this).html());
            if(i<9){
                $("ul.top-menu.new").append("<li class='category'>"+$(this).html()+"");
            }
             if(i>=9){
                if(checher == 0){
                   $("ul.top-menu.new").append("<li class='category'><a data-depth='0'>ادامه منو...</a>");
                   $("ul.top-menu.new li").last().append("<ul class='sub-menu'>");
                    checher = 1;
                }
                $("ul.top-menu.new>li:last>ul.sub-menu").append("<li class='category'>"+$(this).html()+"");
             }
            i++;
        });
        $("ul.top-menu:not(.new)").remove();
    }else{

    }

});
