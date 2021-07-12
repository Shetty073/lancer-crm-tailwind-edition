// project delete button event
const showProjectDeleteModal = document.querySelector('.project-delete-modal');
const closeProjectDeleteModal = document.querySelectorAll(
    '.close-project-delete-modal'
);
const showProjectDeleteBtnModal = document.querySelector(
    '.project-delete-btn-modal'
);

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('project-delete-btn')) {
        let projectId = e.target.parentNode.id;
        document.querySelector('#deleteProjectId').value = projectId;
        showProjectDeleteModal.classList.remove('hidden');
    }
});

closeProjectDeleteModal.forEach((close) => {
    close.addEventListener('click', function () {
        showProjectDeleteModal.classList.add('hidden');
    });
});

showProjectDeleteBtnModal.addEventListener('click', function () {
    // delete the project
    let projectId = document.querySelector('#deleteProjectId').value;
    let url = document.querySelector('#deleteProjectUrl').value;
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

    showProjectDeleteModal.classList.add('hidden');
});
