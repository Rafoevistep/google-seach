// Redirecting in google search input value
const searchInput = document.querySelector("#search-input");

searchInput.addEventListener("keydown", function (event) {
    if (event.code === "Enter") {
        event.preventDefault()
        search();
    }
});

function search() {
    const input = searchInput.value;

    window.location.href = "https://www.google.com/search?q=" + input + "&rlz=1C5CHFA_enNZ948NZ948&oq=" + input + "&aqs=chrome.0.69i59l2j46i175i199i433j46i199i291i433j46j0i433j0j69i60.875j0j9&sourceid=chrome&ie=UTF-8"
}

//-----------------------------------------


const handleOnChange = value => {
    if (value.length) {
        fetch(`http://google-serch.herokuapp.com/api/search?search=&search=${value}`)
            .then(response => response.json())
            .then(data => dropDown(data))
    } else
        setTimeout(() => {
            dropDown([])
        }, 100)
}

const dropDown = (data) => {
    const dropdownUl = document.querySelector('#result-list')
    dropdownUl.innerHTML = '';
        const createLinks = ({link, title}) => {
        const dropdownLi = document.createElement('li')
        dropdownLi.classList.add('fas', 'fa-search');
        const anchor = document.createElement('a')
        anchor.href = link
        anchor.textContent = title;
        const dropdownLiLink = dropdownLi.appendChild(anchor)
        return dropdownLi;

    }


    if (data.length) {
        data.map(({link, title}, i) => {

            if (i >= 8) {
                return
            } else {
                dropdownUl.append(createLinks(({link, title})))
            }
        })
    }
}
