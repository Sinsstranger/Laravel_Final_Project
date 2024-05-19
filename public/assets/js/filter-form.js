document.querySelector("#extraFilters").hidden = true;

let form = document.forms.filter;
let queriesArray = [];
let btn = document.querySelector("#filterBtn");
let moreFiltersBtn = document.querySelector('#moreFilters');

console.log(moreFiltersBtn);

btn.addEventListener('click', handleFilter);
moreFiltersBtn.addEventListener('click', (event) => {
    event.preventDefault();
    let is_hidden = document.querySelector("#extraFilters").hidden
    is_hidden = !is_hidden;
    document.querySelector("#extraFilters").hidden = is_hidden;
    if (is_hidden) {
        moreFiltersBtn.innerHTML = "Больше фильтров";
    } else {
        moreFiltersBtn.innerHTML = "Меньше фильтров";
    }
})

function filterCategories() {
    let category = form.elements.category;
    let categoriesQuery = [];
    for (let i = 0; i < category.length; i++) {
        if (category[i].checked) {
            categoriesQuery.push(category[i].value);
        }
    }
    if (categoriesQuery.length) {
        let categoriesQueryString = categoriesQuery.join(',');
        queriesArray.push(`categories=${categoriesQueryString}`);
    }
}

function filterNumberOfRooms() {
    let checkedElem = document.querySelector('input[name="rooms"]:checked')
    if (checkedElem) {
        queriesArray.push(`rooms=${checkedElem.value}`);
    }
}

function filterNumberOfGuests() {
    let checkedElem = document.querySelector('input[name="guests"]:checked')
    if (checkedElem) {
        queriesArray.push(`guests=${checkedElem.value}`);
    }
}

function filterPeriod() {
    let checkedElem = document.querySelector('input[name="daily"]:checked')
    if (checkedElem) {
        queriesArray.push(`daily=${checkedElem.value}`);
    }
}

function filterPrice() {
    let minPrice = form.elements.minprice.value;
    let maxPrice = form.elements.maxprice.value;
    if (minPrice || maxPrice) {
        queriesArray.push(`price=${+minPrice},${+maxPrice}`);
    }
}

function handleFilter(event) {
    event.preventDefault();
    filterCategories();
    filterNumberOfRooms();
    filterNumberOfGuests();
    filterPeriod();
    filterPrice();
    let queryString = '?' + queriesArray.join('&');
    // console.log(queryString);
    location.href = queryString;
}
