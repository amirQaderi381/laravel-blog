@extends('admin.layouts.master')

@section('head-tag')
    <title>همکاران ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">همکاران ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>همکاران ها</h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.collaborator.create')}}" class="btn btn-info btn-sm">ایجاد همکاران </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان همکاران</th>
                            <th>تصویر</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($collaborators as $key => $collaborator)
                            <tr>
                                <th>{{ $key += 1 }}</th>
                                <td>{{ $collaborator->title }}</td>
                                <td>
                                    <img src="{{ asset($collaborator->image) }}" alt="" width="100" height="50">
                                </td>
                                <td>
                                    <label>
                                        <input id="{{ $collaborator->id }}" onchange="changeStatus({{ $collaborator->id }})"
                                               data-url="{{ route('admin.collaborator.status', $collaborator->id) }}"
                                               type="checkbox" @if ($collaborator->status === 1) checked @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.collaborator.edit',$collaborator->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form action="{{ route('admin.collaborator.destroy',$collaborator->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function changeStatus(id) {

            let input_status = $('#' + id);
            let url = input_status.attr('data-url');
            let elementValue = !input_status.prop('checked');
            console.log(url)

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            input_status.prop('checked', true);
                            successToast('همکاران با موفقیت فعال شد');

                        } else {

                            input_status.prop('checked', false);
                            successToast('همکاران با موفقیت غیر فعال شد');
                        }

                    } else {

                        input_status.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است');
                    }
                },
                error: function() {

                    input_status.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد');
                }
            })
        }

        function successToast(message) {
            let successToastElements = ' <section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                ' <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '  <span aria-hidden="true">&times;</span>' +
                ' </button>\n' +
                ' </section>\n' +
                '</section>\n';

            $('.toast-wrapper').append(successToastElements);
            $('.toast').toast('show').delay(5500).queue(function() {
                $(this).remove();
            });
        }

        function errorToast(message) {
            let errorToastElements = ' <section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                ' <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '  <span aria-hidden="true">&times;</span>\n' +
                ' </button>\n' +
                ' </section>\n' +
                '</section>\n';

            $('.toast-wrapper').append(errorToastElements);
            $('.toast').toast('show').delay(5500).queue(function() {
                $(this).remove();
            });
        }
    </script>

    @include('admin.alerts.sweetalert.confirm-delete',['className'=>'delete'])
@endsection
