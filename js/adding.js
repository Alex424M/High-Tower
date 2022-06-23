const name = document.getElementById('nameAd');
const cost = document.getElementById('costAd');
const type = document.getElementById('typeAd');
const address = document.getElementById('addressAd');
const params = document.getElementById('paramsAd');
const photo = document.getElementById('photoAd');
window.addEventListener('scroll', function () {
    if (Math.floor(pageYOffset) < 473) {
        deleteClass();
        name.classList.add("selectedSection");
    } else if (Math.floor(pageYOffset) < 600) {
        deleteClass();
        cost.classList.add("selectedSection");
    } else if (Math.floor(pageYOffset) < 820) {
        deleteClass();
        type.classList.add("selectedSection");
    } else if (Math.floor(pageYOffset) < 1020) {
        deleteClass();
        address.classList.add("selectedSection");
    } else if (Math.floor(pageYOffset) < 1267) {
        deleteClass();
        params.classList.add("selectedSection");
    } else if (Math.floor(pageYOffset) > 1267) {
        deleteClass();
        photo.classList.add("selectedSection");
    }
});
function deleteClass() {
    name.classList.remove("selectedSection");
    cost.classList.remove("selectedSection");
    type.classList.remove("selectedSection");
    address.classList.remove("selectedSection");
    params.classList.remove("selectedSection");
    photo.classList.remove("selectedSection");

}

function noDigits(event) {
    if ("-+=_!№;%:?*()\".,".indexOf(event.key) != -1)
        event.preventDefault();
}