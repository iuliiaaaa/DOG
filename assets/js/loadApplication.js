let selectStatus = document.querySelector("[name = status]");
let btn = document.querySelector("[name = saveBtn]");

// document.addEventListener("click", (event) => {
//   let status = selectStatus.value;
//   let reason_cancel = document.querySelector("[name = reason_cancel]").value;

//   console.log(status);
//   btn.disabled = status == 3 && reason_cancel == "";
// });
document.querySelector("#reason_cancel").addEventListener("input", () => {
  btn.disabled = false;
});

selectStatus.addEventListener("change", (event) => {
  let status = selectStatus.value;
  let reason_cancel = document.querySelector("[name = reason_cancel]").value;
  btn.disabled = status == 3 && reason_cancel == "";
});
