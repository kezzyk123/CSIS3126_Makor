<?php
        /* user session check in*/
   
    session_start();
   
    include_once "connect.php";
    // Checks to see if user is logged in
    if (!isset($_SESSION['user_id'])) {
  
        header("location: login.php");
        exit; // Terminate script
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planning | Shopping List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .nav {
            width: 100%;
            background-color: #fff;
            border-bottom: 2px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            }

        .nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .nav ul li {
            margin-right: 30px;
        }

        .nav ul li:last-child {
            margin-right: 0;
        }

        .nav ul li a {
            text-decoration: none;
            font-weight: 500;
            font-size: 17px;
            font-family: verdana;
            color: black;
        }

        .nav ul li a:hover {
            color: #495057;
        }

        .logo img {
            width: 80px;
        }

        .nav ul .active::after {
            content: "";
            width: 60%;
            height: 3px;
            background-color: gray;
            display: flex;
            position: relative;
            margin-left: 10px;
        }

        @import url(https://fonts.googleapis.com/css?family=Indie+Flower);

        body {
        font-family: "Indie Flower", cursive;
        letter-spacing: 0.1rem;
        background-image: linear-gradient(90deg, #e8b6b6, 2px, rgba(255,255,255,0), 2px, rgba(255,255,255,0)), linear-gradient(0, #d9eaf3, 1px, rgba(255,255,255,0), 2px, rgba(255,255,255,0));
        background-position: 4rem 0;
        background-size: 100% 2.4rem;
        color: #111;
        padding: 2.2rem 0 0 5rem;  
        white-space: nowrap;
        counter-reset: listCounter;
        }

        h1 {
        font-size: 3.2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        }

        h2 {
        display: inline-block;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.6rem;
        border-bottom: 2px solid #111;
        }

        .continuous-list {
        font-size: 1.8rem;
        font-weight: 400;
        padding-left: 0.5rem;
        margin-bottom: 2.8rem;
        }

        .continuous-list li {
        margin-bottom: 0.6rem;
        }

        /* css for my shopping list*/
        #shoppingListsContainer {
        position: fixed;
        top: 0;
        right: 0;
        width: 300px; /* Adjust the width as needed */
        height: 100%; /* Take full height of the screen */
        background-color: #f0f0f0; /* Example background color */
        overflow-y: auto; /* Enable vertical scrolling if content overflows */
        border-left: 1px solid #ccc; /* Example border for separation */
        padding: 20px; /* Example padding for content spacing */
        box-sizing: border-box; /* Include padding and border in element's total width and height */
    }

      




    </style>
</head>
<body>
<section class="menu">
        <div class="nav">
            <div class="logo">
                <img src="./Images/favicon.jpg" alt="logo"></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a  href="meal_gallery.php">Browse Meals</a></li>
                    <li><a class="active" href="shopping_list.php">Shopping List</a></li>       
                    <li><a href="rating_screen.php">Meal Reviews</a></li>    
                    <li><a  href="add_meals.php">Add Custom Meals</a></li>     
                </ul>         
                <div class=>
                    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='logout.php'" class="logout">Log out</button>
                   
                </div>
        </div>
    </section>
    
    <h1>Shopping List</h1>

    <button onclick="createNewList()">Create New List</button>
    <button onclick="fetchShoppingLists()" >Display Shopping Lists</button>
   
    
  



            
        <script>
        
            let listCounter = 1;
    /* function to create a new list*/
            function createNewList() {
                const listName = prompt("Enter the name for your new list:");
                if (listName) {
                    const newListId = `list-${listCounter}`;
                    const newListTitle = document.createElement('h2');
                    newListTitle.textContent = listName;
                    document.body.appendChild(newListTitle);

                    const newListForm = document.createElement('form');
                    newListForm.id = `form-${newListId}`;
                    newListForm.innerHTML = `
                        <input type="text" id="item-${newListId}" placeholder="Item">
                        <input type="number" id="quantity-${newListId}" placeholder="Quantity">
                        <button type="button" onclick="addItem('${newListId}')">Add</button>
                    `;
                    document.body.appendChild(newListForm);

                    const newList = document.createElement('ul');
                    newList.id = `items-${newListId}`;
                    newList.className = 'shopping-list';
                    document.body.appendChild(newList);

                    const saveButton = document.createElement('button');
                    saveButton.textContent = 'Save';
                    saveButton.onclick = function() {
                        createNewListAJAX(listName, newListId);
                    };
                    document.body.appendChild(saveButton);

                    listCounter++;

                    // Call function to fetch and display shopping lists
                    fetchShoppingLists();
                    createNewListAJAX(listName, newListId);
                }
            }

            function createNewListAJAX(listName, newListId) {
                const items = Array.from(document.getElementById(`items-${newListId}`).querySelectorAll('li'));
                const itemList = items.map(item => {
                    const itemName = item.textContent.split(' - ')[0];
                    const quantity = parseInt(item.textContent.split(' - ')[1].split(':')[1]);
                    return { item_name: itemName, quantity: quantity };
                });

                // Prepare form data
                const formData = new FormData();
                formData.append('list_name', listName);
                formData.append('list_id', newListId);
                formData.append('item_list', JSON.stringify(itemList));

                // Send AJAX request to save the list
                fetch('save_lists.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Handle response
                    console.log(data); // Log the response from the server
                    alert('Shopping list saved successfully!');
                })
                .catch(error => console.error('Error saving shopping list:', error));
            }


            function addItem(listId) {
                const itemField = document.getElementById(`item-${listId}`);
                const quantityField = document.getElementById(`quantity-${listId}`);
                const item = itemField.value.trim();
                let quantity = quantityField.value.trim();
                if (item !== '' && quantity === '') {
                    quantity = '1';
                }
                if (item !== '') {
                    // Send AJAX request to add item to the list
                    const formData = new FormData();
                    formData.append('list_name', listId); 
                    formData.append('item_name', item); 
                    formData.append('quantity', quantity);
                    fetch('creat_list.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        // Handle response
                        console.log(data); // Log the response from the server
                        // If successful, update  to display the added item
                        const list = document.getElementById(`items-${listId}`);
                        const listItem = document.createElement('li');
                        listItem.innerHTML = `x<span id="quantity-${listId}-${item}">${quantity}</span> ${item} <button onclick="incrementQuantity('${listId}', '${item}')">+</button> <button onclick="decrementQuantity('${listId}', '${item}')">-</button> <button onclick="deleteItem(this)">Delete</button>`;
                        list.appendChild(listItem);
                        itemField.value = '';
                        quantityField.value = '';
                    })
                    .catch(error => console.error('Error adding item to list:', error));
                }
                fetchShoppingLists();
            }

    /* to delete items*/
            function deleteItem(button) {
                const listItem = button.parentNode;
                const list = listItem.parentNode;
                list.removeChild(listItem);
                fetchShoppingLists();

            }
    /* to increment items*/
            function incrementQuantity(listId, item) {
                const quantitySpan = document.getElementById(`quantity-${listId}-${item}`);
                let quantity = parseInt(quantitySpan.textContent);
                quantity++;
                quantitySpan.textContent = quantity;
                fetchShoppingLists();
            }
    /* to decrement items*/
            function decrementQuantity(listId, item) {
                const quantitySpan = document.getElementById(`quantity-${listId}-${item}`);
                let quantity = parseInt(quantitySpan.textContent);
                if (quantity > 1) {
                    quantity--;
                    quantitySpan.textContent = quantity;
                    fetchShoppingLists();
                }
            }

            function fetchShoppingLists() {    /* I will fix later*/
            fetch('fetch_shopping.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Process the fetched data and display shopping lists on the page
                    displayShoppingLists(data);
                })
                .catch(error => console.error('Error fetching shopping lists:', error));
        }

            function displayShoppingLists(shoppingLists) {
            const shoppingListsContainer = document.getElementById('shoppingListsContainer');
           
            // Clear previous content
            shoppingListsContainer.innerHTML = '';

            // Group items by list name
            const groupedLists = {};
            shoppingLists.forEach(list => {
                if (!groupedLists[list.list_name]) {
                    groupedLists[list.list_name] = [];
                }
                groupedLists[list.list_name].push({ item_name: list.item_name, quantity: list.quantity });
            });

            // Create a list to hold the shopping lists
            const listContainer = document.createElement('ul');

            // Iterate through each shopping list
            for (const listName in groupedLists) {
                if (Object.prototype.hasOwnProperty.call(groupedLists, listName)) {
                    // Create a list item for each shopping list
                    const listItem = document.createElement('li');
                    listItem.textContent = `List Name: ${listName}`;

                    // Create a sublist for items
                    const itemList = document.createElement('ul');

                    // Iterate through each item in the shopping list
                    groupedLists[listName].forEach(item => {
                        // Create a list item for each item
                        const itemListItem = document.createElement('li');
                        itemListItem.textContent = `${item.item_name} - Quantity: ${item.quantity}`;
                        itemList.appendChild(itemListItem);
                    });

                    // Append the sublist to the main list item
                    listItem.appendChild(itemList);

                    // Append the list item to the list container
                    listContainer.appendChild(listItem);
                }
            }

            // Append the list container to the shoppingListsContainer
            shoppingListsContainer.appendChild(listContainer);
        }
      
    </script>
          
</body>
</html>
