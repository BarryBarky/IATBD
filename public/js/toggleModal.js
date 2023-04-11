const toggleModal = (id = '') => {
    let modal;
    if (id) {
        modal =  document.querySelector(`#${id}`).parentElement
        console.log(modal)
        if(id === 'create-review'){
            console.log(id)
            editStars('create-review')
        }
    } else {
        modal = document.querySelector('.popup-parent')
    }
    // toggle add classlist
    if (modal.classList.contains('show')) {
        modal.classList.remove('show');
    } else {
        modal.classList.add('show');
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        }
    }

}
