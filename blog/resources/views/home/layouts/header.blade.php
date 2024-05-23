<nav class="bg-white lg:px-16 xl:px-40 w-full flex items-center justify-between sticky top-0 shadow z-30  transition duration-300 ease-in-out">
    <ul class="list-none lg:flex items-center hidden ">
        <li class="h-[5rem] mr-5 bg-orange-400 text-white hover:bg-orange-400 hover:text-white cursor-pointer p-3">
            <a class="flex items-center h-full" href="#home">خانه</a>
        </li>
        <li class="h-[5rem] mr-5  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center h-full" href="#services">خدمات</a>
        </li>
        <li class="h-[5rem] mr-5  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center h-full" href="#about-us">درباره ما</a>
        </li>
        <li class="h-[5rem] mr-5  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center h-full" href="#collaborators">همکاران ما</a>
        </li>
        <li class="h-[5rem] mr-5  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center h-full" href="#contact-us">تماس با ما</a>
        </li>
    </ul>

    <div class="flex lg:hidden  md:text-md w-1/4 sm:w-1/2 md:w-full text-2xl pr-12 cursor-pointer" id="menu">
        <i class="fa-solid fa-bars"></i>
    </div>

    <div class="flex items-center justify-evenly  w-full lg:w-auto">
        <p class="hidden sm:flex text-sm md:text-base ">شرکت ترابری و حمل و نقل به پخش</p>
        <img src="{{asset('./home/assets/images/logo.png')}}" class="pl-3 sm:pl-0 ml-8 mr-auto sm:mr-4  rounded-full w-20 h-20 " alt=""/>
    </div>
</nav>

<nav class="flex lg:hidden fixed right-[-100%] top-0 bottom-0 bg-white z-50 w-[15rem] md:w-[20rem] flex-col items-center transition duration-300 ease-in-out" id="mobile-nav">

    <div class="w-full flex items-center justify-between">
        <img src="{{asset('./home/assets/images/logo.png')}}" class="rounded-full w-20 h-20 mr-4" alt=""/>

        <div class="p-4 text-left cursor-pointer" id="close">
            <i class="fa-regular fa-circle-xmark text-3xl"></i>
        </div>
    </div>

    <ul class="w-full list-none flex flex-col items-center">
        <li class="w-full h-[5rem]  bg-orange-400 text-white hover:bg-orange-400 hover:text-white cursor-pointer p-3">
            <a class="flex items-center justify-center h-full" href="#home">خانه</a>
        </li>
        <li class="w-full h-[5rem]  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center justify-center h-full" href="#services">خدمات</a>
        </li>
        <li class="w-full h-[5rem]   hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center justify-center h-full" href="#about-us">درباره ما</a>
        </li>
        <li class="w-full h-[5rem]  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center justify-center h-full" href="#collaborators">همکاران ما</a>
        </li>
        <li class="w-full h-[5rem]  hover:bg-orange-400 hover:text-white cursor-pointer lg:p-2 xl:p-3 ">
            <a class="flex items-center justify-center h-full" href="#contact-us">تماس با ما</a>
        </li>
    </ul>
</nav>
