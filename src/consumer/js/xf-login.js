var bg_H=document.getElementById('bg')
if(window.innerHeight){
    win_H=window.innerHieght;
}else if((document.body&&(document.body.clientHeight))){
    win_H=document.body.clientHeight;
}
bg_H.style.height=win_H+"px";