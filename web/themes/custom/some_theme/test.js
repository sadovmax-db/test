// Поганий код для перевірки ESLint

var foo = 'bar'; // Використання var замість let або const

function badFunction() {
    console.log('This is bad!'); // Використання console.log у коді
    
    if (foo == 'bar') { // Використання == замість ===
        alert('Unsecured alert!'); // Використання alert
    }
    
    for (var i = 0; i < 10; i++) { // Використання var у циклі
        console.log(i);
    }
}

badFunction();
