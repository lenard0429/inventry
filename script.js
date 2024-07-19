document.getElementById('addItemForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('itemName').value;
    const quantity = document.getElementById('itemQuantity').value;
    const price = document.getElementById('itemPrice').value;

    fetch('add_item.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${name}&quantity=${quantity}&price=${price}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        loadItems();
    });
});

function loadItems() {
    fetch('get_items.php')
        .then(response => response.json())
        .then(data => {
            const list = document.getElementById('inventoryList');
            list.innerHTML = '<h2>Current Inventory</h2>';
            data.forEach(item => {
                list.innerHTML += `<p>${item.name} - Quantity: ${item.quantity} - Price: ₱${item.price}</p>`;
            });
        });
}

loadItems();
