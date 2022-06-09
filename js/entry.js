const entr = document.querySelectorAll(".entr");
const reg = document.querySelectorAll(".reg");

const btn = document.querySelector(".header__btn");
btn.onclick = function () {
    document.getElementById('entryForm').style.display = 'block';
    reg[0].classList.add("notActive");
    entr[0].classList.remove("notActive");
}

const closeBtn = document.querySelectorAll(".close");
closeBtn.forEach(element => {
    element.onclick = function () {
        document.getElementById('entryForm').style.display = 'none';
        document.getElementById('regForm').style.display = 'none';
    }
});


entr[1].onclick = function () {
    document.getElementById('entryForm').style.display = 'block';
    document.getElementById('regForm').style.display = 'none';
    reg[0].classList.add("notActive");
    entr[0].classList.remove("notActive");
}

reg[0].onclick = function () {
    document.getElementById('regForm').style.display = 'block';
    document.getElementById('entryForm').style.display = 'none';
    entr[1].classList.add("notActive");
    reg[1].classList.remove("notActive");
}

const modal = document.getElementById('entryForm');
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
const modal1 = document.getElementById('entryForm');
window.onclick = function (event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
