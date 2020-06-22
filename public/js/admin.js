window.addEventListener('load',function(){
    var bars= document.getElementById('bars');
    var close = document.getElementById('close');
    bars.addEventListener('click',function(){
        document.getElementById('menu').style.width='250px';
        document.getElementById('content').style.marginLeft='250px';
    })
    close.addEventListener('click',function(){
        document.getElementById('menu').style.width='0';
        document.getElementById('content').style.marginLeft='0';
    })
})