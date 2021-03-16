// enquiry delete button event
const showEnquiryDeleteModal = document.querySelector(".enquiry-delete-modal");
const closeEnquiryDeleteModal = document.querySelectorAll(
    ".close-enquiry-delete-modal"
);
const showEnquiryDeleteBtnModal = document.querySelector(
    ".enquiry-delete-btn-modal"
);

document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("enquiry-delete-btn")) {
        let followUpId = e.target.parentNode.id;
        document.querySelector("#deleteEnquiryId").value = followUpId;
        showEnquiryDeleteModal.classList.remove("hidden");
    }
});

closeEnquiryDeleteModal.forEach((close) => {
    close.addEventListener("click", function () {
        showEnquiryDeleteModal.classList.add("hidden");
    });
});

showEnquiryDeleteBtnModal.addEventListener("click", function () {
    // delete the enquiry
    let enquiryId = document.querySelector("#deleteEnquiryId").value;
    let url = `/enquiries/${enquiryId}/destroy`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            url: "/payment",
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
                window.history.back();
            } else {
                // show error message if needed
                alert("Request was unsuccessful. Try again later...");
            }
        });

    showEnquiryDeleteModal.classList.add("hidden");
});
