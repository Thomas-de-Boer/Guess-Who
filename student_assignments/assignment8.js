let clicked_counter = 0;

let score = 0

document.querySelectorAll('.person img').forEach(img => {
    img.addEventListener('click', async () => {

        if (img.classList.contains('selected')) {
            clicked_counter--;
            img.classList.remove('selected');
        } else {
            clicked_counter++;
            img.classList.add('selected');
        }

        let current = img.src;
        img.src = img.dataset.alt;
        img.dataset.alt = current;

        console.log(clicked_counter)

        if (clicked_counter === 23) {
            const lastPerson = document.querySelector('.person img:not(.selected)');

            const name = lastPerson.alt;

            let response = await fetch("../includes/check.php", {
                method: "POST",
                body: "name=" + encodeURIComponent(name),
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }
            });
            let text = await response.text()
            if (text === "correct") {
                document.getElementById('popup-content_win').classList.remove('hidden');
            }
            else if (text === "incorrect") {
                document.getElementById('popup-content_lose').classList.remove('hidden');
            }
            document.getElementById('popup').classList.remove('hidden');
        }
    });
});

document.querySelectorAll('.closePopup').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('popup').classList.add('hidden');

        window.location.href = "?reset=1";
    });
});

async function autoFlip(mustClickList) {
    for (const name of mustClickList) {
        const img = document.querySelector(`.person img[alt="${name}"]`);
        if (img && !img.classList.contains('selected')) {
            // toggle image
            let current = img.src;
            img.src = img.dataset.alt;
            img.dataset.alt = current;

            // markeer als geselecteerd
            img.classList.add('selected');
            clicked_counter++;

            // check if last person
            console.log(clicked_counter)
            if (clicked_counter === 23) {
                const lastPerson = document.querySelector('.person img:not(.selected)');
                const lastName = lastPerson.alt;

                let response = await fetch("../includes/check.php", {
                    method: "POST",
                    body: "name=" + encodeURIComponent(lastName),
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    }
                });

                let text = await response.text();
                if (text === "correct") {
                    document.getElementById('popup-content_win').classList.remove('hidden');
                } else if (text === "incorrect") {
                    document.getElementById('popup-content_lose').classList.remove('hidden');
                }
                document.getElementById('popup').classList.remove('hidden');
            }
        }
    }
}



document.querySelector('#form').addEventListener('submit', async function (event) {
    event.preventDefault();

    radios = document.getElementsByName('attributes')
    for (let radio of radios) {
        if (radio.checked) {
            value = radio.value
        }
    }

    let response = await fetch("../includes/check.php", {
        method: "POST",
        body: "attributes=" + encodeURIComponent(value),
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    });

    score += 1

    document.querySelector('#guesses').innerHTML = "<b>You guessed the right person in " + score + " guesses.</b>"


    let json = await response.json()

    document.querySelector('#form_answer').innerHTML = "<b> " + json['answer'] + " </b>"

    const isAuto = document.getElementById('main_container').dataset.auto === '1';
    if (isAuto && json['must_click'].length) {
        await autoFlip(json['must_click']);
    }
});
