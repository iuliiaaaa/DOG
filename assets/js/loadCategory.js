document.addEventListener("click", async (event) => {
  if (event.target.classList.contains("btn-remove")) {
    id = event.target.dataset.id;
    let response = await fetch("/app/admin/tables/category_del_admin.php", {
      method: "POST",
      headers: { "Content-Type": "application/json;charset=UTF-8" },
      body: JSON.stringify({ id }),
    });

    event.target.closest(".category-position").remove();

    await response.json();
  }
});
