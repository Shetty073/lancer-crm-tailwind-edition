// enquiry delete button event
const showEnquiryDeleteModal = document.querySelector('.enquiry-delete-modal');
const closeEnquiryDeleteModal = document.querySelectorAll(
    '.close-enquiry-delete-modal'
);
const showEnquiryDeleteBtnModal = document.querySelector(
    '.enquiry-delete-btn-modal'
);

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('enquiry-delete-btn')) {
        let enquiryId = e.target.parentNode.id;
        document.querySelector('#deleteEnquiryId').value = enquiryId;
        showEnquiryDeleteModal.classList.remove('hidden');
    }
});

closeEnquiryDeleteModal.forEach((close) => {
    close.addEventListener('click', function () {
        showEnquiryDeleteModal.classList.add('hidden');
    });
});

showEnquiryDeleteBtnModal.addEventListener('click', function () {
    // delete the enquiry
    let enquiryId = document.querySelector('#deleteEnquiryId').value;
    let url = `/enquiries/${enquiryId}/destroy`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-Token': csrfToken,
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
                alert('Request was unsuccessful. Try again later...');
            }
        });

    showEnquiryDeleteModal.classList.add('hidden');
});

// followups add button event
const addFollowupModal = document.querySelector('.add-followup-modal');
const closeAddFollowUpModal = document.querySelectorAll(
    '.add-followup-close-modal'
);
const submitAddFollowUpBtnModal = document.querySelector(
    '.submit-add-follow-up-modal'
);

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('add-followup-btn')) {
        addFollowupModal.classList.remove('hidden');
    }
});

closeAddFollowUpModal.forEach((close) => {
    close.addEventListener('click', function () {
        addFollowupModal.classList.add('hidden');
    });
});

submitAddFollowUpBtnModal.addEventListener('click', function () {
    let url = `/followups/store`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let data = {
        date_time: document.querySelector('#addFollowupDateTime').value,
        remark: document.querySelector('#addFollowupRemark').value,
        outcome: document.querySelector('#addFollowupOutcome').value,
        enquiry_id: document.querySelector('#deleteEnquiryId').value,
    };

    fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-Token': csrfToken,
            },
            body: JSON.stringify(data),
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
                alert('Request was unsuccessful. Try again later...');
            }
        });
    addFollowupModal.classList.add('hidden');
});

// followups edit button event
const modal = document.querySelector('.modal');
const closeModal = document.querySelectorAll('.close-modal');
const submitBtnModal = document.querySelector('.submit-follow-up-modal');

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('follow-up-edit-btn')) {
        let followUpId = e.target.parentNode.id;
        document.querySelector('#followUpId').value = followUpId;
        document.querySelector(
            '#followupDateTime'
        ).value = document.querySelector(`#date_time${followUpId}`).value;
        document.querySelector(
            '#followupRemark'
        ).value = document.querySelector(`#remark${followUpId}`).value;
        document.querySelector(
            '#followupOutcome'
        ).value = document.querySelector(`#outcome${followUpId}`).value;

        modal.classList.remove('hidden');
    }
});

closeModal.forEach((close) => {
    close.addEventListener('click', function () {
        modal.classList.add('hidden');
    });
});

submitBtnModal.addEventListener('click', function () {
    // submit the followup edit
    let followUpId = document.querySelector('#followUpId').value;
    let url = `/followups/${followUpId}/update`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let data = {
        date_time: document.querySelector('#followupDateTime').value,
        remark: document.querySelector('#followupRemark').value,
        outcome: document.querySelector('#followupOutcome').value,
    };

    fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-CSRF-Token': csrfToken,
            },
            body: JSON.stringify(data),
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
                alert('Request was unsuccessful. Try again later...');
            }
        });

    modal.classList.add('hidden');
});

// followups delete button event
const deleteModal = document.querySelector('.delete-modal');
const closeDeleteModal = document.querySelectorAll('.close-delete-btn-modal');
const deleteBtnModal = document.querySelector('.delete-follow-up-modal');

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('follow-up-delete-btn')) {
        let followUpId = e.target.parentNode.id;
        document.querySelector('#deleteFollowUpId').value = followUpId;
        deleteModal.classList.remove('hidden');
    }
});

closeDeleteModal.forEach((close) => {
    close.addEventListener('click', function () {
        deleteModal.classList.add('hidden');
    });
});

deleteBtnModal.addEventListener('click', function () {
    // delete the follow up
    let followUpId = document.querySelector('#deleteFollowUpId').value;
    let url = `/followups/${followUpId}/destroy`;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'X-CSRF-Token': csrfToken,
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
            alert('Request was unsuccessful. Try again later...');
        }
    });

    deleteModal.classList.add('hidden');
});
