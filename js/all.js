const text = "Buy our quality products at affordable prices with 20% discount";
const typewriter = document.getElementById("typewriter");
let index = 0;

function type() {
  if (index < text.length) {
    typewriter.textContent += text[index];
    index++;
    setTimeout(type, 100); // adjust typing speed
  }
}

type();


//progress bar and it'S CONTENT
const progressBar = document.getElementById('progress-bar');

window.addEventListener('scroll', () => {
  const scrollDistance = window.scrollY;
  const maxLength = document.body.scrollHeight - window.innerHeight;
  const progress = (scrollDistance / maxLength) * 100;
  
  progressBar.style.width = `${progress}%`;
});

