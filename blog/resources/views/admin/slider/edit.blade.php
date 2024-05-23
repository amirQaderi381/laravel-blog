@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اسلایدر</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اسلایدر</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش اسلایدر</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اسلایدر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.slider.update',$slider->id) }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="title">عنوان اسلایدر</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title',$slider->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="image">تصویر </label>
                                    <input type="file" class="form-control form-control-sm" name="image">
                                    <img class="mt-2 slider-image" src="{{ asset($slider->image) }}" alt="" width="300" height="100">
                                </div>
                                @error('image')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="title">موقعیت اسلایدر</label>
                                    <input type="number" class="form-control form-control-sm" name="position"
                                           value="{{ old('position',$slider->position) }}">
                                </div>
                                @error('position')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mb-2">
                                <section class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status',$slider->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status',$slider->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </section>
                                @error('status')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <button class="btn btn-primary btn-sm px-5">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection

{{--@section('script')--}}
{{--    <script>--}}
{{--        console.log( $('.slider-image').attr('src'))--}}

{{--        $('input[name="image"]').on('change' , function(){--}}
{{--            let fileList = $(this).prop('files')--}}
{{--            if (fileList.length > 0) {--}}
{{--                let file = fileList[0];--}}
{{--                let image = file.name;--}}
{{--                let baseUrl = "{{ asset('') }}";--}}
{{--                let imageUrl = baseUrl + image;--}}
{{--                $('.slider-image').attr('src', imageUrl);--}}
{{--                 //http://127.0.0.1:8000/third.png--}}
{{--            }--}}
{{--        })--}}

{{--    </script>--}}
{{--@endsection--}}

