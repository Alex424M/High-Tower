ymaps.ready(init);
const inp = document.getElementById('suggest1');
function init() {
    // Создаем выпадающую панель с поисковыми подсказками и прикрепляем ее к HTML-элементу по его id.
    var suggestView1 = new ymaps.SuggestView('suggest1');
    console.log(suggestView1);
    var myMap = new ymaps.Map('map', {
        center: [55.74, 37.58],
        zoom: 13,
        controls: []
    });

    var searchControl = new ymaps.control.SearchControl({
        options: {
            provider: 'yandex#search'
        }
    });
    myMap.controls.add(searchControl);
    searchControl.search(inp.value);
    inp.addEventListener('input', () => {
        searchControl.search(inp.value);
    });
}
