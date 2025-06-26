// Select necessary DOM elements
const cartButton = document.getElementById('cart-button');
const cartDropdown = document.getElementById('cart-dropdown');
const cartItemsList = document.getElementById('cart-items');
const cartCount = document.getElementById('cart-count');
const checkoutButton = document.getElementById('checkout-button');
const addToCartButtons = document.querySelectorAll('.add-to-cart');

let cart = [];

// Function to update cart UI
function updateCartUI() {
  cartItemsList.innerHTML = ''; // Clear existing items

  if (cart.length === 0) {
    cartItemsList.innerHTML = '<li class="empty-message">Your cart is empty.</li>';
    checkoutButton.classList.add('hidden'); // Hide checkout button
    cartCount.textContent = 0;
    return;
  }

  cart.forEach((item, index) => {
    const li = document.createElement('li');
    li.textContent = `${item.name} - $${item.price}`;

    // Create a Remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('remove-btn');
    removeButton.dataset.index = index; // Attach the item's index to the button

    // Add click event listener to remove the item
    removeButton.addEventListener('click', handleRemoveFromCart);

    li.appendChild(removeButton);
    cartItemsList.appendChild(li);
  });

  checkoutButton.classList.remove('hidden'); // Show checkout button
  cartCount.textContent = cart.length;
}

// Function to handle Add to Cart
function handleAddToCart(event) {
  const button = event.target;
  const name = button.dataset.name;
  const price = parseFloat(button.dataset.price); // Ensure price is a number

  cart.push({ name, price });
  updateCartUI();
}

// Function to handle Remove from Cart
function handleRemoveFromCart(event) {
  const button = event.target;
  const index = parseInt(button.dataset.index); // Get the item's index from the button
  cart.splice(index, 1); // Remove the item from the cart array
  updateCartUI();
}

// Function to handle Checkout
function handleCheckout() {
  if (cart.length === 0) return;

  // Calculate total price
  const totalPrice = cart.reduce((total, item) => total + item.price, 0);

  // Show an alert with the total price
  alert(`Your total is $${totalPrice.toFixed(2)}. Thank you for your purchase!`);

  // Clear the cart
  cart = [];
  updateCartUI();
}

// Add event listeners to Add to Cart buttons
addToCartButtons.forEach(button => {
  button.addEventListener('click', handleAddToCart);
});

// Add event listener to the Checkout button
checkoutButton.addEventListener('click', handleCheckout);

// Toggle cart dropdown visibility
cartButton.addEventListener('click', () => {
  cartDropdown.classList.toggle('hidden');
});