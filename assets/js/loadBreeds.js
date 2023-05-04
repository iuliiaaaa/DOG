document.addEventListener("DOMContentLoaded", () => {
    let breedsContainer = document.querySelector(".breeds-container");
    let categoryElements = document.querySelectorAll("[name='category']");
    let countBreeds = document.querySelector(".count-breeds");
    let breeds = [];
  
    //загружаем все карточки с товарами
    getBreeds('all');
  
    //при выборе категорий будем подгружать товары
    categoryElements.forEach((item) => {
      item.addEventListener("change", async (event) => {
        //коллекцию флажков преобразовали в массив, затем нашли только включенные, достали значения у вкл. флажков
        let checkedCategories = [...categoryElements]
          .filter((item) => item.checked)
          .map((item) => item.value);
        await getBreeds(checkedCategories);
      });
    });
    //создаём ф-ию для загрузки данных
    async function getBreeds(categories) {
      //формируем параметр
      const param = new URLSearchParams();
      param.append("category", JSON.stringify(categories));
  
      breeds = await getData("/app/admin/tables/breeds/breed.search.php", param);
      //выведем полученные данные на страницу
      outOnPage(breeds);
    }
    function outOnPage(breeds) {
      breedsContainer.innerHTML = "";
      breeds.forEach((item) => {
        breedsContainer.insertAdjacentHTML("beforeend", createCard(item));
      });
      countBreeds.textContent = `найдено ${breeds.length} шт.`;
    }
  
    //создаём карточку товара
    function createCard({ image, id, name, category }) {
      return `<tr class="breed-position">
                      <th>${id}</th>
                      <th><img class='masters-img' src="/upload/${image}" alt=""></th>
                      <th>${name}</th>
                      <th>${category}</th>
                      <th><a href="/app/admin/tables/breeds/update.php?id=${id}" class="btn btn-primary btn-change">изменить</a></th>
                      <th><button class="btn btn-danger btn-delete-breed" data-breed-id="${id}">удалить</button></th>
                    </tr>
        `;
    }
  
    document.addEventListener("click", async (event) => {
      if (event.target.classList.contains("btn-delete-breed")) {
       
        let res = await outOnProductPage(
          event.target.dataset.breedId,
          "delete"
        );
        console.log(res);
        event.target.closest(".breed-position").remove();
      }
    });
    async function outOnProductPage(breedId, action) {
      let Breed = await postJSON(
        "/app/admin/tables/breeds/save.breed.php",
        breedId,
        action
      );
    }
  });
  