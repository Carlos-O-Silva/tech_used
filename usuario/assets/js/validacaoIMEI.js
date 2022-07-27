(() => {
    let form = document.querySelector("form");
   
    let imei = document.querySelector("form #anu_imei");
  
    function validation() {
      validCamp(imei, imeiValidation);
    }
    setInterval(() => {
      validation();
    }, 500);
  
    function onlyNumber() {
      let camp = document.querySelectorAll(".onlyNumber");
      console.log(camp);
      camp.forEach(index => {
        console.log(index);
        index.addEventListener("keypress", e => {
          var key = window.event ? event.keyCode : e.which;
          if (key > 47 && key < 58) return true;
          else {
            if (key == 8 || key == 0) return true;
            else {
              e.preventDefault();
              return false;
            }
          }
        });
      });
    }
    onlyNumber();
  
    const btnActive = setInterval(() => {
      activeButton(terms, buttonSubmit);
    }, 100);
  
    buttonSubmit.addEventListener("click", () => {
      console.log(elements.length);
      if (elements.length > 0) {
        return false;
      } else {
        form.submit();
        clearInterval(btnActive);
      }
    });  
  
 
function imeiValidation(number) {
    var result = false;
    var numbers = [];
    var length, newNumber, sum, nearestMultipleOfTen, difference;
    
    length = newNumber = sum = nearestMultipleOfTen = difference = 0;
    
    while (number) {
    numbers.push(number % 10);
    number = Math.floor(number / 10);
    }
    
    numbers.reverse();
    
    length = numbers.length;
    
    if (length != 15)
    return result;
    
    for (var i = 0; i < 15; i++) {
    if (i % 2 != 0) {
    switch (numbers[i]) {
    case 0:
    // 0 * 2 = 0
    newNumber = 0;
    break;
    case 1:
    // 1 * 2 = 2
    newNumber = 2;
    break;
    case 2:
    // 2 * 2 = 4
    newNumber = 4;
    break;
    case 3:
    // 3 * 2 = 6
    newNumber = 6;
    break;
    case 4:
    // 4 * 2 = 8
    newNumber = 8;
    break;
    case 5:
    // 5 * 2 = 10
    // 1 + 0 = 1
    newNumber = 1;
    break;
    case 6:
    // 6 * 2 = 12
    // 1 + 2 = 3
    newNumber = 3;
    break;
    case 7:
    // 7 * 2 = 14
    // 1 + 4 = 5
    newNumber = 5;
    break;
    case 8:
    // 8 * 2 = 16
    // 1 + 6 = 7
    newNumber = 7;
    break;
    case 9:
    // 9 * 2 = 18
    // 1 + 8 = 9
    newNumber = 9;
    break;
    }
    numbers.splice(i, 1, newNumber);
    }
    }
    
    for (var i = 0; i < 14; i++) {
    sum += numbers[i];
    }
    
    nearestMultipleOfTen = Math.ceil(sum / 10) * 10;
    difference = nearestMultipleOfTen - sum;
    
    if (difference == numbers[14])
    result = true;
    
    return result;
   }

   function validCamp(obj, func) {
    obj.addEventListener("blur", () => {
      setClassValidation(obj, () => func(obj));
    });
  }

  function setClassValidation(obj, func) {
    let resp = func();

    if (resp == true) {
      obj.classList.add("is-valid");
      obj.classList.remove("is-invalid");
      obj.classList.remove("need-validate");
    } else {
      obj.classList.add("is-invalid");
      obj.classList.remove("is-valid");
      obj.classList.add("need-validate");
    }
  }})();
