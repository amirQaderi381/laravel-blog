

<script src="{{asset('./js/jquery.min.js')}}"></script>
<script src="{{asset('./js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('./js/all.min.js')}}"></script>
<script src="{{asset('./js/fontawesome.min.js')}}"></script>

<script>
    const homeSwiper = new Swiper('.home-swiper', {
        crossFade:true,
        loop:true,
        autoplay:true
    });

    const collaboratorsSwiper = new Swiper('.collaborators-swiper' , {
        crossFade:true,
        loop:true,
        spaceBetween: 30,
        autoplay:true,

        breakpoints : {
            768 : {
                slidesPerView: 2,
            },
            1024 : {
                slidesPerView: 3,
            }
        }
    })

    index = 0;
    items = $(".work-item").length;


    $(".work-item-inner").click(function() {
        index = $(this).parent().index();
        $(".light-box").removeClass("hidden");
        $(".light-box").addClass("flex");
        lightBoxSlideShow();
    });

    $(".lightbox-control .prev").click(function() {
        if (index == 0) {
            index = items - 1;
        } else index--;
        lightBoxSlideShow();
    });

    $(".lightbox-control .next").click(function() {
        if (index == items - 1) {
            index = 0;
        } else index++;
        lightBoxSlideShow();
    });

    $(".light-box .close").click(function() {
        console.log($(".light-box"))
        $(".light-box").removeClass("flex");
        $(".light-box").addClass("hidden");
    });

    $(".light-box").click(function(event) {
        if ($(event.target).hasClass("light-box")) {
            $(this).removeClass("flex");
            $(".light-box").addClass("hidden");
        }
    });

    function lightBoxSlideShow() {
        const imgSrc = $(".work-item").eq(index).find("img").attr("data-target");
        const category = $(".work-item").eq(index).find("p").html();

        $(".lightbox-img").attr("src", imgSrc);
        $(".lightbox-category").html(category);
        $(".lightbox-counter").html(items + "/" + (index + 1));
    }

    let topMenu = $("nav"),
        topMenuHeight = topMenu.outerHeight()+15,
        menuItems = topMenu.find("a"),

        scrollItems = menuItems.map(function(){
            let item = $($(this).attr("href"));
            if (item.length) { return item; }
        });

    $(window).scroll(function(){

        let fromTop = $(this).scrollTop()+topMenuHeight;

        let cur = scrollItems.map(function(){
            if ($(this).offset().top < fromTop)
                return this;
        });

        cur = cur[cur.length-1];
        let id = cur && cur.length ? cur[0].id : "";

        menuItems
            .parent().removeClass("bg-orange-400 text-white")
            .end().filter("[href='#"+id+"']").parent().addClass("bg-orange-400 text-white");
    });

    $('#menu').click(function(){
        $('#mobile-nav').toggleClass('right-[-100%] right-0')
        let layout = $('<div class="bg-black bg-opacity-70 absolute inset-0 z-30">');
        $('#overlay').append(layout)
    })

    $('#close').click(function (){
        hideMobileNav()
    })

    $('#overlay').click(function(){
        hideMobileNav()
    })

    function hideMobileNav() {
        $('#mobile-nav').toggleClass('right-[-100%] right-0')
        let layout = $('#overlay').children();
        $(layout).remove()
    }

</script>
