
const form = document.querySelector('form');
 
form.addEventListener('submit', function (event) {
    event.preventDefault(); 

    const formData = new FormData(form);
    const json = {
        text: formData.get('bericht'),
        sign: formData.get('name')
    };

    console.log(json);
    
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    })
    .then(response => response.text())
    .then(html => {
        console.log('Response HTML:', html);
        document.querySelector('#wallpost').outerHTML = html;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
 
