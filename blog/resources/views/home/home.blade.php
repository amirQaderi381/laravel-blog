@extends('home.layouts.master')

@section('content')

    <section class="p-6 gap-4" id="home">

        <div class=" gap-4">

            <div class="swiper home-swiper rounded-md w-full h-[20rem] sm:h-[37rem] md:h-full">

                <div class="swiper-wrapper">

                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <img src="{{asset($slider->image)}}" loading="lazy"/>
                            <div class="swiper-lazy-preloader"></div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="flex flex-col  md:flex-row items-center justify-around my-12">

            <div class="mb-3 transition duration-300 ease-in group  cursor-pointer flex flex-col items-center justify-center p-2 shadow-xl rounded-t-2xl rounded-l-2xl space-y-5 h-[12rem] w-[22rem] md:w-[12rem] lg:w-[18rem] bg-white">
                <img src="{{asset('./home/assets/images/Transportation1.png')}}" width="75"/>
                <span> حمل و نقل زمینی</span>
            </div>

            <div class="mb-3 transition duration-300 ease-in group  cursor-pointer flex flex-col items-center justify-center p-2 shadow-xl rounded-t-2xl rounded-l-2xl space-y-5 h-[12rem] w-[22rem] md:w-[12rem] lg:w-[18rem] bg-white">
                <img src="{{asset('./home/assets/images/Transportation2.png')}}" width="75"/>
                <span>حمل و نقل هوایی</span>
            </div>

            <div class="mb-3 transition duration-300 ease-in group  cursor-pointer flex flex-col items-center justify-center p-2 shadow-xl rounded-t-2xl rounded-l-2xl space-y-5 h-[12rem] w-[22rem] md:w-[12rem] lg:w-[18rem] bg-white">
                <img src="{{asset('./home/assets/images/Transportation3.png')}}" width="75"/>
                <span >حمل و نقل دریایی </span>
            </div>

        </div>

    </section>

    <section id="services" class="px-8 lg:px-16 xl:px-40 py-12 gap-4 bg-white">
        <h2 class="pb-8 text-2xl lg:text-3xl text-center md:text-right">خدمات حمل و نقل</h2>

        <div class="py-3">

            @foreach($services as $service)
                <div class="w-full lg:w-1/2 flex flex-col items-start p-6 md:p-2 {{$loop->even ? 'lg:mr-auto' : ''}}">

                    <div class="flex items-center">
                  <span class="py-[15px] pl-[11px]">
                    <i class="fa fa-briefcase w-3 md:w-5 h-3 md:h-5 bg-orange-400 text-white rounded-[50px] p-3"></i>
                 </span>
                        <h3>{{$service->title}}</h3>
                    </div>

                    <p class="text-[#757575] text-justify break-words text-sm md:text-md lg:text-base">
                       {{$service->description}}
                    </p>
                </div>
            @endforeach
        </div>

    </section>

    <section id="about-us" class="px-8 lg:px-16 xl:px-40 py-12 gap-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-10">

            @foreach($certificates as $certificate)

                <div class="work-item p-4 cursor-pointer">
                    <div class="work-item-inner overflow-hidden relative transition duration-300 ease-in-out group">
                        <img class="transition duration-300 scale-110 group-hover:scale-100"
                             src="{{asset($certificate->image)}}" data-target="{{asset(asset($certificate->image))}}" alt="">
                        <span class="absolute inset-0 w-full h-full group-hover:bg-black group-hover:bg-opacity-80 text-white">
                     <p class="opacity-0 group-hover:opacity-100 absolute bottom-3.5 right-3.5">{{$certificate->title}}</p>
                     <i class="far fa-eye absolute left-2.5 top-2.5 opacity-0 group-hover:opacity-100"></i>
                 </span>
                    </div>
                </div>
            @endforeach

        </div>

        <section class="light-box fixed inset-0 hidden bg-black bg-opacity-70 flex justify-center items-center z-50">
            <div class="img-box px-6 sm:px-0  relative py-7 ">
                <div class="close text-white text-xl cursor-pointer absolute top-[-1%]">
                    <i class="fas fa-times"></i>
                </div>
                <img src="{{asset('/home/assets/images/works/thumb/1.jpg')}}" class="lightbox-img w-full h-[550px] lg:h-[35rem]" alt="">
                <div class="lightbox-caption flex items-center justify-between">
                    <div class="lightbox-category text-white">
                        <h6>کپشن عکس اول</h6>
                    </div>
                    <div class="lightbox-counter text-white">
                        6/1
                    </div>
                </div>
                <div class="lightbox-control absolute inset-x-0 top-1/2 flex justify-between items-center m-auto w-[95%]">
                    <div class="next text-black cursor-pointer"><i class="fas fa-angle-right text-2xl w-[20px]"></i></div>
                    <div class="prev text-black text-2xl w-[20px] cursor-pointer"><i class="fas fa-angle-left"></i></div>
                </div>
            </div>
        </section>
    </section>

    <section id="collaborators" class="px-8 lg:px-16 xl:px-40 py-12 gap-4 flex flex-col justify-center items-center bg-white">

        <h2 class="pb-4 text-2xl lg:text-3xl"> همکاران ما</h2>

        <div class="swiper collaborators-swiper !w-[70%] sm:!w-1/2 md:!w-full">

            <div class="swiper-wrapper">
                @foreach($collaborators as $collaborator)
                    <div class="swiper-slide bg-black   md:w-[17rem] h-full">
                        <img src="{{asset($collaborator->image)}}" class="w-full object-cover" />
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <section id="contact-us" class="px-8 lg:px-16 xl:px-40 py-12 gap-4 bg-blue-600">
        <div class="grid grid-cols-1 md:grid-cols-2 ">

            <div class="">
                <h2 class="text-white text-2xl lg:text-3xl pb-4">تماس با ما</h2>
                <span class="text-white text-sm lg:text-md">ما منتظر راهنمایی شما هستیم</span>

                <form action="{{route('contact.store')}}" method="post" class="flex flex-col items-start space-y-6 py-6 w-full">
                    @csrf
                    <input type="text" name="name" class="px-2 py-3 w-full rounded-lg text-sm" placeholder="نام و نام خانوادگی"/>
                    @error('name')
                    <span class="bg-red-600 px-4 py-1 text-white rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                    @enderror
                    <input type="text" name="user_name" class="px-2 py-3 w-full rounded-lg text-sm" placeholder="نام کاربری" />
                    @error('user_name')
                    <span class="bg-red-600 px-4 py-1 text-white rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                    @enderror
                    <textarea rows="5" name="comment" class="px-2 py-3 w-full rounded-lg text-sm" placeholder="توضیحات"></textarea>
                    @error('comment')
                    <span class="bg-red-600 px-4 py-1 text-white rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                    @enderror
                    <button type="submit" class="bg-white py-2 md:py-4 px-10 rounded-full text-sm">ارسال</button>
                    @if (Session::has('success'))
                        <span class="text-green-500 font-bold">نظر شما با موفقیت ثبت شد</span>
                    @endif
                </form>
            </div>

            <div class="hidden md:flex my-auto mr-auto">
                <img src="{{asset('./home/assets/images/download.jpeg')}}" class="rounded-full"/>
            </div>
        </div>
    </section>

@endsection
