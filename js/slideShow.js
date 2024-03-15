let cnt = 0;
let images = document.getElementsByClassName('image')
console.log(prevbutton);
console.log(nextbutton);

function control(x){
    cnt = cnt+x;
    if(cnt < images.length){
        slider(cnt)
    }
    else{
        cnt = 0
        slider(cnt)
    }
}

slider(cnt)

function slider(num){
    for(let i = 0 ; i < images.length; i++){
        images[i].style.display = 'none'
    }
    images[num].style.display ='block'
}

setInterval(() => {
    control(1)
}, 4000);