var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  loop : true,
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 2,
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
    spaceBetween: 30
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable :true
  },
});

document.addEventListener("DOMContentLoaded", function () {
  new TypeIt("#title", {
  }).go();
});


window.addEventListener("scroll", function(){ 
    var header = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY > 1) 
   })
  //   Animasi Scroll 
  const fadersOut = document.querySelectorAll('.fade-out');
  const fadersIn = document.querySelectorAll('.fade-in');
  const fromLeft = document.querySelectorAll('.from-left');
  const fromRight = document.querySelectorAll('.from-right');
  const transparan = document.querySelectorAll('.transparan');
  const smothIn = document.querySelectorAll('.smoth-in');
  const appearOption = {
      threshold: 0,
      rootMargin: "0px 0px -100px 0px"
  };
  
  const appearOnScroll = new IntersectionObserver(function(
      entries,
      appearOnScroll
  ){
      entries.forEach(entry => {
          if (!entry.isIntersecting){
              return;
          }else{
              entry.target.classList.add('appear');
              appearOnScroll.unobserve(entry.target);
          }
      })
  },appearOption )
  
  fadersIn.forEach(faderIn => {
      appearOnScroll.observe(faderIn);
  })
  
  fadersOut.forEach(faderOut => {
      appearOnScroll.observe(faderOut);
  })
  
  fromLeft.forEach(left => {
      appearOnScroll.observe(left);
  })
  
  fromRight.forEach(Right => {
      appearOnScroll.observe(Right);
  })
  
  transparan.forEach(trans => {
      appearOnScroll.observe(trans);
  })
  
  smothIn.forEach(smothI => {
      appearOnScroll.observe(smothI);
  })

  
   imgInpBrosur.onchange = evt => {
    const [file] = imgInpBrosur.files
    if (file) {
      outputBrosur.src = URL.createObjectURL(file)
    }
  }

  imgInpMekkah.onchange = evt => {
    const [file] = imgInpMekkah.files
    if (file) {
      outputMekkah.src = URL.createObjectURL(file)
    }
  }

  imgInpMadinah.onchange = evt => {
    const [file] = imgInpMadinah.files
    if (file) {
      outputMadinah.src = URL.createObjectURL(file)
    }
  }
  
  imgInpCustomer.onchange = evt => {
    const [file] = imgInpCustomer.files
    if (file) {
      outputCustomer.src = URL.createObjectURL(file)
    }
  }
  imgInpPasport.onchange = evt => {
    const [file] = imgInpPasport.files
    if (file) {
      outputPasport.src = URL.createObjectURL(file)
    }
  }
  imgInpPasport2.onchange = evt => {
    const [file] = imgInpPasport2.files
    if (file) {
      outputPasport2.src = URL.createObjectURL(file)
    }
  }
  imgInpKtp.onchange = evt => {
    const [file] = imgInpKtp.files
    if (file) {
      outputKtp.src = URL.createObjectURL(file)
    }
  }
  imgInpKk.onchange = evt => {
    const [file] = imgInpKk.files
    if (file) {
      outputKk.src = URL.createObjectURL(file)
    }
  }
  imgInpAkte.onchange = evt => {
    const [file] = imgInpAkte.files
    if (file) {
      outputAkte.src = URL.createObjectURL(file)
    }
  }
  imgInpBpjs.onchange = evt => {
    const [file] = imgInpBpjs.files
    if (file) {
      outputBpjs.src = URL.createObjectURL(file)
    }
  }



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


  
