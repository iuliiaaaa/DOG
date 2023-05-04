answer = document.querySelector(".price-applications");
let count = document.querySelectorAll("input[type = 'checkbox']");
let otv = 0;

count.forEach((item) => {
  item.onchange = function () {
    if (item.checked) {
      otv += ~~item.dataset.price;
    } else {
      otv -= item.dataset.price;
    }
    answer.innerText = `${otv} ₽`;
  };
});

answer.innerText.style.disabled;

document.querySelectorAll("[type = 'checkbox']").forEach((check) => {
  check.addEventListener("click", (event) => {
    if (event.target.checked) {
      document.querySelectorAll("[type = 'hidden']").forEach((time) => {
        if (time.id == event.target.value) {
          time.disabled = false;
        }
      });
    }
    if (!event.target.checked) {
      document.querySelectorAll("[type = 'hidden']").forEach((time) => {
        if (time.id == event.target.value) {
          time.disabled = true;
        }
      });
    }
  });
});
