$(document).ready(function () {
    $('#applicationForm').submit(function (event) {
      event.preventDefault(); // Prevent form submission
  
      // Collect form data
      const formData = $(this).serialize();
  
      // Send data to the server via AJAX
      $.post('submit.php', formData, function (response) {
        const data = JSON.parse(response);
  
        if (data.success) {
          $('#applicationForm').hide();
          $('#successMessage').show();
          $('#submittedData').html(`
            <strong>Name:</strong> ${data.name}<br>
            <strong>Email:</strong> ${data.email}<br>
            <strong>Phone:</strong> ${data.phone}<br>
            <strong>Date of Birth:</strong> ${data.dob}<br>
            <strong>Gender:</strong> ${data.gender}<br>
            <strong>Address:</strong> ${data.address}<br>
          `);
        } else {
          alert('Error submitting form. Please try again.');
        }
      });
    });
  });
  