
import { isWebp, headerFixed }from './modules'
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
let accordion = document.querySelector('.challenges__section');
let items = accordion.querySelectorAll('.content-wrapper');
let title = accordion.querySelectorAll('.content-wrapper .title');
function toggleAccordion() {
    let thisItem = this.parentNode;
    
    items.forEach(item => {
      if (thisItem == item ) {
        // if this item is equal to the clicked item, open it.
        thisItem.classList.toggle('active');
        return;
      } 
      // otherwise, remove the open class
      item.classList.remove('active');
    });
  }
  
  title.forEach(question => question.addEventListener('click', toggleAccordion));

//   табы 
  const tabsBtn = document.querySelectorAll(".challenges__tabs-plan")
  const tabsItems = document.querySelectorAll(".challenges__tabs-content .content__block")
  tabsBtn.forEach(function(item){
    item.addEventListener("click", function(){
        let currentBtn = item
        let tabId = currentBtn.getAttribute("data-tab")
        let currentTab = document.querySelector(tabId)
        if ( ! currentBtn.classList.contains('active')){
            tabsBtn.forEach(function(item){
                item.classList.remove('active')
                currentTab.classList.remove('active')
            })
            tabsItems.forEach(function(item){
                item.classList.remove('active')
            })
            currentBtn.classList.add('active')
            currentTab.classList.add('active')
        }

    })
  })
  document.querySelector('.challenges__tabs-plan').click()