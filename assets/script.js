//recuperations des elements
let form1 = document.querySelector('#reservation');
let form2 = document.querySelector('#options');
let form3 = document.querySelector('#coordonnees');


//affichage des formulaires actions appel dans les onclick
function displayForm(formNumber){
    let whitchOne = formNumber;
    switch (whitchOne) {
        case 2:
            form1.classList.add('hidden');
            form2.classList.remove('hidden');
            form3.classList.add('hidden');
            break;
        case 3:
            form1.classList.add('hidden');
            form2.classList.add('hidden');
            form3.classList.remove('hidden');
            break;
        default:
            form1.classList.remove('hidden');
            form2.classList.add('hidden');
            form3.classList.add('hidden');
    }
};

displayForm();











