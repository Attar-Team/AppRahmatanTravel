window.addEventListener("scroll", function(){ 
    var header = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY > 1) 
   })

var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      loop : true,
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 3,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
        spaceBetween: 30
      },
      pagination: {
        el: ".swiper-pagination",
        clickable :true
      },
    });

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    
    // toggle the icon
    this.classList.toggle("bi-eye");
});



// const addBtn = document.querySelector(".add-inp");
// const input = doucument.querySelector(".inp-group");

// function addInput()
// {
//     const nama = document.createElement("input");
//     nama.type("text");
//     nama.className("form-control")
//     nama.placeholder="nama jenis"

//     // const labelNama = document.createElement("label");
//     // labelNama.className("form-label")
    
//     const harga = document.createElement("input");
//     harga.type("text");
//     harga.className("form-control")
//     harga.placeholder="Harga"

//     const diskon = document.createElement("input");
//     diskon.type("text");
//     diskon.className("form-control")
//     diskon.placeholder="Diskon"

//     const btn = document.createElement("a");
//     btn.className = "btn btn-danger"
//     // btn.innerText = "&times"

//     const mb = document.createElement("div");
//     mb.className = "mb-3";
//     mb.className = "d-flex";

//     input.appendChild(mb);
//     mb.appendChild(nama);
//     mb.appendChild(diskon);
//     mb.appendChild(harga);
// }

// addBtn.addEventListener("click",addInput())