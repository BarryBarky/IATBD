function editStars (id) {
    if (document.querySelector(`#${id} .stars`) && document.querySelector(`#${id}`).querySelector('#stars')) {
        activateStars(document.querySelector(`#${id} .stars`), document.querySelector(`#${id}`).querySelector('#stars'))
    }
}

function activateStars(parentEl, input) {
    const stars = parentEl.children;
    console.log(stars)
    for (let i = 0; i<stars.length; i++) {
        stars[i].addEventListener("mouseover", () => onMouseOverStar(stars[i], stars))
        stars[i].addEventListener("mouseout", () => removeAllStars(stars))
        stars[i].addEventListener("click", () => onClickStar(stars[i], stars, input))
    }
}

function removeAllStars(stars) {
    for (let i = 0; i < stars.length; i++) {
        if (!stars[i].classList.contains('sticky')){
            stars[i].classList.remove('fa-solid')
            stars[i].classList.add('fa-regular')
        }
    }
}

function starCount (star, allStars) {
    for (let i = 0; i< allStars.length; i++) {
        if (allStars[i] === star) {
            return i + 1
        }
    }
}

function onMouseOverStar(star, allStars) {
    removeAllStars(allStars)
    for (let i =0; i < starCount(star, allStars); i++) {
        allStars[i].classList.add('fa-solid')
    }

}

function onClickStar(star, allStars, input) {
    removeAllStars(allStars)
    for (let i =0; i < starCount(star, allStars); i++) {
        allStars[i].classList.add('fa-solid')
        allStars[i].classList.add('sticky')
    }
    input.value = starCount(star, allStars)
}


