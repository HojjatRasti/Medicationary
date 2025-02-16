// search box codes
var searchBtn = document.querySelector('.search-btn');
var closeSearch = document.querySelector('.search-close');
// var searchResult = document.querySelector('.searchResultList');
// var searchInput = document.querySelector('.searchInput');

searchBtn.addEventListener('click',function(){

    searchBtn.classList.add('hide-btn', 'd-none');
    closeSearch.classList.remove('hide-btn' , 'd-none');


});

closeSearch.addEventListener('click',function(){

    searchBtn.classList.remove('hide-btn' , 'd-none');
    closeSearch.classList.add('hide-btn', 'd-none');

});

// searchInput.addEventListener('keyup',function(){

//     searchInput.value == "" ? searchResult.classList.add('d-none') : searchResult.classList.remove('d-none');

// });






// ask page codes

const askEmail = document.getElementById('askEmailInput');
const askPhone = document.getElementById('askPhoneInput');
const askSubBtn = document.getElementById('askSubBtn')

askSubBtn.addEventListener('click',function () {

    if (askEmail.value != ''){
        askPhone.removeAttribute('required');
    }else{
        askPhone.setAttribute('required','');
    };
});

