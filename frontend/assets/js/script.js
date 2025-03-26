import config from "./config.js"; // Import global configuration

document.addEventListener("DOMContentLoaded", function () {
    console.log("Eclipse IMEI scripts loaded.");

    // Handle IMEI search form submission
    const searchForm = document.getElementById("search-form");
    if (searchForm) {
        searchForm.addEventListener("submit", function (event) {
            event.preventDefault();
            let imei = document.getElementById("imei").value.trim();

            if (!/^\d{15}$/.test(imei)) {
                alert("Invalid IMEI format. Must be a 15-digit number.");
                return;
            }

            fetch(`${config.apiBaseUrl}/check_imei.php?imei=${imei}`)
                .then(response => response.json())
                .then(data => {
                    let resultDiv = document.getElementById("imei-result");
                    let statusSpan = document.getElementById("status");

                    if (data.error) {
                        statusSpan.innerText = "Not Found";
                        resultDiv.classList.add("status-lost");
                    } else {
                        statusSpan.innerText = data.status;
                        resultDiv.className = data.status === "Lost" ? "imei-status status-lost" : "imei-status status-found";
                    }

                    resultDiv.style.display = "block";
                })
                .catch(error => {
                    console.error("Error fetching IMEI data:", error);
                });
        });
    }

    // Handle report IMEI form submission
    const reportForm = document.getElementById("report-form");
    if (reportForm) {
        reportForm.addEventListener("submit", function (event) {
            event.preventDefault();
            let imei = document.getElementById("imei").value.trim();
            let status = document.getElementById("status").value;

            if (!/^\d{15}$/.test(imei)) {
                alert("Invalid IMEI format. Must be a 15-digit number.");
                return;
            }

            fetch(`${config.apiBaseUrl}/report_imei.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ imei, status })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || "Report submitted successfully.");
                })
                .catch(error => {
                    console.error("Error submitting IMEI report:", error);
                });
        });
    }
});
