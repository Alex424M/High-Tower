const entr = document.querySelector(".entr");
const reg = document.querySelector(".reg");

const btn = document.querySelector(".header__btn");
btn.onclick=function(){
document.getElementById('entryForm').style.display='block';
reg.classList.add("notActive");
entr.classList.remove("notActive");
}
const closeBtn = document.querySelector(".close");
closeBtn.onclick=function(){
document.getElementById('entryForm').style.display='none';
}

entr.onclick =function() {
    reg.classList.add("notActive");
    entr.classList.remove("notActive");
    // document.getElementById('entryForm').style.display='block';
    // document.getElementById('regForm').style.display='none';
}

reg.onclick =function() {
    entr.classList.add("notActive");
    reg.classList.remove("notActive");
    // document.getElementById('regForm').style.display='block';
    // document.getElementById('entryForm').style.display='none';
}

const modal = document.getElementById('entryForm');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}