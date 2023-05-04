document.addEventListener("DOMContentLoaded", () => {
  let mastersContainer = document.querySelector(".masters-container");
  let categoryElements = document.querySelectorAll("[name='category']");
  let countProducts = document.querySelector(".count-products");
  let masters = [];

  //загружаем все карточки с товарами
  getMasters();

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
  async function getMasters() {
    //формируем параметр
    const param = new URLSearchParams();
    param.append("category", JSON.stringify());

    masters = await getData("/app/admin/tables/masters/masters.search.php", param);
    //выведем полученные данные на страницу
    outOnPage(masters);
  }
  function outOnPage(masters) {
    mastersContainer.innerHTML = "";
    masters.forEach((item) => {
      mastersContainer.insertAdjacentHTML("beforeend", createCard(item));
    });
    countProducts.textContent = `найдено ${masters.length} шт.`;
  }

  //создаём карточку товара
  function createCard({ image, id, name, surname, patronymic, description }) {
    return `<tr class="masters-position">
                    <th>${id}</th>
                    <th><img class='masters-img' src="/upload/${image}" alt=""></th>
                    <th>${name}</th>
                    <th>${surname}</th>
                    <th>${patronymic}</th>
                    <th>${description}</th>
                    <th><a href="/app/admin/tables/masters/update.php?id=${id}" class="btn btn-primary btn-change">изменить</a></th>
                    <th><button class="btn btn-danger btn-delete-master" data-master-id="${id}">удалить</button></th>
                  </tr>
      `;
  }

  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-delete-master")) {
     
      let res = await outOnProductPage(
        event.target.dataset.masterId,
        "delete"
      );
      console.log(res);
      event.target.closest(".masters-position").remove();
    }
  });
  async function outOnProductPage(masterId, action) {
    let Master = await postJSON(
      "/app/admin/tables/masters/save.master.php",
      masterId,
      action
    );
  }
});
