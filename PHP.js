window.addEventListener("load", initSite)
document.getElementById("save").addEventListener("click", saveHoroscope)
document.getElementById("delete").addEventListener("click", deleteHoroscope)
document.getElementById("update").addEventListener("click", updateHoroscope)

async function initSite() {
}

async function saveHoroscope() {
    const dateToSave = document.getElementById("nummer").value
    const horoscopeText = document.getElementById("showHoroskop")

    if (!dateToSave.length) {
        horoscopeText.innerText = "Välj ett datum"
        return
    }

    const body = new FormData()
    body.set("dayOfBirth", dateToSave)

    const serverResponse = await makeRequest("./server/addHoroscope.php", "POST", body)

    if (serverResponse !== false) {
        horoscopeText.innerText = serverResponse
        console.log(serverResponse)

    } else {
        horoscopeText.innerText = "Du har redan sparat ett datum"
        console.log("Går ej att spara")
    }
}

async function updateHoroscope() {
    const dateToSave = document.getElementById("nummer").value
    const horoscopeText = document.getElementById("showHoroskop")

    if (!dateToSave.length) {
        horoscopeText.innerText = "Välj ett datum för att fortsätta"
        console.log("Du har inte sparat ett datum")
        return
    }

    const body = new FormData()
    body.set("dayOfBirth", dateToSave)

    const serverResponse = await makeRequest("./server/updateHoroscope.php", "POST", body)

    if (serverResponse !== false) {
        horoscopeText.innerText = serverResponse
        console.log(serverResponse)

    } else {
        horoscopeText.innerText = "Ta ett nytt datum och spara"
        console.log("Funkade inte att spara")

    }
}

async function deleteHoroscope() {
    const inputDate = document.getElementById("nummer")
    const serverResponse = await makeRequest("./server/deleteHoroscope.php", "DELETE")

    if (inputDate) {
        const horoscopeText = document.getElementById("showHoroskop")
        horoscopeText.innerText = ""
        const inputDate = document.getElementById("nummer")
        inputDate.value = ""
        console.log(serverResponse)
    } else {
        console.log(serverResponse)
    }

}

async function viewHoroscope() {
    const serverResponse = await makeRequest("./server/viewHoroscope.php", "GET")
    console.log(serverResponse)
}

async function makeRequest(path, method, body) {
    try {
        const response = await fetch(path, {
            method,
            body
        })
        console.log(response)
        return response.json()
    } catch (err) {
        console.error(err)
    }
}