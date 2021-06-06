// 'Transfer To Client' functionality
// enquiry 'trasnfer to client' button event
const showTransferModal = document.querySelector('.transfer-modal');
const closeTransferModal = document.querySelectorAll(
    '.close-transfer-btn-modal'
);
const showTransferBtnModal = document.querySelector(
    '.transfer-btn-modal'
);

// show the 'trasnfer to client' confirmation modal
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('transfer-to-client-btn')) {
        let enquiryId = e.target.parentNode.id;
        document.querySelector('#transferEntryId').value = enquiryId;
        showTransferModal.classList.remove('hidden');
    }
});

// close the 'trasnfer to client' modal
closeTransferModal.forEach((close) => {
    close.addEventListener('click', function () {
        showTransferModal.classList.add('hidden');
    });
});

// convert the enquiry to client
showTransferBtnModal.addEventListener('click', function () {
    let enquiryId = document.querySelector('#transferEntryId').value;
    let url = document.querySelector(`#transfer${enquiryId}`).value;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let transferRedirectUrl = document.querySelector('#transferRedirectUrl').value;

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
            window.location.replace(transferRedirectUrl);
        } else {
            // show error message if needed
            alert('Request was unsuccessful. Try again later...');
        }
    });

    showTransferModal.classList.add('hidden');
});
