<script src="{{ _adminJs('main/jquery.min.js') }}"></script>
<script src="{{ _adminJs('main/bootstrap.bundle.min.js') }}"></script>
@yield('_scripts')
{!! _alert() !!}
<script type='text/javascript'>
    $(function() {
        $('.DELETEITEM').on('click',function(){
            console.log($(this).find('form').submit());
        })
        $('.LOGOUT').on('click',function(){
            console.log($(this).find('form').submit());
        })
        $('.CHANGESTATUS').on('change',function(){
            console.log($(this).next().submit())
        })
        $('.CHANGETYPE').on('click',function(){
            console.log($(this).find('form').submit())
        })
    })

    
</script>
