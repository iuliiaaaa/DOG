let date = document.querySelector("#date_provision");
let masters = document.querySelectorAll(".workwers");
let servises = document.querySelectorAll(".servuses");
let table = document.querySelector(".times_table");

let times = [
  "10:00:00",
  "11:00:00",
  "12:00:00",
  "13:00:00",
  "14:00:00",
  "15:00:00",
  "16:00:00",
  "17:00:00",
  "18:00:00",
];

date.addEventListener("change", function (e) {
  let selectedDate = e.target.value;
  let selectedWorker = "";
  // let selectedServises =[]
  let duratation = 0;
  masters.forEach((item) => {
    if (item.checked) {
      selectedWorker = item.value;
    }
  });
  servises.forEach((item) => {
    if (item.checked) {
      duratation += +item.dataset.duratation;
    }
  });
  if (selectedWorker != "") {
    postJSON(
      "/app/tables/products/timeJsLoader.php",
      { worker_id: selectedWorker, date: selectedDate },
      "getLockTime"
    ).then(function (value) {
      let tempArr = [];
      table.innerHTML = "";
      value.Product.forEach((item) => {
        for (let i = 0; i < item.total_duration; i++) {
          times.forEach((time) => {
            if (
              +time.substring(0, 2) >= +item.time_provision.substring(0, 2) &&
              +time.substring(0, 2) == +item.time_provision.substring(0, 2) + i
            ) {
              tempArr.push(time);
            }
          });
        }
      });

      let arrX = [];

      for (let i = 0; i < times.length; i++) {
        for (let j = 0; j < duratation; j++) {
          if (
            tempArr.indexOf(times[i + j]) != -1 ||
            i + duratation > times.length
          ) {
            arrX.push({ time: times[i], lock: true });
            break;
          }
          if (j == duratation - 1) {
            arrX.push({ time: times[i], lock: false });
          }
        }
      }
      arrX.forEach((item) => {
        if (item.lock) {
          table.insertAdjacentHTML(
            "beforeend",
            `<input type="radio" class="times" id="times${
              item.time
            }" disabled name="times" value="${item.time}">
        <label style="background: rgb(103, 103, 103);" for="times${
          item.time
        }">${item.time.substring(0, 5)}</label>`
          );
        } else {
          table.insertAdjacentHTML(
            "beforeend",
            `<input type="radio" class="times" id="times${item.time}"${
              item.time
            }" name="times" value="${item.time}">
        <label for="times${item.time}">${item.time.substring(0, 5)}</label>`
          );
        }
      });
    });
  }
});
masters.forEach((item) => {
  item.addEventListener("change", function (e) {
    let selectedDate = date.value;
    let selectedWorker = e.target.value;
    let duratation = 0;
    servises.forEach((item) => {
      if (item.checked) {
        duratation += +item.dataset.duratation;
      }
    });
    if (selectedDate != "") {
      postJSON(
        "/app/tables/products/timeJsLoader.php",
        { worker_id: selectedWorker, date: selectedDate },
        "getLockTime"
      ).then(function (value) {
        let tempArr = [];
        table.innerHTML = "";
        value.Product.forEach((item) => {
          for (let i = 0; i < item.total_duration; i++) {
            times.forEach((time) => {
              if (
                +time.substring(0, 2) >= +item.time_provision.substring(0, 2) &&
                +time.substring(0, 2) ==
                  +item.time_provision.substring(0, 2) + i
              ) {
                tempArr.push(time);
              }
            });
          }
        });

        let arrX = [];
        for (let i = 0; i < times.length; i++) {
          for (let j = 0; j < duratation; j++) {
            if (
              tempArr.indexOf(times[i + j]) != -1 ||
              i + duratation > times.length
            ) {
              arrX.push({ time: times[i], lock: true });
              break;
            }
            if (j == duratation - 1) {
              arrX.push({ time: times[i], lock: false });
            }
          }
        }
        arrX.forEach((item) => {
          if (item.lock) {
            table.insertAdjacentHTML(
              "beforeend",
              `<td><input type="radio" class="times" id="times${
                item.time
              }" disabled name="times" value="${item.time}">
            <label style="background: rgb(103, 103, 103);" for="times${
              item.time
            }">${item.time.substring(0, 5)}</label></td>`
            );
          } else {
            table.insertAdjacentHTML(
              "beforeend",
              `<td> <input type="radio" class="times" id="times${
                item.time
              }"   name="times" value="${item.time}">
            <label for="times${item.time}">${item.time.substring(
                0,
                5
              )}</label></td>`
            );
          }
        });

      });
    }
  });
});
times.forEach((item) => {
  let temp = item.substring(0, 5);
});
servises.forEach((item) => {
  item.addEventListener("change", function () {
    let selectedDate = date.value;
    let selectedWorker = "";
    let duratation = 0;
    masters.forEach((item) => {
      if (item.checked) {
        selectedWorker = item.value;
      }
    });
    servises.forEach((item) => {
      if (item.checked) {
        duratation += +item.dataset.duratation;
      }
    });
    if (selectedWorker != "" && selectedDate != "") {
      postJSON(
        "/app/tables/products/timeJsLoader.php",
        { worker_id: selectedWorker, date: selectedDate },
        "getLockTime"
      ).then(function (value) {
        let tempArr = [];
        table.innerHTML = "";
        value.Product.forEach((item) => {
          for (let i = 0; i < item.total_duration; i++) {
            times.forEach((time) => {
              if (
                +time.substring(0, 2) >= +item.time_provision.substring(0, 2) &&
                +time.substring(0, 2) ==
                  +item.time_provision.substring(0, 2) + i
              ) {
                tempArr.push(time);
              }
            });
          }
        });

        let arrX = [];
        for (let i = 0; i < times.length; i++) {
          for (let j = 0; j < duratation; j++) {
            if (
              tempArr.indexOf(times[i + j]) != -1 ||
              i + duratation > times.length
            ) {
              arrX.push({ time: times[i], lock: true });
              break;
            }
            if (j == duratation - 1) {
              arrX.push({ time: times[i], lock: false });
            }
          }
        }
        arrX.forEach((item) => {
          if (item.lock) {
            table.insertAdjacentHTML(
              "beforeend",
              `<input type="radio" class="times" id="times${
                item.time
              }" disabled name="times" value="${item.time}">
            <label style="background: rgb(103, 103, 103);" for="times${
              item.time
            }">${item.time.substring(0, 5)}</label>`
            );
          } else {
            table.insertAdjacentHTML(
              "beforeend",
              `<input type="radio" class="times" id="times${
                item.time
              }" name="times" value="${item.time}">
            <label for="times${item.time}">${item.time.substring(0, 5)}</label>`
            );
          }
        });
      });
    }
  });
});
