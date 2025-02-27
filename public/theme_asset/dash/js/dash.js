let sideMenu = document.querySelector("#menu"); // side menu
let menuToggler = document.querySelector("#hideshow"); // hamburger icon
let menuTogglerLg = document.querySelector(".menu-toggle-btn.lg"); // hamburger icon for large device
let menuWrap = document.querySelector(".insideScroll"); // menu wrapper
let overlay = document.querySelector(".responsive-overlay"); // responsive overlay
let tabWidth = window.matchMedia("(max-width: 768px)"); // tablet width

menuTogglerLg.addEventListener("click", () => {
  sideMenu.classList.toggle("hide-lg");
});

menuToggler.addEventListener("click", () => {
  sideMenu.classList.toggle("hide");

  if (tabWidth.matches) {
    overlay.classList.toggle("show");
  }
});

overlay.addEventListener("click", () => {
  if (tabWidth.matches) {
    sideMenu.classList.add("hide");
    overlay.classList.remove("show");
  }
});

function overlayHide() {
  if (sideMenu.classList.contains("hide")) {
    overlay.classList.remove("show");
  }
}

// side menu and close icon auto hide on tablet device
window.addEventListener("resize", function () {
  if (window.innerWidth < 768) {
    sideMenu.classList.add("hide"); // side menu
  } else {
    sideMenu.classList.remove("hide");
  }

  overlayHide();
});

function initActiveMenu() {
  // === following js will activate the menu in left side bar based on url ====
  $(".insideScroll a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if (this.href == pageUrl) {
      $(this).addClass("active");
      $(this).parent().addClass("mm-active"); // add active to li of the current link
      $(this).parent().parent().addClass("mm-show");
      $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
      $(this).parent().parent().parent().addClass("mm-active");
      $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
      $(this)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .addClass("mm-active");
    }
  });
}

initActiveMenu();

// jquery for toggle sub menus

$(document).ready(function () {
  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });
});

// jquery for toggle sub menu 2

$(document).ready(function () {
  $(".sub-btn-two").click(function () {
    $(this).next(".sub-menu-two").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });
});





//Modal Category
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".show-category-btn").forEach(button => {
    button.addEventListener("click", function () {
      document.getElementById("modalTitle").textContent = this.dataset.name;
      document.getElementById("modalCreated").textContent = this.dataset.created;
      document.getElementById("modalUpdated").textContent = this.dataset.updated;
      document.getElementById("modalUser").textContent = this.dataset.user;
      document.getElementById("modalUser").textContent = this.dataset.user;
      document.getElementById("modalProducts").textContent = this.dataset.products;;
    });
  });
});

//Modal Product
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".show-category-btn").forEach(button => {
    button.addEventListener("click", function () {
      document.getElementById("modalTitle").textContent = this.dataset.name;
      document.getElementById("modalCreated").textContent = this.dataset.created;
      document.getElementById("modalUpdated").textContent = this.dataset.updated;
      document.getElementById("modalUser").textContent = this.dataset.user;
    });
  });
});

//delete confirmation
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".delete-btn").forEach(button => {
    button.addEventListener("click", function () {
      let form = this.closest(".delete-form");

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});

///Total
document.addEventListener("DOMContentLoaded", function () {
  let quantityInput = document.getElementById("quantity");
  let totalPriceElement = document.getElementById("total-price");
  let unitPrice = parseFloat(quantityInput.getAttribute("data-price"));

  quantityInput.addEventListener("input", function () {
    let quantity = parseInt(quantityInput.value) || 0; // Empêche les valeurs invalides
    let total = quantity * unitPrice;
    totalPriceElement.textContent = total.toFixed(2) + " MRU"; // Formatage à 2 décimales
  });
});

//status
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".status-select").forEach(select => {
    select.addEventListener("change", function () {
      let orderId = this.dataset.orderId;
      let newStatus = this.value;
      let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      let statusCell = this.closest("tr").querySelector(".status-cell"); // Sélectionne la cellule du statut

      fetch(`/admin/order/${orderId}/update-status`, {
        method: "PATCH",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({ status: newStatus })
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            statusCell.textContent = newStatus; // Met à jour la cellule sans recharger la page
            statusCell.classList.remove('bg-warning', 'bg-success', 'bg-primary', 'bg-danger'); // Retire les anciennes classes
            statusCell.classList.add('border-span', 'text-white', 'bold', );
            switch (newStatus) {
              case 'validé':
                statusCell.classList.add('bg-success');
                break;
              case 'confirmé':
                statusCell.classList.add('bg-primary');
                break;
              case 'en attente':
                statusCell.classList.add('bg-warning');
                break;
              case 'rejeté':
                statusCell.classList.add('bg-danger');
                break;
              default:
                statusCell.classList.add('bg-secondary');
            }

          } else {
            alert("Erreur lors de la mise à jour !");
          }
        })
        .catch(error => {
          console.error("Erreur :", error);
          alert("Une erreur est survenue.");
        });
    });
  });
});