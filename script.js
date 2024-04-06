document.querySelector("#show-login").addEventListener("click",function(){
    document.querySelector(".popup.user").classList.add("active");
});

document.querySelector("a.btn-get-started.sub-btn").addEventListener(function () {
    console.log("Hello");
})

document.querySelector(".popup .close-btn").addEventListener("click",function(){
    document.querySelector(".popup").classList.remove("active");
});