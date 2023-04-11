const fileUpload = (file, el) => {
    // let file = this.files[0];
    const reader = new FileReader();
    const parent = el.parentElement;
    reader.onload = function (e) {
        parent.style.backgroundImage = `url(${e.target.result})`;
    };

    reader.readAsDataURL(file);
}
