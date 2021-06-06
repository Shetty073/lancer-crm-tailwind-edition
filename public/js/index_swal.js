// 'Mark As Lost' aka Delete enquiry functionality
// enquiry delete button event
const showDeleteModal = document.querySelector('.delete-modal');
const closeDeleteModal = document.querySelectorAll(
    '.close-delete-btn-modal'
);
const showDeleteBtnModal = document.querySelector(
    '.delete-btn-modal'
);

// show the entry delete confirmation modal
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('entry-delete-btn')) {
        let followUpId = e.target.parentNode.id;
        document.querySelector('#deleteEntryId').value = followUpId;
        showDeleteModal.classList.remove('hidden');
    }
});

// close the delete entry modal
closeDeleteModal.forEach((close) => {
    close.addEventListener('click', function () {
        showDeleteModal.classList.add('hidden');
    });
});

// delete the entry\
showDeleteBtnModal.addEventListener('click', function () {
    let entryId = document.querySelector('#deleteEntryId').value;
    let url = document.querySelector(`#delete${entryId}`).value;
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

    showDeleteModal.classList.add('hidden');
});
