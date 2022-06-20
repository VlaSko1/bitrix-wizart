window.onload = function() {
  let form = document.getElementById('form');
  form.onsubmit = formSubmit;

  const telInput = document.getElementById('tel');
  telInput.oninput = mask;
  telInput.onfocus = mask;
  telInput.onblur = mask;
}
/**
 * Данная функция осуществляет отправку формы (если валидация каждого поля формы прошла) или отменяет отправку формы 
 * @param {object} e событие отправки формы
 */
 async function formSubmit(e) {
  e.preventDefault();
  const form = e.target;
  const elemData = {};
  [...e.target.elements].forEach((el) => elemData[el.name] = el.value);
  const formData = new FormData(form);
  
  if (validateForm(elemData)) {
    let indQuery = document.location.href.indexOf('?');
    let urlForm = document.location.href.slice(0, indQuery);
    let response = await fetch(`${urlForm}validate.php`, {
      method: 'POST',
      body: formData,
    });
    // Доделай ответ
    let result = await response.json();

    alert(result.message);
  }

}

/**
 * Данная функция валидирует форму и отображает (скрывает) ошибку для полей непрошедших (прошедших) валидацию
 * @param {object} objForValid объект, ключи которого - названия полей формы, значения - значения полей формы
 * @returns {boolean} возвращает true, если валидация формы прошла успешно и false - в противном случае
 */
function validateForm(objForValid) {
  let stateValid = true; 
  const objValidation = {
    'name': /^[А-Яа-я_-]{2,20}$/,
    'surname': /^[А-Яа-я_-]{2,30}$/,
    'email': /^([a-zA-Z0-9_\-\.]+)@([a-z0-9_\-\.]+)\.([a-z]{2,6})$/,
    'birthday': /^\d{4}-\d{2}-\d{2}$/,
    'tel': /^\+7\s\(\d{3}\)\d{3}-\d{2}-\d{2}$/,
    'city': /^[А-Яа-я_-\s]{2,35}$/,
    'file': /^[^<>"?|]+\.(jpg|png|bmp)$/,
  };
  Object.keys(objValidation).forEach((key) => {
    if(objValidation[key].test(objForValid[key])) {
      let errorBlock = document.getElementById(`${key}-error`);
      errorBlock.style.display = 'none';
      if (key === 'birthday') {
        const dateNow = new Date();
        const dateBirthday = new Date(objForValid[key]);
        if (((dateNow - dateBirthday) / 1000 / 60 / 60 / 24 / 365) < 10 || ((dateNow - dateBirthday) / 1000 / 60 / 60 / 24 / 365) > 90 ) {
          stateValid = false;
          errorBlock.style.display = 'block';
        }
      }
    } else {
      stateValid = false;
      let errorBlock = document.getElementById(`${key}-error`);
      errorBlock.style.display = 'block';
    }
  }); 

  return stateValid;
}

// Валидация поля для ввода телефона 

/**
 * Устанавливает курсор в нужную позицию 
 * @param {number} pos индекс текущей позиции курсора
 * @param {object} elem HTML элемент (input) 
 */
function setCursorPosition(pos, elem) {
  elem.focus();
  if (elem.setSelectionRange) {
    elem.setSelectionRange(pos, pos);
  } else if (elem.createTextRange) {
    let range = elem.createTextRange();
    range.collapse(true);
    range.moveEnd("character", pos);
    range.moveStart("character", pos);
    range.select()
  }
}

/**
 * Функция отображает или удаляет введенные символы соответствующие регулярном выражению с учётом маски matrix
 * @param {object} event событие происходящее с элементом input
 */
function mask(event) {
  let matrix = "+7 (___)___-__-__",
  i = 0,
  def = matrix.replace(/\D/g, ""),
  val = this.value.replace(/\D/g, "");

  if (def.length >= val.length) {
    val = def;
  } 
  this.value = matrix.replace(/./g, function(a) {
    return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a});
  if (event.type == "blur") {
    if (this.value.length == 2) this.value = ""
  } else {
    setCursorPosition(this.value.length, this)
  }
}

