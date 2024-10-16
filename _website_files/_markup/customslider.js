const sliderWrapper = document.getElementById('sliderWrapper');
const progressBar = document.getElementById('progressBar');
const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');

let currentIndex = 0;
const totalItems = sliderWrapper.children.length;
let visibleItems = 4; 
const itemWidth = sliderWrapper.children[0].offsetWidth + 10; 
let totalScrollWidth = itemWidth * (totalItems - visibleItems); 

// responsive ramdeni item gamochndes
if (window.innerWidth < 550) {
  visibleItems = 1;
} else if (window.innerWidth < 769) {
  visibleItems = 2;
}

// progress bar
function updateProgressBar() {
  const progress = (currentIndex / (totalItems - visibleItems)) * 100;
  progressBar.style.width = `${progress}%`;
}

// slider modzraobas marjvniv an marcxniv indexis mixedvit
function updateSliderPosition() {
  sliderWrapper.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
  updateProgressBar();
}

//  marcxena isarze clickit indexs vamcirebt 1 it da sliders vaapdeitebt rom indexsis mixedvit moaxdinos transform
leftArrow.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    updateSliderPosition();
  }
});

//  marjvena  isarze clickit indexs vzrdit 1 it da sliders vaapdeitebt rom indexsis mixedvit moaxdinos transform
rightArrow.addEventListener('click', () => {
  if (currentIndex < totalItems - visibleItems) {
    currentIndex++;
    updateSliderPosition();
  }
});

// gadatrevis funqcionali

let isDragging = false;
let startX;
let scrollLeft;


function startDrag(e) {
  e.preventDefault();
  isDragging = true;
  sliderWrapper.classList.add('dragging');
  startX = getPositionX(e) - sliderWrapper.offsetLeft;
  scrollLeft = sliderWrapper.style.transform
    ? -parseInt(sliderWrapper.style.transform.replace('translateX(', '').replace('px)', ''))
    : 0;

}

function stopDrag() {
  if (!isDragging) return;

  // Snap the slider to the nearest item when dragging stops
  currentIndex = Math.round(-parseInt(sliderWrapper.style.transform.replace('translateX(', '').replace('px)', '')) / itemWidth);
  updateSliderPosition(); // Re-align the slider position to the nearest full item
  isDragging = false;
  sliderWrapper.classList.remove('dragging');
}

function dragMove(e) {
  if (!isDragging) return;
  e.preventDefault();
  const x = getPositionX(e) - sliderWrapper.offsetLeft;
  const walk = (x - startX) * 1.5; // sichqare
  let newPosition = scrollLeft - walk;
  const maxScrollIndex = totalItems - visibleItems;
  const maxScrollPosition = maxScrollIndex * itemWidth;
  newPosition = Math.max(0, Math.min(newPosition, maxScrollPosition));
  sliderWrapper.style.transform = `translateX(-${newPosition}px)`;

  // Update the current index based on the new position
  currentIndex = Math.round(newPosition / itemWidth);
  updateProgressBar();
}


function getPositionX(e) {
  return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
}

// gadatreva mousit
sliderWrapper.addEventListener('mousedown', startDrag);
window.addEventListener('mouseup', stopDrag);
window.addEventListener('mousemove', dragMove);
sliderWrapper.addEventListener('mouseleave', stopDrag);

// gadatreva mobailze 
sliderWrapper.addEventListener('touchstart', startDrag, { passive: true });
window.addEventListener('touchend', stopDrag);
window.addEventListener('touchmove', dragMove, { passive: true });
