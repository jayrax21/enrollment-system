$(document).ready(function(){
    $('#pending').on('click',function(){
        $.ajax({
            url:"{{ route('pending') }}",
            method:'get',
            data:{id:""},
            success:function(data)
            {
                console.log(data);
            },
            error:function(err)
            {
                console.log(err);
            }
        })
    })
})