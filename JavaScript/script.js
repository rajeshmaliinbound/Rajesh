
// This code of externalScript.html
function orangeColor(){
    document.getElementById('fun').style.color='white';
    document.getElementById('divfun').style.backgroundColor='black';
  }

  function redColor(){
    document.getElementById('fun').style.color='red';
    document.getElementById('divfun').style.backgroundColor='blue';
  }

  function greenColor(){
    document.getElementById('fun').style.color='green';
    document.getElementById('divfun').style.backgroundColor='pink';
  }

  function myFunction(){
    document.getElementById('fun').style.color='black';
    document.getElementById('divfun').style.backgroundColor='white';
  }




//this Code of srithmeticOperator.html
  function addition(x,y){
    let result = x + y;
   document.getElementById('Addition').innerHTML = "Addition of 100+21 =" +result;
}

function subtraction(x,y){
    let result = x - y;
    document.getElementById('Subtraction').innerHTML = "Subtraction of 100-21 =" +result;
}

function multiplication(x,y){
    let result = x * y;
    document.getElementById('Multiplication').innerHTML = "Multiplication of 100*21 =" +result;
}

function exponentiation(x,y){
    let result = x ** y;
    document.getElementById('Exponentiation').innerHTML = "Exponentiation of 100**2 =" +result;
}

function division(x,y){
    let result = x / y;
    document.getElementById('Division').innerHTML = "Division of 100/21 =" +result;
}

function modulus(x,y){
    let result = x % y;
    document.getElementById('modulus').innerHTML = "Modulus of 100%21 =" +result;
}


function increment(x){
    x++;
    let result = x;
    document.getElementById('increment').innerHTML = "increment value of 101++:  =" +result;
}

function decrement(x){
    x--;
    let result = x;
    document.getElementById('decrement').innerHTML = "decrement value of 101--: =" +result;
}



// This code of Getformdata.html

function addition(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1+num2;
}

function subtraction(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1-num2;
}

function multiplication(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1*num2;
}

function exponentiation(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1**num2;
}

function division(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1/num2;
}

function modulus(){
  let value1 = document.getElementById('firstNumber').value;
  let value2 = document.getElementById('secondNumber').value;
  num1 =  Number(value1);
  num2 =  Number(value2)
  
  document.getElementById('Output').innerHTML = num1%num2;
}
