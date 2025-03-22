$(document).ready(function() {
    var count = 5;
    setInterval(function(){
        count--;
        document.getElementById('countdown').innerHTML = count;
        if (count == 1) {
            window.location = '/'; 
        }
    },1000);
});