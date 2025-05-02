// test-linter.js

let name = "Test";
const age = 30;
const PI = 3.14;

function Person(name, age) {
  this.name = name;
  this.age = age;
  this.sayHello = function() {
    console.log(`Hi my name is ${this.name}`);
  };
}

const p = new Person(name, age);
p.sayHello();

// Function never used
function unusedFunction(a, b, c, d, e, f, g) {
  return a + b + c + d + e + f + g;
}

for (let i = 0; i < 10; i++) {
  console.log(`i is ${i}`);
  for (let j = 0; j < 5; j++) {
    console.log(`j is ${j}`);
  }
}

const list = [1, 2, 3, 4, , 6, 7]; // double comma
list.forEach(function(item, index) {
  console.log(`Item at ${index} is ${item}`);
});

if ((name = "Other")) {
  // assignment instead of comparison
  console.log("Name matched");
}

function messyFunction(x, y) {
  return x * y;
}

// Deprecated var use
const obj = new Object();
obj.name = "Object";
obj.type = "generic";
obj.say = function() {
  console.log(`I am ${obj.name}`);
};

obj.say();

function add(a, b) {
  const result = a + b;
  return resultt; // typo in return variable
}

// No semicolon, bad naming, magic numbers
function doStuff() {
  let result = 0;
  for (let i = 0; i < 100; i++) {
    result += i * 3.14159;
  }
  console.log("Done");
}

doStuff();

// Uncaught exception not handled
function risky() {
  throw "This is bad";
}

risky();

// Eval use – bad practice
eval("console.log('EVAL IS BAD')");

// trailing comma
const data = {
  a: 1,
  b: 2,
  c: 3
};
