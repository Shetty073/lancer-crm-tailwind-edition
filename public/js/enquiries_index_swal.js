// 'Transfer To Client' functionality
// TODO: Complete this later


// 'Mark As Lost' aka Delete enquiry functionality
// enquiry delete button event
const showEnquiryDeleteModal = document.querySelector(".enquiry-delete-modal");
const closeEnquiryDeleteModal = document.querySelectorAll(
    ".close-enquiry-delete-modal"
);
const showEnquiryDeleteBtnModal = document.querySelector(
    ".enquiry-delete-btn-modal"
);

// show the enquiry delete confirmation modal
document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("enquiry-delete-btn")) {
        let followUpId = e.target.parentNode.id;
        document.querySelector("#deleteEnquiryId").value = followUpId;
        showEnquiryDeleteModal.classList.remove("hidden");
    }
});

// close the delete enquiry modal
closeEnquiryDeleteModal.forEach((close) => {
    close.addEventListener("click", function () {
        showEnquiryDeleteModal.classList.add("hidden");
    });
});

// delete the enquiry
showEnquiryDeleteBtnModal.addEventListener("click", function () {
    let enquiryId = document.querySelector("#deleteEnquiryId").value;
    let url = `/enquiries/${enquiryId}/destroy`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-Token": csrfToken,
            },
        })
        .then((response) => {
            if (response.ok) {
                return true;
            } else {
                return false;
            }
        })
        .then(function (data) {
            if (data === true) {
                window.location.reload();
            } else {
                // show error message if needed
                alert("Request was unsuccessful. Try again later...");
            }
        });

    showEnquiryDeleteModal.classList.add("hidden");
});
