const userInput = document.getElementById("userinput");
var expression = '';

function press(num) {
    if (expression.endsWith('+') || expression.endsWith('-') || expression.endsWith('*') || expression.endsWith('/') || expression.endsWith('.')) {
        if (num == '+' || num == '-' || num == '*' || num == '/'|| num == '.') {
            expression = expression.slice(0, expression.length - 1);
        }
    }
    expression += num;
    userInput.value = expression;
}

function remove() {
    expression = expression.slice(0, expression.length - 1);
    userInput.value = expression;
}

function erase() {
    userInput.value = '';
    expression = '';
}

function equal() {
    userInput.value = eval(expression);
    expression = '';
}