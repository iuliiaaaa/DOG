document.addEventListener("DOMContentLoaded", () => {
  let productContainer = document.querySelector(".product-container");
  let categoryElements = document.querySelectorAll("[name='category']");
  let countProducts = document.querySelector(".count-products");
  let select = document.querySelector("#select");
  let products = [];

  //загружаем все карточки с товарами
  getProducts("all");

  //при выборе категорий будем подгружать товары
  categoryElements.forEach((item) => {
    item.addEventListener("change", async (event) => {
      //коллекцию флажков преобразовали в массив, затем нашли только включенные, достали значения у вкл. флажков
      let checkedCategories = [...categoryElements]
        .filter((item) => item.checked)
        .map((item) => item.value);
      await getProducts(checkedCategories);
    });
  });

  //создаём ф-ию для загрузки данных
  async function getProducts(categories) {
    //формируем параметр
    const param = new URLSearchParams();
    param.append("category", JSON.stringify(categories));

    products = await getData("/app/tables/products/search.check.php", param);
    //выведем полученные данные на страницу
    outOnPage(products);
  }
  function outOnPage(products) {
    productContainer.innerHTML = "";
    products.forEach((item) => {
      productContainer.insertAdjacentHTML("beforeend", createCard(item));
    });
    countProducts.textContent = `найдено ${products.length} шт.`;
  }

  //создаём карточку товара
  function createCard({ id, name, price, image, country }) {
    return `  <div class="col">
    <div class="card">
        <img src="/upload/${image}" class="card-img-top imgCard" alt="${image}">
        <div class="card-body">
            <h5 class="card-title">${name} (${country})</h5>
            <p class="card-text">${price}₽</p>
            <div class='buttons'>
        <a href="/app/tables/products/show.php?id=${id}" class="btn">подробно</a>
        <button id='btn-${id}' data-btn-id='${id}' class='btn-basket'></button>
        </div>
        </div>
    </div>
</div>`;
  }

  select.addEventListener("change", () => {
    if (select.value == "asc") {
      products.sort((a, b) => b.price - a.price);
    } else if (select.value == "desc") {
      products.sort((a, b) => a.price - b.price);
    } else if (select.value == "ascletter") {
      products.sort((a, b) => a.name.localeCompare(b.name));
    } else if (select.value == "descletter") {
      products.sort((a, b) => b.name.localeCompare(a.name));
    } else if (select.value == "asccountry") {
      products.sort((a, b) => a.country.localeCompare(b.country));
    } else if (select.value == "desccountry") {
      products.sort((a, b) => b.country.localeCompare(a.country));
    }
    outOnPage(products);
  });

  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-basket")) {
      let id = event.target.dataset.btnId;
      await postJSON("/app/tables/basket/save.basket.php", id, "add");
    }
  });
});
