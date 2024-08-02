let menuToggle = document.querySelector('.menuToggle');
let header = document.querySelector('header');
let section = document.querySelector('section');

menuToggle.onclick = function() {
  header.classList.toggle('active');
  section.classList.toggle('active');
}

const FAQsItemHeaders = document.querySelectorAll(".FAQs-item-header");
FAQsItemHeaders.forEach(FAQsItemHeader => {
  FAQsItemHeader.addEventListener("click", event => {
    FAQsItemHeader.classList.toggle("active");
    const FAQsItemBody = FAQsItemHeader.nextElementSibling;
    if (FAQsItemHeader.classList.contains("active")) {
      FAQsItemBody.style.maxHeight = FAQsItemBody.scrollHeight + "px";
    } else {
      FAQsItemBody.style.maxHeight = 0;
    }
  });
});
