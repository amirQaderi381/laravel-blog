<header class="header-main bg-light">
    <section class="sidebar-header bg-gray">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
                <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i
                        class="fas fa-toggle-off"></i></span>
            <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i
                    class="fas fa-toggle-on"></i></span>
            <span>
                    <img class="logo" src="assets/images/logo.png" alt="">
                </span>
            <span class="d-md-none" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
        </section>
    </section>

    <section class="body-header">
        <section class="d-flex justify-content-between">
            <section>
                <!-- right section of body-header -->
                <span class="mr-5">
                        <!-- search-box -->
                        <span class="search-area p-2 d-none">
                            <i id="search-area-hide" class="fas fa-times pointer"></i>
                            <input type="text" class="search-input pointer">
                            <i class="fas fa-search"></i>
                        </span>
                    <i id="search-toggle" class="fas fa-search d-none d-md-inline p-1 pointer"></i>
                    </span>

                <!-- left section of body-header -->
                <span id="full-screen" class="pointer d-none d-md-inline p-1 mr-5">
                        <i id="screen-compress" class="fas fa-compress d-none"></i>
                        <i id="screen-expand" class="fas fa-expand "></i>
                    </span>

            </section>


            <section>

                <section class="header-comment rounded">
                    <section class="border-bottom px-4">
                        <input type="text" class="form-control form-control-sm shadow-none my-4" placeholder="جستجو ...">
                    </section>


                </section>

                <span id="header-profile-toggle" class="ml-2 ml-md-4 position-relative pointer">
                        <span>
                            <span class="header-username">
                                @if(auth()->user()) {{auth()->user()->name}} @else '' @endif
                            </span>
                    <span><i class="fas fa-chevron-down"></i></span>
                    </span>

                    <section class="header-profile rounded">
                        <section class="list-group rounded">
                            <a href="{{route('logout')}}" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-sign-out-alt"></i> خروج
                            </a>
                        </section>
{{--                        <section class="list-group rounded" style="z-index: 999999!important;">--}}
{{--                          <form action="{{route('logout')}}" method="POST" class="d-inline">--}}
{{--                            @csrf--}}
{{--                           <button class="btn btn-sm delete" type="submit"><i class="fas fa-sign-out-alt"></i> خروج</button>--}}
{{--                          </form>--}}
{{--                        </section>--}}
                    </section>
                    </span>

            </section>

        </section>
    </section>

</header>

