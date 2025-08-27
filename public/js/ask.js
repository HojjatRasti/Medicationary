// search box codes
var searchBtn = document.querySelector('.search-btn');
var closeSearch = document.querySelector('.search-close');
var switchBtn = document.querySelector('.searchBtn')
var categoryBtn = document.querySelector('.categoryBtn');
var searchDiv = document.querySelector('.searchDiv');
var categoryDiv = document.querySelector('.categoryDiv');

searchBtn.addEventListener('click',function(){

    searchBtn.classList.add('hide-btn', 'd-none');
    closeSearch.classList.remove('hide-btn' , 'd-none');


});

closeSearch.addEventListener('click',function(){

    searchBtn.classList.remove('hide-btn' , 'd-none');
    closeSearch.classList.add('hide-btn', 'd-none');

});

switchBtn.addEventListener('click',function(){

    categoryDiv.classList.toggle('d-none');
    searchDiv.classList.toggle('d-none');

});

categoryBtn.addEventListener('click',function(){

    categoryDiv.classList.toggle('d-none');
    searchDiv.classList.toggle('d-none');

});






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

