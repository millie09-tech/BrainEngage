//FLASH CARD SOFTWARE

const term = document.querySelector('.term');
const definition = document.querySelector('.definition');
const checkButton = document.querySelector('.check');
const nextButton = document.querySelector('.next');
var data1 = [];
var flashlength;
function getRandomWord() {
    // randomTerm = data[Math.floor(Math.random() * data.length)]
    var flashnum = Number(document.getElementById("flash_num").value);
    if(flashlength-1 == flashnum){
        flashnum =-1;
        alert('Deck is restarting');
    }
    flashnum = flashnum+1;

    document.getElementById("flash_num").value= flashnum;
    term.innerHTML = '<h3>'+data1[flashnum]["flashcard_name"]+'</h3>';
    definition.innerHTML = '<h3>'+data1[flashnum]["flashcard_desc"]+'</h3>';


    // console.log(randomTerm);
};

function flashcard() {
var quiz = document.getElementById("quiz").value;
//Gets the elements and buttons
    $.ajax({
        type: 'REQUEST',
        url: 'get_flashcard.php?quiz='+quiz,
        dataType: "json",
        success: function (data) {
            console.log(data);
            flashlength=data.length;
            data1 = data;
            getRandomWord();
        }
    });

}

/*let words = {
    "Data": "collection of facts",
    "Data analysis": "the collection, transformation, and organization of data in order to draw conclusions, make predictions, and drive informed decision-making",
    "Data analyst": "someone who collects, transforms, and organizes data in order to help make informed decisions",
    "People analytics": "the practice of collecting and analyzing data on the people who make up a company’s workforce in order to gain insights to improve how the company operates",
    "Ecosystem": "a group of elements that interact with one another",
    "Data ecosytem": "elements that interact with one another in order to produce, manage, store, organize, analyze, and share data",
    "Data analytics": "the science of data. It's a very broad concept that encompasses everything from the job of managing and using data to the tools and methods that data workers use each and every day",
    "Data analyst": "Who find answers to existing questions by creating insights from data sources?",
    "Data scientist": "Who creates new questions using data?",
    "Data Science": "creating new ways of modeling and understanding the unknown by using raw data",
    "Data analysis life cycle": "the process of going from data to decision. Data goes through several phases as it gets created, consumed, tested, processed, and reused"
}*/

//let words = document.getElementById("txtHint").value;
// console.log(data[0][1]);




function removeElement() {
    definition.style.display = 'none';
}

checkButton.addEventListener('click', function(){
    definition.style.display = 'block';
});

nextButton.addEventListener('click', function(){
    // setTimeout(function (){
    //     getRandomWord()
    // },3000)
    removeElement();
    getRandomWord();
    // console.log("You clicked the 'Next' Button");
});


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


