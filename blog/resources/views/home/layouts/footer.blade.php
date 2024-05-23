@php
    $addresses = \App\Models\Address::all();
    $quickLinkes = \App\Models\QuickLink::all();
@endphp

<section class="px-8 lg:px-16 xl:px-40 py-12 gap-4 bg-black text-white">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  ">

        <div class="space-y-5 mb-8">
            <h2 class="text-xl md:text-2xl">عضویت در خبرنامه</h2>
            <div class="text-sm xl:text-base">نام کاربری خود را بفرستید</div>
            <button class="border border-white py-2 px-10 rounded-full hover:text-black hover:bg-white text-sm">نام کاربری</button>
        </div>

        <div class="flex flex-col items-start space-y-5 mb-8">
            <div class="space-y-5">
                <h2 class="text-xl md:text-2xl">اطلاعات تماس</h2>
                <div class="text-sm xl:text-base">۶۰۹۱۱ - 85 - 66036270</div>
                <div class="text-sm xl:text-base">info@bpc.ir</div>
            </div>

            <div class="space-y-5 mt-5">
                <h2 class="text-xl md:text-2xl">لینک های سریع</h2>
                <div class="text-sm xl:text-base">
                    @foreach($quickLinkes as $link)
                        <a href="{{$link->link}}">{{$link->title}}</a>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="space-y-5">
            <h2 class="text-xl md:text-2xl">آدرس ها</h2>
            @foreach($addresses as $address)
              <div class="text-sm xl:text-base">{{$address->address}}</div>
            @endforeach
        </div>
    </div>
</section>
