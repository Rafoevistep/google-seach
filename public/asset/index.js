// Redirecting in google search input value
const bod = document.querySelector('body')
const searchInput = document.querySelector("#search-input");
const dropdownUl = document.querySelector('#result-list')


searchInput.addEventListener("keydown", function (event) {
    dropdownUl.style.display = 'flex'
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
        axios.get(`http://127.0.0.1:8000/api/search?search=&search=${value}`)
            .then(data => dropDown(data.data))
    } else
        setTimeout(() => {
            dropDown([])
        }, 500)
}

const dropDown = (data) => {
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

bod.addEventListener('mouseup', function (event) {
    searchInput.value && (dropdownUl.style.display = 'none');
});
