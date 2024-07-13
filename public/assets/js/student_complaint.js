document.getElementById('complaintForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const complaintType = document.getElementById('complaintType').value;
    const details = document.getElementById('details').value;
    const reference = document.getElementById('reference').value;

    // Submit complaint via AJAX
    fetch('/api/submitComplaint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ complaintType, details, reference }),
    })
    .then(response => response.json())
    .then(data => {
        alert('Complaint submitted successfully');
        loadComplaints();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function loadComplaints() {
    fetch('/api/getComplaints')
        .then(response => response.json())
        .then(data => {
            const complaintsList = document.getElementById('complaintsList');
            complaintsList.innerHTML = '';
            data.forEach(complaint => {
                const complaintDiv = document.createElement('div');
                complaintDiv.innerHTML = `
                    <p><strong>Type:</strong> ${complaint.complaintType}</p>
                    <p><strong>Details:</strong> ${complaint.details}</p>
                    <p><strong>Status:</strong> ${complaint.status}</p>
                    <p><strong>Comments:</strong> ${complaint.comments}</p>
                `;
                complaintsList.appendChild(complaintDiv);
            });
        });
}

loadComplaints();
