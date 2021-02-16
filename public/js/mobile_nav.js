// Copy content of sideBar into mobileNavBar
let navbarWrapper = document.querySelector("#navbarWrapper");
let mobileNavBar = document.querySelector("#mobileNavBar");
let userAcntBtnSgnOutBtn = mobileNavBar.innerHTML;
mobileNavBar.innerHTML = navbarWrapper.innerHTML + userAcntBtnSgnOutBtn;

// Mobile navbar toggle
let mobileNavToggleBtn = document.querySelector("#mobileNavToggle");
mobileNavToggleBtn.addEventListener("click", function () {
    let mobileNavBar = document.querySelector("#mobileNavBar");

    if (mobileNavBar.classList.contains("hidden")) {
        mobileNavBar.classList.remove("hidden");
    } else {
        mobileNavBar.classList.add("hidden");
    }
});
