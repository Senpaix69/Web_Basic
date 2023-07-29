const colors = ["white", "black", "grey", "pink", "cyan", "lightpink"];
function changeColor(num) {
  document.body.style.backgroundColor = colors[Math.floor(Math.random() * 6)];
}
