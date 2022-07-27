(() => {
    let form = document.querySelector("form");
   
    let cpf = document.querySelector("form #usu_cpf");
  
    function validation() {
      validCamp(cpf, cpfValidation);
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
  
    function cpfValidation(cpf) {
      cpf = cpf.value;
      cpf = cpf.replace(/[^\d]+/g, '');
      if (cpf == "") return false;
      if (
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"
      )
        return false;
      add = 0;
      for (i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11) rev = 0;
      if (rev != parseInt(cpf.charAt(9))) return false;
      add = 0;
      for (i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11) rev = 0;
      if (rev != parseInt(cpf.charAt(10))) return false;
      return true;
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
    }
  })();
  
  
  function cpfMask() {
    if (cpf.value.length > 2 && cpf.value.length <= 3) {
      cpf.value = `${cpf.value}.`;
    } else if (cpf.value.length > 6 && cpf.value.length <= 7) {
      cpf.value = `${cpf.value}.`;
    } else if (cpf.value.length > 10 && cpf.value.length <= 11) {
      cpf.value = `${cpf.value}-`;
    }
  }
  
  
  cpf.addEventListener("keypress", () => {
    cpfMask(cpf);
});
  