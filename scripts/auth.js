document.getElementById("authForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const form = e.target;
  const fields = form.querySelectorAll("input");
  const formData = new FormData(form);

  let isValid = true;
  let errors = [];

  fields.forEach((el) => {
    el.classList.remove("error");
  });
  document.getElementById("errorMessage").textContent = "";

  const login = form.login.value.trim();
  const password = form.password.value;

  if (!login) {
    errors.push("Введите корректную логин");
    form.login.classList.add("error");
    isValid = false;
  }
  if (!password) {
    errors.push("Введите корректную пароль");
    form.password.classList.add("error");
    isValid = false;
  }
  if (!isValid) {
    document.getElementById("errorMessage").innerHTML = errors.join("<br>");
    return;
  }

  fetch("php/login.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Вы вошли в систему!");
        window.location.href = "lk.php";
      } else {
        document.getElementById("errorMessage").innerHTML = data.message;
        if (data.message == "Логин неправильный") {
          form.login.classList.add("error");
        }
        if (data.message == "Пароль неправильный") {
          form.password.classList.add("error");
        }
      }
    })
    .catch((error) => {
      document.getElementById("errorMessage").innerHTML = error.message;
    });
});
