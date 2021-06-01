var select = document.getElementById("service_selector");
var other_description_container = document.getElementById("other");

var check = function () {
  var selector = document.getElementById("service_selector");
  if (selector.value == "other") {
    other_description_container.innerHTML =
      "<textarea name='other_descriprion' placeholder='Description' class='form-control transition'></textarea>";
  } else {
    other_description_container.innerHTML = "";
  }
};

select.oninput = check;
