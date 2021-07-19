// 'Transfer To Client' functionality

document.querySelectorAll('.close-deal-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        let enquiryId = e.currentTarget.parentNode.id;
        let url = document.querySelector(`#close${enquiryId}`).value;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        let closedRedirectUrl = document.querySelector('#closedRedirectUrl').value;


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4338CA',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, close it!'
        }).then((result) => {
            if (result.isConfirmed) {
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
                        Swal.fire(
                            'Congratulations!',
                            'You have successfully closed this deal.',
                            'success'
                        ).then(() => {
                            window.location.href = closedRedirectUrl;
                        });
                    } else {
                        // show error message if needed
                        Swal.fire(
                            'Failed',
                            'Request was unsuccessful. Please try again later...',
                            'error'
                        ).then(() => {
                            window.location.reload();
                        });
                    }
                });

            }
        });


    });
});
