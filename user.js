// FUNCTION FOR ERROR AND SUCCES
function setErrorFor(element, errorMessage) {
    const parent = element.closest('.formvalid');
    if(parent.classList.contains('formvalid-success')){
        parent.classList.remove('formvalid-success');
    }
    parent.classList.add('formvalid-error');
    const small = parent.querySelector('small');
    small.textContent = errorMessage;
  }
  function setSuccessFor(element){
    const parent = element.closest('.formvalid');
    if(parent.classList.contains('formvalid-error')){
        parent.classList.remove('formvalid-error');
    }
    parent.classList.add('formvalid-success');
    const small = parent.querySelector('small');
    small.textContent = ' ';
  }
// VALIDATION FORM SIGNUP
const form_signup = document.querySelector('#signupform');
const name_signup = document.querySelector('#name');
const cin_signup = document.querySelector("#cin");
const phone_signup = document.querySelector("#phone");
const email_signup = document.querySelector("#email");
const adresse_signup = document.querySelector("#adresse");
const type_signup =document.querySelector('#type');
const nickname_signup =document.querySelector('#nickname');
const birthdate_signup =document.querySelector('#bithdate');
const password_signup =document.querySelector('#password');
const confirmpassword_signup =document.querySelector('#confirmpassword');
if(form_signup)
{
    form_signup.addEventListener('submit', (event)=>{
        validate_Form_signup();
        console.log(isFormValid_signup());
        if(isFormValid_signup()==true){
            form_signup.submit();
         }else {
             event.preventDefault();
         }
      
      });

}


function isFormValid_signup(){
  const inputContainers = form_signup.querySelectorAll('.formvalid');
  let result = true;
  inputContainers.forEach((container)=>{
      if(container.classList.contains('formvalid-error')){
          result = false;
      }
  });
  return result;
}

function validate_name()
{
    if(name_signup.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(name_signup);
    } else {
        setErrorFor(name_signup, 'champ no valid');
    }
}
function validate_cin()
{
    if(cin_signup.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(cin_signup);
    } else {
        setErrorFor(cin_signup, 'champ no valid');
    }
}
function validate_phone()
{
    if(phone_signup.value.match(/(06|07)\d{8}/g)) {
        setSuccessFor(phone_signup);
    } else {
        setErrorFor(phone_signup, 'champ no valid');
    }
}
function validate_email()
{
    if(email_signup.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g)) {
        setSuccessFor(email_signup);
    } else {
        setErrorFor(email_signup, 'champ no valid');
    }
}
function validate_adress()
{
    if(adresse_signup.value.match(/[a-zA-Z]{3,1000}/g)) {
        setSuccessFor(adresse_signup);
    } else {
        setErrorFor(adresse_signup, 'champ valid valid');
    }
}
function validate_type()
{
    if(type_signup.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(type_signup);
    } else {
        setErrorFor(type_signup, 'champ no valid');
    }
}
function validate_nickname()
{
    if(nickname_signup.value.match(/^(?=.*[a-zA-Z])(?=.*\d).+$/g)) {
        setSuccessFor(nickname_signup);
    } else {
        setErrorFor(nickname_signup, 'champ no valid');
    }
}
function validate_birthdate()
{
    if(birthdate_signup.value.match(/^\d{4}-\d{2}-\d{2}$/g)) {
        setSuccessFor(birthdate_signup);
    } else {
        setErrorFor(birthdate_signup, 'champ no valid');
    }
}
function validate_password()
{
    if(password_signup.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{}|\[\]\\:";<>,.?/~`]).{8,}$/g)) {
        setSuccessFor(password_signup);
    } else {
        setErrorFor(password_signup, 'champ no valid');
        setErrorFor(confirmpassword_signup, 'champ no valid');

    }
}
function validate_confirmpassword()
{
    if(confirmpassword_signup.value == password_signup.value) {
        setSuccessFor(confirmpassword_signup);
    } else {
        setErrorFor(confirmpassword_signup, 'champ no valid');
    }
}
function validate_Form_signup()
{
    validate_name();
    validate_adress();
    validate_birthdate();
    validate_cin();
    validate_email();
    validate_phone();
    validate_type();
    validate_confirmpassword();
    validate_password();
    validate_nickname();
}
// VALIDATION FORM SIGNIN
const form_signin = document.querySelector('#signinform');
const nickname_signin =document.querySelector('#nicknamesignin');
const password_signin =document.querySelector('#passwordsignin');
if (form_signin) {
    form_signin.addEventListener('submit', (event)=>{
        console.log("dkhel");
        validate_Form_signin();
      console.log(isFormValid_signin());
      if(isFormValid_signin()==true){
        form_signin.submit();
       }else {
           event.preventDefault();
       }
    
    });
    
}


function isFormValid_signin(){
  const inputContainers = form_signin.querySelectorAll('.formvalid');
  let result = true;
  inputContainers.forEach((container)=>{
      if(container.classList.contains('formvalid-error')){
          result = false;
      }
  });
  return result;
}
function validate_nicknamesignin()
{
    if(nickname_signin.value.match(/^(?=.*[a-zA-Z])(?=.*\d).+$/g)) {
        setSuccessFor(nickname_signin);
    } else {
        setErrorFor(nickname_signin, 'champ no valid');
    }
}
function validate_passwordsignin()
{
    if(password_signin.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{}|\[\]\\:";<>,.?/~`]).{8,}$/g)) {
        setSuccessFor(password_signin);
    } else {
        setErrorFor(password_signin, 'champ no valid');

    }
}
function validate_Form_signin()
{
    validate_passwordsignin();
    validate_nicknamesignin();
}
// VALIDATION FORM EDIT PROFILE
const form_editprofile = document.querySelector('#editprofileform');
const name_editprofile = document.querySelector('#nameedit');
const cin_editprofile = document.querySelector("#cinedit");
const phone_editprofile = document.querySelector("#phoneedit");
const email_editprofile = document.querySelector("#emailedit");
const adresse_editprofile = document.querySelector("#adresseedit");
const type_editprofile =document.querySelector('#typeedit');
const nickname_editprofile =document.querySelector('#nicknameedit');
const birthdate_editprofile =document.querySelector('#bithdateedit');
const password_editprofile =document.querySelector('#passwordedit');
const confirmpassword_editprofile =document.querySelector('#confirmpasswordedit');
if(form_editprofile)
{
    form_editprofile.addEventListener('submit', (event)=>{
        validate_Form_editprofile();
        console.log(isFormValid_editprofile());
        if(isFormValid_editprofile()==true){
            form_editprofile.submit();
         }else {
             event.preventDefault();
         }
      
      });

}


function isFormValid_editprofile(){
  const inputContainers = form_editprofile.querySelectorAll('.formvalid');
  let result = true;
  inputContainers.forEach((container)=>{
      if(container.classList.contains('formvalid-error')){
          result = false;
      }
  });
  return result;
}

function validate_name_editprofile()
{
    if(name_editprofile.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(name_editprofile);
    } else {
        setErrorFor(name_editprofile, 'champ no valid');
    }
}
function validate_cin_editprofile()
{
    if(cin_editprofile.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(cin_editprofile);
    } else {
        setErrorFor(cin_editprofile, 'champ no valid');
    }
}
function validate_phone_editprofile()
{
    if(phone_editprofile.value.match(/(06|07)\d{8}/g)) {
        setSuccessFor(phone_editprofile);
    } else {
        setErrorFor(phone_editprofile, 'champ no valid');
    }
}
function validate_email_editprofile()
{
    if(email_editprofile.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g)) {
        setSuccessFor(email_editprofile);
    } else {
        setErrorFor(email_editprofile, 'champ no valid');
    }
}
function validate_adress_editprofile()
{
    if(adresse_editprofile.value.match(/[a-zA-Z]{3,1000}/g)) {
        setSuccessFor(adresse_editprofile);
    } else {
        setErrorFor(adresse_editprofile, 'champ valid valid');
    }
}
function validate_type_editprofile()
{
    if(type_editprofile.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(type_editprofile);
    } else {
        setErrorFor(type_editprofile, 'champ no valid');
    }
}
function validate_nickname_editprofile()
{
    if(nickname_editprofile.value.match(/^(?=.*[a-zA-Z])(?=.*\d).+$/g)) {
        setSuccessFor(nickname_editprofile);
    } else {
        setErrorFor(nickname_editprofile, 'champ no valid');
    }
}
function validate_birthdate_editprofile()
{
    if(birthdate_editprofile.value.match(/^\d{4}-\d{2}-\d{2}$/g)) {
        setSuccessFor(birthdate_editprofile);
    } else {
        setErrorFor(birthdate_editprofile, 'champ no valid');
    }
}
function validate_password_editprofile()
{
    if(password_editprofile.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{}|\[\]\\:";<>,.?/~`]).{8,}$/g)) {
        setSuccessFor(password_editprofile);
    } else {
        setErrorFor(password_editprofile, 'champ no valid');
        setErrorFor(confirmpassword_editprofile, 'champ no valid');

    }
}
function validate_confirmpassword_editprofile()
{
    if(confirmpassword_editprofile.value == password_editprofile.value) {
        setSuccessFor(confirmpassword_editprofile);
    } else {
        setErrorFor(confirmpassword_editprofile, 'champ no valid');
    }
}
function validate_Form_editprofile()
{
    validate_name_editprofile();
    validate_adress_editprofile();
    validate_birthdate_editprofile();
    validate_cin_editprofile();
    validate_email_editprofile();
    validate_phone_editprofile();
    validate_type_editprofile();
    validate_confirmpassword_editprofile();
    validate_password_editprofile();
    validate_nickname_editprofile();
}
const togglePasswordconfirm_editprofile = document.querySelector('#togglePasswordconfirmedit');
console.log(togglePasswordconfirm_editprofile);
if(togglePasswordconfirm_editprofile)
{
    togglePasswordconfirm_editprofile.addEventListener('click', function() {
        const type = confirmpassword_editprofile.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmpassword_editprofile.setAttribute('type', type);
        // toggle the eye slash icon
        const icon=this.querySelector("i")
        icon.classList.toggle('fa-eye');
    });
}
const togglePassword_editprofile = document.querySelector('#togglePasswordedit');
console.log(togglePassword_editprofile);
if(togglePassword_editprofile)
{
    togglePassword_editprofile.addEventListener('click', function() {
        const type = password_editprofile.getAttribute('type') === 'password' ? 'text' : 'password';
        password_editprofile.setAttribute('type', type);
        // toggle the eye slash icon
        const icon=this.querySelector("i")
        icon.classList.toggle('fa-eye');
    });
}

// VALIDATION UPDAT COLLECTION
const form_editcollection = document.querySelector('.myFormupdat');
const title_editcollection = document.querySelector('.titleupdat');
const author_editcollection = document.querySelector('.authorupdat');
const editiondate_editcollection = document.querySelector(".editiondateupdat");
const datepurchase_editcollection = document.querySelector(".datepurchaseupdat");
const state_editcollection = document.querySelector(".stateupdat");
const status_editcollection =document.querySelector('.statusupdat');
const type_editcollection =document.querySelector('.typeupdat');
if(form_editcollection)
{
    form_editcollection.addEventListener('submit', (event)=>{
        validate_Form_editcollection();
        console.log(isFormValid_editcollection());
        if(isFormValid_editcollection()==true){
            form_editcollection.submit();
         }else {
             event.preventDefault();
         }
      
      });

}


function isFormValid_editcollection(){
  const inputContainers = form_editcollection.querySelectorAll('.formvalid');
  let result = true;
  inputContainers.forEach((container)=>{
      if(container.classList.contains('formvalid-error')){
          result = false;
      }
  });
  return result;
}

function validate_title_editcollection()
{
    if(title_editcollection.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(title_editcollection);
    } else {
        setErrorFor(title_editcollection, 'champ no valid');
    }
}
function validate_author_editcollection()
{
    if(author_editcollection.value.match(/[a-zA-Z]{3,30}/g)) {
        setSuccessFor(author_editcollection);
    } else {
        setErrorFor(author_editcollection, 'champ no valid');
    }
}
function validate_editiondate_editcollection()
{
    if(editiondate_editcollection.value.match(/^\d{4}-\d{2}-\d{2}$/g)) {
        setSuccessFor(editiondate_editcollection);
    } else {
        setErrorFor(editiondate_editcollection, 'champ no valid');
    }
}
function validate_datepurchase_editcollection()
{
    if(datepurchase_editcollection.value.match(/^\d{4}-\d{2}-\d{2}$/g)) {
        setSuccessFor(datepurchase_editcollection);
    } else {
        setErrorFor(datepurchase_editcollection, 'champ no valid');
    }
}
function validate_state_editcollection()
{
    if(state_editcollection.selectedIndex>0) {
        setSuccessFor(state_editcollection);
    } else {
        setErrorFor(state_editcollection, 'champ valid valid');
    }
}
function validate_type_editcollection()
{
    if(type_editcollection.selectedIndex>0) {
        setSuccessFor(type_editcollection);
    } else {
        setErrorFor(type_editcollection, 'champ no valid');
    }
}
function validate_status_editcollection()
{
    if(status_editcollection.selectedIndex>0) {
        setSuccessFor(status_editcollection);
    } else {
        setErrorFor(status_editcollection, 'champ no valid');
    }
}

function validate_Form_editcollection()
{
    validate_title_editcollection();
    validate_state_editcollection();
    validate_author_editcollection();
    validate_datepurchase_editcollection();
    validate_editiondate_editcollection();
    validate_type_editcollection();
    validate_status_editcollection();
}
// VALIDATION ADD COLLECTION
const form_addcollection = document.querySelector('.myFormadd');
const title_addcollection = document.querySelector('.titleadd');
const author_addcollection = document.querySelector(".authoradd");
const editiondate_addcollection = document.querySelector(".editiondateadd");
const datepurchase_addcollection = document.querySelector(".datepurchaseadd");
const status_addcollection =document.querySelector('.statusadd');
const type_addcollection =document.querySelector('.typeadd');
if(form_addcollection)
{
    form_addcollection.addEventListener('submit', (event)=>{
        console.log("dkhel");
        validate_Form_addcollection();
        console.log(isFormValid_addcollection());
        if(isFormValid_addcollection()==true){
            form_addcollection.submit();
         }else {
             event.preventDefault();
         }
      
      });

}


function isFormValid_addcollection(){
  const inputContainers = form_addcollection.querySelectorAll('.formvalid');
  let result = true;
  inputContainers.forEach((container)=>{
      if(container.classList.contains('formvalid-error')){
          result = false;
      }
  });
  return result;
}