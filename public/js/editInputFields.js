const editInputFields = (parent) => {
    console.log(parent)
    const inputs = parent.querySelectorAll('input')
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].readOnly) {
            inputs[i].readOnly = false;
        }
    }
}
