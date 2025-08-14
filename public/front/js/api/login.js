$("#request-otp-button").click(function (event) {
  event.preventDefault();
  console.log("Request OTP button clicked");

  const phone = $("#phone").val().trim();

  // Basic phone number validation
  if (!phone || phone.length < 10) {
    showError("Please enter a valid phone number");
    return;
  }

  // Show loading state
  $("#request-otp-button")
    .prop("disabled", true)
    .html('<i class="fa fa-spinner fa-spin"></i> Sending OTP...');

  // API request to send OTP
  $.ajax({
    url: 'http://localhost/ecom/api/requestOtp',
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify({ phone: phone }),
    success: function (response) {
      if (response.status == "success") {
        console.log("OTP sent successfully");

        // Hide phone input, show OTP input
        $("#phone-group").hide();
        $("#request-otp-button").hide();
        $("#otp-group").show();
        $("#verify-otp-button").show();
        // Start OTP timer
        startOtpTimer();

        showSuccess("OTP sent to your phone");
      } else {
        showError(response.message || "Failed to send OTP");
      }
      $("#request-otp-button").prop("disabled", false).html("Request OTP");
    },
    error: function (xhr) {
      const errorMsg = xhr.responseJSON?.message || "Failed to send OTP";
      showError(errorMsg);
      $("#request-otp-button").prop("disabled", false).html("Request OTP");
    },
  });
});

$("#verify-otp-button").click(function (event) {
  event.preventDefault();
  console.log("Verify OTP button clicked");

  const phone = $("#phone").val().trim();
  const otp = $("#otp").val().trim();

  if (!otp || otp.length < 4) {
    showError("Please enter a valid OTP");
    return;
  }

  // Show loading state
  $("#verify-otp-button")
    .prop("disabled", true)
    .html('<i class="fa fa-spinner fa-spin"></i> Verifying...');

  // API request to verify OTP
  $.ajax({
    url: 'http://localhost/ecom/api/loginOtp',
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify({
      phone: phone,
      otp: otp,
    }),
    success: function (response) {
      if (response.status == "success") {
        console.log("OTP verified successfully");

        // Store the authentication token
        localStorage.setItem("auth_token", response.data.access_token);
        localStorage.setItem("user_data", JSON.stringify(response.data.user));

        // Redirect to account details
        window.location.href = "./account-details";
      } else {
        showError(response.message || "OTP verification failed");
        $("#verify-otp-button").prop("disabled", false).html("Verify OTP");
      }
    },
    error: function (xhr) {
      const errorMsg = xhr.responseJSON?.message || "OTP verification failed";
      showError(errorMsg);
      $("#verify-otp-button").prop("disabled", false).html("Verify OTP");
    },
  });
});

// Show error message
function showError(message) {
  $(".error-message").remove();
  const errorElement = $(
    '<div class="error-message text-danger mt-2"></div>'
  ).text(message);
  $("#login-form").append(errorElement);
}

// Show success message
function showSuccess(message) {
  $(".success-message").remove();
  const successElement = $(
    '<div class="success-message text-success mt-2"></div>'
  ).text(message);
  $("#login-form").append(successElement);
}

// OTP timer countdown
function startOtpTimer() {
  let timeLeft = 120; // 2 minutes
  $("#otp-timer").show();

  const timer = setInterval(function () {
    timeLeft--;
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;

    $("#otp-timer").text(
      `Resend OTP in ${minutes}:${seconds < 10 ? "0" : ""}${seconds}`
    );

    if (timeLeft <= 0) {
      clearInterval(timer);
      $("#otp-timer").hide();
      $("#resend-otp-button").show();
    }
  }, 1000);
}

// Resend OTP functionality
$("#resend-otp-button").click(function () {
  $("#request-otp-button").click();
  $("#resend-otp-button").hide();
});
document.addEventListener("DOMContentLoaded", function () {
  const accountIcon = document.getElementById("account-icon");

  // Check if user is logged in (check for auth token in localStorage)
  const isLoggedIn = localStorage.getItem("auth_token") !== null;

  if (isLoggedIn) {
    // User is logged in - redirect to account details
    accountIcon.href = "./account-details";
    accountIcon.removeAttribute("data-bs-toggle");
  } else {
    // User is not logged in - show login popup
    accountIcon.href = "#login";
    accountIcon.setAttribute("data-bs-toggle", "offcanvas");
  }

  // Optional: Add click handler for additional logic
  accountIcon.addEventListener("click", function (e) {
    if (isLoggedIn) {
      // You could add additional logic here before redirect
      console.log("User is logged in, redirecting to account details");
    } else {
      console.log("Showing login popup");
    }
  });
});
