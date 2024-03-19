const btqFlowers = []
let btqTie = null
let isPlaceOrderEnabled = false

const wrapperCost = 100
let grossAmount = 0
let billingAmount = 0



var availableFlowers = []

$.ajax({
    url: "api/flowers.php",
    type: "POST",
   
  
    success: function(data) {
        availableFlowers = JSON.parse(data);
        console.log(data);
        const flowerList = document.getElementById("flower-list-inner");
        const flowerString = []

        availableFlowers.forEach((element, index) => {
            flowerString.push(`<div class="sm-img-wrapper" onclick="onClickFlower(${index})"> <img  class="flower-10" src="${element.url}" /> </div>`)
        })
        flowerList.innerHTML = flowerString.join(" ")

    },
    error: function() {
         alert("E4: Add Favourite Error.");
         return false;
    }
});

var availableTies = []

$.ajax({
    url: "api/rippen.php",
    type: "POST",
   
  
    success: function(data) {
        availableTies = JSON.parse(data);
        console.log(data);
        const tiesList = document.getElementById("tie-list-inner");
        const tieString = []

        availableTies.forEach((element, index) => {
            tieString.push(`<div class="sm-img-wrapper" onclick="onClickRippen(${index})"> <img  class="flower-10" src="${element.url}" /> </div>`)
        })
        tiesList.innerHTML = tieString.join(" ")

    },
    error: function() {
         alert("E4: Add Favourite Error.");
         return false;
    }
});

function createListItems() {
    // const flowerList = document.getElementById("flower-list-inner");
    // const tiesList = document.getElementById("tie-list-inner");

    // const flowerString = []
    // const tieString = []

    // availableFlowers.forEach((element, index) => {
    //     flowerString.push(`<div class="sm-img-wrapper" onclick="onClickFlower(${index})"> <img  class="flower-10" src="${element.url}" /> </div>`)
    // })

    // availableTies.forEach((element, index) => {
    //     tieString.push(`<div class="sm-img-wrapper" onclick="onClickRippen(${index})"> <img  class="flower-10" src="${element.url}" /> </div>`)
    // })

    // // flowerList.innerHTML = flowerString.join(" ")
    // tiesList.innerHTML = tieString.join(" ")
}

function onClickFlowerOrTies(type) {

    const flowerList = document.getElementById("flower-list");
    const tiesList = document.getElementById("tie-list");

    if (type == "FLOWER") {
        tiesList.style.display = "none"
        flowerList.style.display = "block"
    } else {

        tiesList.style.display = "block"
        flowerList.style.display = "none"
    }

}


function onClickRippen(index) {
    btqTie = availableTies[index]
    const element = document.getElementById('tie-overlay')
    element.innerHTML = `<img class="tie-img" src="${btqTie.subUrl}" />`
}

function onClickFlower(index) {
    debugger
    const item = availableFlowers[index]

    const element = document.getElementById('flower-overlay')
    btqFlowers.push({ ...item, x: 0, y: 0 })
    element.innerHTML = getImageString()
    document.getElementById('complete-btn-id').disabled = false
    
}

function onClickComplete() {
    const element = document.getElementById('header-text')
    element.innerHTML = "Final Bouquet"

    document.getElementById('footer-btn').style.display = "none"
    document.getElementById('list-right-wrapper').style.display = "none"
    document.getElementById('complete-btn').style.display = "none"
    document.getElementById('total-wrapper').style.display = "block"
    document.getElementById('finish-btn').style.display = "block"

    const billSummary = document.getElementById('bill-summary')
    const hash = {}

    btqFlowers.forEach(element => {
    if (hash[element.id]) {
        const data = hash[element.id];
        data.count += 1;
        data.totalAmount += parseInt(element.amount); // Parse element.amount to an integer
        grossAmount += parseInt(element.amount); // Parse element.amount to an integer
    } else {
        hash[element.id] = {
            count: 1,
            name: element.name,
            amount: element.amount,
            totalAmount: parseInt(element.amount) // Parse element.amount to an integer
        };
        grossAmount += parseInt(element.amount); // Parse element.amount to an integer
    }
});


    const uniqFlowers = Object.values(hash)

    const str = [`<div class="bill-item"> <div>Wrapper Cost:</div> <div><b> ₹ ${wrapperCost}</b></div></div>`]

    uniqFlowers.forEach(element => {
        str.push(`<div class="bill-item"> <div>${element.name}: (${element.count}*${element.amount}) </div> <div><b>₹${element.totalAmount}</b></div></div>`)
    })

    if (btqTie) {
        grossAmount += parseInt(btqTie.amount);
        str.push(`<div class="bill-item"> <div>Bouquet Tie: (1*${btqTie.amount})</div> <div><b>₹${btqTie.amount}</b></div></div>`)
    }

    grossAmount += wrapperCost

    str.push(`<div class="bill-item"> <div>Total Price:</div> <div><b> ₹ ${grossAmount}</b></div></div>`)

    billSummary.innerHTML = str.join(' ')
}

function onClickFinish() {
    if(isPlaceOrderEnabled){

        let url = window.location.href
        url = url.split('/')
        url.length = url.length - 1
        url.push(`place-order.php`)
        
        window.location.href = `${url.join('/')}?ba= ₹ ${billingAmount}`

    }
    const element = document.getElementById('total-wrapper')
    const deliveryCharge = 40
    billingAmount = grossAmount+deliveryCharge
    const arr = [
        `<div class="bill-item"> <div>Price:</div> <div><b>₹${grossAmount}</b></div></div>`,
        `<div class="bill-item"> <div>Delivery Charge:</div> <div><b>₹${deliveryCharge}</b></div></div>`,
        `<div class="bill-item"> <div>Total Price:</div> <div><b>₹${billingAmount}</b></div></div>`
    ]
    element.innerHTML = arr.join("")
    isPlaceOrderEnabled = true
    document.getElementById('finish-id').innerHTML = "Place Order"
}

function removeFlower(index) {
    btqFlowers.splice(index, 1)
    const element = document.getElementById('flower-overlay')
    element.innerHTML = getImageString()
    document.getElementById('complete-btn-id').disabled = btqFlowers.length <=0

}


function getImageString() {
    const arr = []
    for (let i = 0; i < btqFlowers.length; i++) {
        const item = btqFlowers[i]
        if (!item.x) item.x = getRandomPixel(30, 90)
        if (!item.y) item.y = getRandomPixel(80, 160)
        arr.push(`<img onclick="removeFlower(${i})" class="flower-btq" style="position: absolute;top: ${item.x}px; left: ${item.y}px;" src="${item.subUrl}" />`)
    }
    return arr.join("")
}

function getRandomPixel(min, max) {
    return Math.random() * (max - min) + min;
}

function getBillingAmount(){
    const urlParams = new URLSearchParams(window.location.search);
    const amount = urlParams.get('ba');
    document.getElementById('amount-id').innerHTML = `${amount}`
    
}
