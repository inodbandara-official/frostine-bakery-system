// Get the modal elements
var addModal = document.getElementById("supplierModal");
var editModal = document.getElementById("editsupplierModal");
var deleteModal = document.getElementById("deletesupplierModal");

// Get the button that opens the modal
var addBtn = document.querySelector(".add-supplier");

// Get the <span> element that closes the modal
var closeBtns = document.querySelectorAll(".close");

// When the user clicks the button, open the add supplier modal
addBtn.onclick = function() {
    addModal.style.display = "block";
}

// When the user clicks on close, close the modals
closeBtns.forEach(function(btn) {
    btn.onclick = function() {
        addModal.style.display = "none";
        editModal.style.display = "none";
        deleteModal.style.display = "none";
    }
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == addModal || event.target == editModal || event.target == deleteModal) {
        addModal.style.display = "none";
        editModal.style.display = "none";
        deleteModal.style.display = "none";
    }
}

// Form validation function
function validateForm(supplierName,address,contactNumber,productName,price,quantity) {
    let isValid = true;
    let errorMessage = "";

    // Name validation
    if (!/^[a-zA-Z\s]+$/.test(supplierName) || !/^[a-zA-Z\s]+$/.test(productName)) {
        errorMessage += "Names should only contain letters and spaces\n";
        isValid = false;
    }
    // Address validation
    if (!/^[a-zA-Z0-9\s,]+$/.test(address)) {
        errorMessage += "Address should only contain letters, numbers, and commas\n";
        isValid = false;
    }

    // Contact validation
    if (!/^\d{10}$/.test(contact)) {
        errorMessage += "Contact number should be exactly 10 digits\n";
        isValid = false;
    }
    // Price validation
    if (!/^\d+(\.\d{1,2})?$/.test(price)) {
        errorMessage += "Price should be a number with up to 2 decimal places\n";
        isValid = false;
    }
    // Quantity validation
    if (!/^\d+$/.test(quantity)) {
        errorMessage += "Quantity should be a whole number\n";
        isValid = false;
    }

    if (!isValid) {
        alert(errorMessage);
    }
    return isValid;
}

// Handle edit supplier form submission
document.querySelector('#editsupplierModal form').onsubmit = function(e) {
    const supplierName = document.getElementById('edit_supplierName').value;
    const address = document.getElementById('edit_address').value;
    const contact = document.getElementById('edit_contact').value;
    const productName = document.getElementById('edit_productName').value;
    const price = document.getElementById('edit_price').value;
    const quantity = document.getElementById('edit_quantity').value;

    if (!validateForm(supplierName, address, contact, productName, price, quantity)) {
        e.preventDefault();
        return false;
    }
};

// Handle add supplier form submission
document.querySelector('#supplierModal form').onsubmit = function(e) {
    const supplierName = document.getElementById('supplierName').value;
    const address = document.getElementById('address').value;
    const contact = document.getElementById('contact').value;
    const productName = document.getElementById('productName').value;
    const price = document.getElementById('price').value;
    const quantity = document.getElementById('quantity').value;

    if (!validateForm(supplierName, address, contact, productName, price, quantity)) {
        e.preventDefault();
        return false;
    }
};

// Edit button functionality
function attachEditListeners() {
    document.querySelectorAll('.edit-btn').forEach(function(editBtn) {
        editBtn.onclick = function() {
            var supplier_ID = this.getAttribute('data-id');
            var supplier_Name = this.getAttribute('data-supplierName');
            var address = this.getAttribute('data-address');
            var contact = this.getAttribute('data-contact');
            var productName = this.getAttribute('data-productName');
            var price = this.getAttribute('data-price');
            var quantity = this.getAttribute('data-quantity');

            document.getElementById('edit_supplier_ID').value = supplier_ID;
            document.getElementById('edit_supplierName').value = supplier_Name;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_contact').value = contact;
            document.getElementById('edit_productName').value = productName;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_quantity').value = quantity;

            editModal.style.display = "block";
        }
    });
}

// Delete button functionality
function attachDeleteListeners() {
    document.querySelectorAll('.delete-btn').forEach(function(deleteBtn) {
        deleteBtn.onclick = function() {
            var supplier_ID = this.getAttribute('data-id');
            document.getElementById('confirmDelete').setAttribute('data-id', supplier_ID);
            deleteModal.style.display = "block";
        }
    });
}

// Handle delete confirmation
document.getElementById('confirmDelete').onclick = function() {
    var supplier_ID = this.getAttribute('data-id');
    window.location.href = 'supplierManagement.php?delete_supplier_ID=' + encodeURIComponent(supplier_ID);
};

// Cancel delete
document.querySelector('#deletesupplierModal .submit').onclick = function() {
    deleteModal.style.display = "none";
};

// Search functionality
document.querySelector('.search-btn').onclick = function(event) {
    event.preventDefault();
    var searchTerm = document.querySelector('.search-bar input').value.toLowerCase();
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function(row) {
        var supplierName = row.cells[1].textContent.toLowerCase();
        row.style.display = supplierName.includes(searchTerm) ? '' : 'none';
    });
}

// Attach event listeners when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    attachEditListeners();
    attachDeleteListeners();
});