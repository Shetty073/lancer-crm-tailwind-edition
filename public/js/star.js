// displaying star rating
document.querySelector('#ratingInputDiv').classList.add('hidden');

// onclick of the above rating display replace it with rating input
let ratingDisplayDiv = document.querySelector('#ratingDisplayDiv');
if(ratingDisplayDiv !== null && ratingDisplayDiv !== undefined) {
    ratingDisplayDiv.addEventListener('click', function (e) {
        document.querySelector('#ratingDisplayDiv').classList.add('hidden');
        document.querySelector('#ratingInputDiv').classList.remove('hidden');
    });
} else {
    document.querySelector('#ratingInputDiv').classList.remove('hidden');
}

// star input rating system
document.addEventListener('click', function (e) {
    if(e.target.tagName.toLowerCase() !== 'path') {
        if (e.target && e.target.classList.contains('star')) {
            document.querySelector('#rating').value = null;
            document.querySelector('#starcontainer1').innerHTML = `<i id="star1"
            class="far fa-star text-indigo-600 cursor-pointer star"></i>`;
            for (let index = 1; index < 5; index++) {
                let id = `starcontainer${(index + 1)}`;
                document.querySelector(`#${id}`).innerHTML = `<i id="star${(index + 1)}"
                class="far fa-star text-indigo-600 cursor-pointer star"></i>`;
            }

            let starNo = e.target.id.substring(e.target.id.length - 1);
            document.querySelector('#starcontainer1').innerHTML = `<i id="star1"
            class="fas fa-star text-indigo-600 cursor-pointer star"></i>`;
            document.querySelector('#rating').value = 1;

            for (let index = 1; index < (starNo); index++) {
                let id = `starcontainer${(index + 1)}`;
                document.querySelector(`#${id}`).innerHTML = `<i id="star${(index + 1)}"
                class="fas fa-star text-indigo-600 cursor-pointer star"></i>`;
                document.querySelector('#rating').value = index + 1;
            }
        }
    } else {
        document.querySelector('#rating').value = null;
        document.querySelector('#starcontainer1').innerHTML = `<i id="star1"
        class="far fa-star text-indigo-600 cursor-pointer star"></i>`;
        for (let index = 1; index < 5; index++) {
            let id = `starcontainer${(index + 1)}`;
            document.querySelector(`#${id}`).innerHTML = `<i id="star${(index + 1)}"
            class="far fa-star text-indigo-600 cursor-pointer star"></i>`;
        }
    }

});
