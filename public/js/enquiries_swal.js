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
        let enquiryId = e.target.parentNode.id;
        document.querySelector("#deleteEnquiryId").value = enquiryId;
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

// followups add button event
const addFollowupModal = document.querySelector(".add-followup-modal");
const closeAddFollowUpModal = document.querySelectorAll(
    ".add-followup-close-modal"
);
const submitAddFollowUpBtnModal = document.querySelector(
    ".submit-add-follow-up-modal"
);

document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("add-followup-btn")) {
        addFollowupModal.classList.remove("hidden");
    }
});

closeAddFollowUpModal.forEach((close) => {
    close.addEventListener("click", function () {
        addFollowupModal.classList.add("hidden");
    });
});

submitAddFollowUpBtnModal.addEventListener("click", function () {
    // create the followup
    // TODO: Complete this
    addFollowupModal.classList.add("hidden");
});

// followups edit button event
const modal = document.querySelector(".modal");
const closeModal = document.querySelectorAll(".close-modal");
const submitBtnModal = document.querySelector(".submit-follow-up-modal");

document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("follow-up-edit-btn")) {
        let followUpId = e.target.parentNode.id;
        document.querySelector("#followUpId").value = followUpId;
        modal.classList.remove("hidden");
    }
});

closeModal.forEach((close) => {
    close.addEventListener("click", function () {
        modal.classList.add("hidden");
    });
});

submitBtnModal.addEventListener("click", function () {
    // submit the followup edit
    // TODO: Complete this
    console.log(document.querySelector("#followUpId").value);
    modal.classList.add("hidden");
});

// followups delete button event
const deleteModal = document.querySelector(".delete-modal");
const closeDeleteModal = document.querySelectorAll(".close-delete-modal");
const deleteBtnModal = document.querySelector(".delete-follow-up-modal");

document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("follow-up-delete-btn")) {
        let followUpId = e.target.parentNode.id;
        document.querySelector("#deleteFollowUpId").value = followUpId;
        deleteModal.classList.remove("hidden");
    }
});

closeDeleteModal.forEach((close) => {
    close.addEventListener("click", function () {
        deleteModal.classList.add("hidden");
    });
});

deleteBtnModal.addEventListener("click", function () {
    // delete the follow up
    // TODO: Complete this
    console.log(document.querySelector("#deleteFollowUpId").value);
    deleteModal.classList.add("hidden");
});
