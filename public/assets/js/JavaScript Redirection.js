
                    document.getElementById('loginForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    document.getElementById('loadingT').style.display = 'block'; // Show loading spinner
                    setTimeout(function() {
                        window.location.href = '/MainPages/HODadmin.html'; // Redirect to the HOD admin page
                    }, 1000); // Simulate loading time
                });

document.getElementById('HOFYPForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('loadingF').style.display = 'block';
    setTimeout(function() {
        window.location.href = '/MainPages/HOFYPadmin.html';
    }, 1000);
});

document.getElementById('CoordinatorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('loadingC').style.display = 'block';
    setTimeout(function() {
        window.location.href = '/MainPages/Cordinatoradmin.html';
    }, 1000);
});

document.getElementById('SupervisorForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('loadingS').style.display = 'block';
    setTimeout(function() {
        window.location.href = '/MainPages/Supervisoradmin.html';
    }, 1000);
});

document.getElementById('StudentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('loadingSt').style.display = 'block';
    setTimeout(function() {
        window.location.href = '/MainPages/Studentadmin.html';
    }, 1000);
});
