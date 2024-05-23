<script src="{{ asset('admin_assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="{{ asset('admin_assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/grid.js') }}"></script>
<script src="{{asset('admin_assets/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin_assets/sweetalert/sweetalert2.min.js')}}"></script>

<script>
    let notification = document.querySelector('#header-notification-toggle');
    notification.addEventListener('click',function(){

        $.ajax({

            type:'post',
            url:'/admin/notification/read-all',
            data:{_token: "{{ csrf_token() }}" },
            success:function(){
                console.log('yes')
            }

        })
    })
</script>