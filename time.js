var currentTime = new Date().getHours();
var times = document.getElementsByClassName("Staring_time");
var time = time.textContent;
var int_val = parseInt(time);
    if (currentTime > time) 
    {
            times.id = 'red';
    }