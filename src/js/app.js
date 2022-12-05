import { isWebp, headerFixed } from './modules'
import investmentDataMapping from './modules/investmentDataMapping'
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
    const category = investmentСalculationForm.querySelector('input[name="category"]:checked').value
    const capital = investmentСalculationForm.querySelector('input[name="capital"]:checked').value
    const investmentTables = investmentСalculationForm.querySelectorAll(`[data-table]`)
    const investmentData = investmentDataMapping[category][capital]

    console.log(investmentData);

    for (const key in investmentData) {
      const investmentTable = investmentСalculationForm.querySelector(`[data-table="${investmentData[key]}"]`)

      investmentTables.forEach((table) => table.style.display = 'none')
      investmentTable.style.display = 'block'
    }
  }

  recalculate()

  investmentСalculationForm.querySelectorAll('input[type="radio"]').forEach((inputRadio) => {
    inputRadio.addEventListener('input', recalculate)
  })
}