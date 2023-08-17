function openEditPopup(oldValue) {
    document.getElementById('oldValue').value = oldValue;
    document.getElementById('editPopup').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}

function updateCategory() {
    let newValue = document.getElementById('newValue').value;
    if (newValue) {
        // Perform update logic here (e.g., send data to the server)
        console.log('Category updated to:', newValue);
    }
    closeEditPopup();
}
