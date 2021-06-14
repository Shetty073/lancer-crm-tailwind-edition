// client delete button event
const showClientDeleteModal = document.querySelector('.client-delete-modal');
const closeClientDeleteModal = document.querySelectorAll(
    '.close-client-delete-modal'
);
const showClientDeleteBtnModal = document.querySelector(
    '.client-delete-btn-modal'
);

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('client-delete-btn')) {
        let clientId = e.target.parentNode.id;
        document.querySelector('#deleteClientId').value = clientId;
        showClientDeleteModal.classList.remove('hidden');
    }
});

closeClientDeleteModal.forEach((close) => {
    close.addEventListener('click', function () {
        showClientDeleteModal.classList.add('hidden');
    });
});

showClientDeleteBtnModal.addEventListener('click', function () {
    // delete the client
    let clientId = document.querySelector('#deleteClientId').value;
    let url = document.querySelector('#deleteClientUrl').value;
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

    showClientDeleteModal.classList.add('hidden');
});
