@extends('master.layout')

@section('content')
<style>
    /* Container style */
    .table-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        margin-top: 90px;
        margin-bottom: 50px; /* Add extra space at the bottom of the table */
    }

    /* Heading style */
    .table-container h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
        text-align: center;
        margin-top: 70px;  /* Add more space at the top of the heading */
        margin-bottom: 30px;
    }

    /* Table style */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* Table cells padding and styling */
    .table th, .table td {
        padding: 15px 20px;
        text-align: left;
        border: 1px solid #ddd;
        font-size: 1rem;
        color: #495057;
    }

    /* Table header styling */
    .table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        padding-top: 15px; /* Add extra space at the top of the headers */
        padding-bottom: 15px; /* Add space at the bottom of the headers */
    }

    /* Table row hover effect */
    .table tr:hover {
        background-color: #f1f1f1;
    }

    /* Zebra striping for table rows */
    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* No records message */
    .no-records {
        text-align: center;
        font-style: italic;
        color: #6c757d;
    }

    /* Button styles */
    .btn {
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #28a745;
        color: white;
        margin-right: 5px;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>

<div class="table-container">
    <h2>Payment History</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
                <tr id="payment-{{ $payment->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->username }}</td>
                    <td>{{ $payment->quantity }}</td>
                    <td>RM {{ number_format($payment->total_price, 2) }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
                    <td style="display: flex; gap: 8px;">
                        <!-- Edit button -->
                        <button class="btn btn-edit" onclick="editPayment({{ $payment->id }})">Edit</button>

                        <!-- Delete button -->
                        <button class="btn btn-delete" onclick="confirmDelete({{ $payment->id }})">Delete</button>
                    </td>

               </tr>
           @empty
               <tr>
                   <td colspan="7" class="no-records">No payment history available.</td>
               </tr>
           @endforelse
       </tbody>
   </table>
</div>
<!-- Edit Payment Modal -->
<!-- Edit Payment Modal -->
<div id="editModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 30px; border-radius: 12px; width: 400px; position: relative; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);">
        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px; color: #343a40; text-align: center;">Edit Payment</h3>
        <form id="editForm" style="display: flex; flex-direction: column; gap: 15px;">
            <div>
                <label style="font-size: 0.9rem; font-weight: bold; margin-bottom: 5px; display: block;">Username</label>
                <input type="text" id="editUsername" name="username" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>
            <div>
                <label style="font-size: 0.9rem; font-weight: bold; margin-bottom: 5px; display: block;">Quantity</label>
                <input type="number" id="editQuantity" name="quantity" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>
            <div>
                <label style="font-size: 0.9rem; font-weight: bold; margin-bottom: 5px; display: block;">Total Price</label>
                <input type="number" step="0.01" id="editTotalPrice" name="total_price" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; background-color: #e9ecef;">
            </div>
            <div>
                <label style="font-size: 0.9rem; font-weight: bold; margin-bottom: 5px; display: block;">Payment Method</label>
                <input type="text" id="editPaymentMethod" name="payment_method" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                <button type="button" onclick="updatePayment()" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.9rem; font-weight: bold;">Save Changes</button>
                <button type="button" onclick="closeModal()" style="background-color: #dc3545; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.9rem; font-weight: bold;">Cancel</button>
            </div>
        </form>
        <button onclick="closeModal()" style="position: absolute; top: 10px; right: 10px; background: transparent; border: none; font-size: 1.2rem; cursor: pointer; color: #343a40;">&times;</button>
    </div>
</div>


<script>
  let currentPaymentId = null;

function editPayment(paymentId) {
    const paymentRow = document.getElementById('payment-' + paymentId);
    currentPaymentId = paymentId;

    // Populate the modal with current values
    document.getElementById('editUsername').value = paymentRow.cells[1].textContent;
    document.getElementById('editQuantity').addEventListener('input', function () {
    const pricePerItem = parseFloat(document.getElementById('editTotalPrice').dataset.pricePerItem);
    const quantity = parseInt(this.value) || 0; // Default to 0 if input is empty or invalid
    const totalPrice = pricePerItem * quantity;

    document.getElementById('editTotalPrice').value = totalPrice.toFixed(2);
});
document.getElementById('editTotalPrice').dataset.pricePerItem = parseFloat(paymentRow.cells[3].textContent.replace('RM ', '')) / parseInt(paymentRow.cells[2].textContent); // Calculate price per item
    document.getElementById('editPaymentMethod').value = paymentRow.cells[4].textContent;

    // Display the modal
    document.getElementById('editModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}


   function confirmDelete(paymentId) {
    if (confirm('Are you sure you want to delete this payment?')) {
        // Send the DELETE request
        fetch(`/payments/${paymentId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the payment row from the table
                document.getElementById('payment-' + paymentId).remove();
                alert('Payment deleted successfully');
            } else {
                alert('Failed to delete payment');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the payment');
        });
    }
}

function updatePayment() {
    const updatedData = {
        username: document.getElementById('editUsername').value,
        quantity: document.getElementById('editQuantity').value,
        total_price: document.getElementById('editTotalPrice').value,
        payment_method: document.getElementById('editPaymentMethod').value
    };

    fetch(`/payments/${currentPaymentId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        },
        body: JSON.stringify(updatedData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the table row with the new data
            const paymentRow = document.getElementById('payment-' + currentPaymentId);
            paymentRow.cells[1].textContent = updatedData.username;
            paymentRow.cells[2].textContent = updatedData.quantity;
            paymentRow.cells[3].textContent = `RM ${parseFloat(updatedData.total_price).toFixed(2)}`;
            paymentRow.cells[4].textContent = updatedData.payment_method;

            alert('Payment updated successfully');
            closeModal();
        } else {
            alert('Failed to update payment');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the payment');
    });
}

</script>
@endsection
