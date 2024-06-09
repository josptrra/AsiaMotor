window.addEventListener("DOMContentLoaded", () => {
  /* ========== NAVBAR START ========== */
  // sticky navbar
  const navbar = document.querySelector(".navbar");
  window.addEventListener("scroll", function () {
    const value = window.scrollY;
    return value > 0
      ? navbar.classList.add("active")
      : navbar.classList.remove("active");
  });

  // tombol hamburger navbar
  const navbarListGroup = document.querySelector(".navbar-list-group");
  const navbarButton = document.querySelector("#hamburger");
  navbarButton.addEventListener("click", () => {
    navbarListGroup.classList.toggle("active");
  });

  document.addEventListener("click", (event) => {
    if (
      !navbarButton.contains(event.target) &&
      !navbar.contains(event.target)
    ) {
      navbarListGroup.classList.remove("active");
    }
  });
  /* ========== NAVBAR END ========== */

  /* ========== MODAL START ========== */
  // modal
  const modals = document.querySelectorAll(".modal");
  const btnModal = document.querySelectorAll(".btn-modal");
  btnModal.forEach((btn) => {
    btn.addEventListener("click", function () {
      const id = this.dataset.modal.trim().toLowerCase();
      showAndHideModal(id);
    });
  });

  // tampilkan modal yang sesuai dengan isi data-id dan sembunyikan modal lainnya
  function showAndHideModal(id) {
    modals.forEach((modal) => {
      const data = modal.dataset.id.trim().toLowerCase();
      if (data === id) return modal.classList.toggle("active");
      return modal.classList.remove("active");
    });
  }

  // tombol untuk menghilangkan modal tertentu
  const btnModalClose = document.querySelectorAll(".btn-modal-close");
  btnModalClose.forEach((btnClose) => {
    btnClose.addEventListener("click", () => {
      modals.forEach((modal) => modal.classList.remove("active"));
    });
  });
  /* ========== MODAL END ========== */

  /* ========== DATA PRODUCT START ========== */
  const dataProduct = [
    {
      image: "x.png",
      name: "Motor Sport",
      // price: 1000000,
      description:
        "Didesain untuk performa tinggi dan tampilan yang memukau, motor sport kami siap memberikan pengalaman berkendara yang luar biasa.",
    },
    {
      image: "y.png",
      name: "Motor Matic",
      // price: 1500000,
      description:
        "Dilengkapi dengan teknologi terbaru, motor matic cocok untuk Anda yang menginginkan kemudahan tanpa kompromi terhadap performa",
    },
    {
      image: "z.png",
      name: "Motor Bebek",
      // price: 25000,
      description:
        " Ideal untuk aktivitas sehari-hari dan perjalanan jarak jauh. Dengan desain yang kompak dan mesin yang tangguh, motor bebek menjadi pilihan favorit banyak pelanggan kami.",
    },
  ];
  /* ========== DATA PRODUCT END ========== */
  /* ========== SHOW ALL DATA PRODUCT START ========== */
  const cardContainer = document.querySelector(".card-container");

  function showAllDataProduct() {
    dataProduct.forEach((data) => {
      const result = renderElementProduct(data);
      cardContainer.insertAdjacentHTML("afterbegin", result);
    });
  }

  showAllDataProduct();

  function renderElementProduct({ image, name, price, description }) {
    return `
      <div class="card">
        <img src="img/${image}" alt="produk kami" class="card-image gambar-produk">
        <h4 class="nama-produk">${name}</h4>
        <p>${description}</p>
      </div>
    `;
  }
  /* ========== SHOW ALL DATA PRODUCT END ========== */

  /* ========== SEARCHING DATA START ========== */
  const productContainer = document.querySelector(".product-container");
  const searchInput = document.querySelector(".search-input");
  searchInput.addEventListener("keyup", function () {
    // value input pencarian produk
    const value = this.value.trim().toLowerCase();
    // jika input kosong, maka bersihkan isi element productContainer
    if (!value) return (productContainer.innerHTML = "");
    // jalankan fungsi searchData()
    searchData(value);
  });

  function searchData(value) {
    // bersihkan isi element productContainer
    productContainer.innerHTML = "";
    // looping variabel "dataProduct"
    dataProduct.forEach((data) => {
      /*
        jika ada nama produk atau harga produk yang sesuai dengan isi input pencarian produk
        maka tampilkan produk tersebut dan sembunyikan produk lainnya.
      */
      if (
        data.name.toLowerCase().indexOf(value) != -1 ||
        data.price.toString().indexOf(value) != -1
      ) {
        // render isi variabel "data" menjadi sebuah element HTML
        const result = renderData(data);
        // tampilkan dibagian bawah menu input pencarian produk
        productContainer.appendChild(result);
      }
    });
  }

  function renderData({ image, name, price }) {
    const box = create("div", "box-product");

    const images = create("img", "image");
    images.setAttribute("src", `images/${image}`);
    images.setAttribute("alt", "gambar produk");

    const wrapper = create("div", "text-wrapper");
    const h4 = create("h4", "", name, true);
    const span = create("span", "", price, true);

    wrapper.appendChild(h4);
    wrapper.appendChild(span);

    box.appendChild(images);
    box.appendChild(wrapper);

    return box;
  }

  function create(name, classname, value, show = false) {
    // buat element html sesuai isi parameter "name"
    const element = document.createElement(name);
    // berikan class pada element yang dibuay
    element.className = !classname ? "" : classname;
    // jika parameter "show" menghasilkan boolean true
    if (show == true) {
      // berikan teks atau value pada element yang dibuat
      element.textContent = value;
      // kembalikan nilai berupa element HTML dengan value
      return element;
    }
    // kembalikan nilai berupa element HTML tanpa value
    return element;
  }
  /* ========== SEARCHING DATA END ========== */

  // fitur shopping cart dibagian menu input pencarian produk
  window.addEventListener("click", (event) => {
    if (event.target.classList.contains("box-product")) {
      // tangkap isi dari gambar produk, nama produk dan harga produk
      const item = {
        image: event.target.querySelector(".image").src,
        name: setName(event.target.querySelector("h4").textContent),
        price: parseFloat(event.target.querySelector("span").textContent),
      };
      // jalankan fungsi addProductToCart()
      addProductToCart(item);
    }
  });

  document.querySelector(".form").addEventListener("submit", function (event) {
    event.preventDefault();

    // Dapatkan data formulir
    var formData = new FormData(this);

    // Kirim formulir menggunakan AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "form_proses.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Tanggapi respons dari server di sini (jika diperlukan)
        Swal.fire({
          title: "Terima kasih!",
          text: "Kami akan menghubungi Anda!",
          icon: "success",
          confirmButtonText: "OK",
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect atau lakukan aksi lain setelah menekan tombol OK
            // Misalnya, mengarahkan ke halaman lain:
            window.location.href = "index.php";
          }
        });
      }
    };
    xhr.send(formData);
  });
});
