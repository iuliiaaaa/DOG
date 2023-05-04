document.addEventListener("click", async (event) => {
  if (event.target.classList.contains("plus")) {
    outOnBasketPage(event.target.dataset.productId, "add");
  }
  if (event.target.classList.contains("minus")) {
    outOnBasketPage(event.target.dataset.productId, "dec");
  }
  if (event.target.classList.contains("trash")) {
    outOnBasketPage(event.target.dataset.productId, "delete");
    event.target.closest(".basket-position").remove();
  }
  if (event.target.classList.contains("clear")) {
    outOnBasketPage(event.target.dataset.productId, "clear");
    document.querySelector(".totalPrice").style.display = "none";
    document.querySelector(".totalCount").style.display = "none";
    document.querySelector(".message").textContent = "корзина пустая";
    //
    document.querySelectorAll(".basket-position").forEach((item) => item.remove());
  }
});
if (document.querySelectorAll(".basket-position").length == 0) {
  document.querySelector(".totalPrice").style.display = "none";
  document.querySelector(".totalCount").style.display = "none";
  document.querySelector(".message").textContent = "корзина пустая";
}

async function outOnBasketPage(productId, action) {
  let { productInBasket, totalPrice, totalCount } = await postJSON(
    "/app/tables/basket/save.basket.php",
    productId,
    action
  );


  if (productInBasket != "delete") {
    document.querySelector(`#count-${productId}`).textContent =
      productInBasket.count;
    document.querySelector(
      `[data-price-position="${productId}"]`
    ).textContent = ` ${~~productInBasket.price_position}₽`;
  }
  document.querySelector(".totalPrice").textContent = `итог: ${totalPrice}₽`;
  document.querySelector(
    ".totalCount"
  ).textContent = `итоговое количество: ${totalCount}/шт.`;
}
