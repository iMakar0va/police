document.getElementById("createForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const form = e.target;
  const fields = form.querySelectorAll("input,textarea");
  const formData = new FormData(form);

  let isValid = true;
  let errors = [];

  fields.forEach((el) => {
    el.classList.remove("error");
  });
  document.getElementById("errorMessage").textContent = "";

  const numberCar = form.number_car.value.trim();
  const comment = form.comment.value.trim();

  if (!numberCar) {
    errors.push("Введите номер машины");
    form.number_car.classList.add("error");
    isValid = false;
  }
  if (!comment) {
    errors.push("Введите жалобу");
    form.comment.classList.add("error");
    isValid = false;
  }
  if (!isValid) {
    document.getElementById("errorMessage").innerHTML = errors.join("<br>");
    return;
  }

  fetch("php/insert_app.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Вы подали жалобу!");
        window.location.href = "lk.php";
      } else {
        document.getElementById("errorMessage").innerHTML = data.message;
      }
    })
    .catch((error) => {
      document.getElementById("errorMessage").innerHTML = error.message;
    });
});
