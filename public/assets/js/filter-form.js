console.log('hello from filter');

let form = document.forms.filter;
let category = form.elements.category;
let queryString = "?";
let btn = document.querySelector("#filterBtn");

btn.addEventListener('click', handleFilter);

function filterCategories() {
    let categoriesQuery = [];
    for (let i = 0; i < category.length; i++) {
        if (category[i].checked) {
            categoriesQuery.push(category[i].value);
        }
    }
    if (categoriesQuery.length) {
        let categoriesQueryString = categoriesQuery.join(',');
        queryString += `category=${categoriesQueryString}&`;
    }
}

function filterNumberOfRooms() {
    let checkedElem = document.querySelector(`input[name="rooms"]:checked`)
    if (checkedElem) {
        queryString += `rooms=${checkedElem.value}&`;
    }
}

function filterNumberOfGuests() {
    let checkedElem = document.querySelector(`input[name="guests"]:checked`)
    if (checkedElem) {
        queryString += `guests=${checkedElem.value}&`;
    }
}

function handleFilter() {
    event.preventDefault();
    filterCategories();
    filterNumberOfRooms();
    filterNumberOfGuests();
    // console.log(queryString);
    location.href = queryString;
}
