import { isWebp, headerFixed } from './modules'
/* Раскомментировать для использования */
// import { MousePRLX } from './libs/parallaxMouse'

/* Раскомментировать для использования */
// import Swiper, { Navigation, Pagination } from 'swiper'

// Проверка браузера на поддерку .webp изображений ====================================================================================================================================================
isWebp()
// ====================================================================================================================================================

// Паралакс мышей ====================================================================================================================================================
// const mousePrlx = new MousePRLX({})
// ====================================================================================================================================================

// Фиксированный header ====================================================================================================================================================
// headerFixed()
// ====================================================================================================================================================

// const element = document.querySelectorAll('.head__section')
// element.scrollIntoView({
//     behavior: 'smooth'
// })
const accordion = document.querySelector('.challenges__section')
const items = accordion.querySelectorAll('.content-wrapper')
const title = accordion.querySelectorAll('.content-wrapper .title')
function toggleAccordion() {
  const thisItem = this.parentNode

  items.forEach((item) => {
    if (thisItem === item) {
      // if this item is equal to the clicked item, open it.
      thisItem.classList.toggle('active')
      return
    }
    // otherwise, remove the open class
    item.classList.remove('active')
  })
}

title.forEach((question) => question.addEventListener('click', toggleAccordion))

const investmentСalculationForm = document.querySelector('.challenges__block')

if (investmentСalculationForm) {
  const recalculate = () => {
    const category = investmentСalculationForm.querySelector(
      'input[name="category"]:checked'
    ).value
    const capital = investmentСalculationForm.querySelector(
      'input[name="capital"]:checked'
    ).value

    investmentСalculationForm
      .querySelectorAll(`[data-table]`)
      .forEach((table) => table.classList.remove('_active'))
    
    investmentСalculationForm
      .querySelector(`[data-table="${category}-${capital}"]`)
      .classList.add('_active')
  }

  recalculate()

  investmentСalculationForm
    .querySelectorAll('input[type="radio"]')
    .forEach((inputRadio) => inputRadio.addEventListener('input', recalculate))
}


const sendingMailForms = document.querySelectorAll('[data-send-form]')

sendingMailForms.forEach((form) => {
  form.addEventListener('submit', resendEmailToForm)
})

function resendEmailToForm(e) {
  e.preventDefault()

  const inputValue = this.querySelector('input').value
  const formForResend = document.getElementById('participation_form')
  const inputResend = formForResend.querySelector('input')
  const buttonResend = formForResend.querySelector('button')

  inputResend.value = inputValue
  buttonResend.click()
}

// document.querySelector('.header__close').onclick = function() {
//   document.querySelector('.header').classList.add('d-none');
// }

window.addEventListener('load', () => {
  document.documentElement.classList.add('_loaded')
})