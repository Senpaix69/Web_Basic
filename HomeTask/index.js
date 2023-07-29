const days = document.querySelectorAll("tr");
const date = new Date();
const today = date.getDay();
days[today].className = "currentRow";