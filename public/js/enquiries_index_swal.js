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
    // delete the follow up
    // TODO: Complete this
    console.log(document.querySelector("#deleteEnquiryId").value);
    showEnquiryDeleteModal.classList.add("hidden");
});
