document.getElementById("toggleDropdown").addEventListener("click", function() {
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
});


document.getElementById("filterInput").addEventListener("keyup", function() {
    const filterValue = document.getElementById('filterInput').value.toLowerCase();
    const userItems = document.querySelectorAll('.user-item');

    userItems.forEach(function(item) {
        const userName = item.getAttribute('data-name').toLowerCase();
        if (userName.includes(filterValue)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});