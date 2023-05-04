document.addEventListener("DOMContentLoaded", () => {
  let productContainer = document.querySelector(".product-container");
  let categoryElements = document.querySelectorAll("[name='category']");
  let countProducts = document.querySelector(".count-products");
  let products = [];

  //загружаем все карточки с товарами
  getProducts();

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
  async function getProducts() {
    //формируем параметр
    const param = new URLSearchParams();
    param.append("category", JSON.stringify());

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
  function createCard({ image, id, name, price, description, duration }) {
    return `<tr class="product-position">
                  <th>${id}</th>
                  <th>${name}</th>
                  <th>${price}₽</th>
                  <th>${description}</th>
                  <th>${duration} ч.</th>
                  <th><a href="/app/admin/tables/update.php?id=${id}" class="btn btn-primary btn-change">изменить</a></th>
                  <th><button class="btn btn-danger btn-delete" data-product-id="${id}">удалить</button></th>
                </tr>
    `;
  }

  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-delete")) {
      let res = await outOnProductPage(
        event.target.dataset.productId,
        "delete"
      );
      console.log(res);
      event.target.closest(".product-position").remove();
    }
  });
  async function outOnProductPage(productId, action) {
    let Product = await postJSON(
      "/app/admin/tables/save.product.php",
      productId,
      action
    );
  }
});
