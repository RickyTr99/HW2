fetch(route('carica_podcast')).then(onResponse).then(onJson);

function onResponse(response) {
console.log('Risposta ricevuta');
return response.json();
}


function onJson(json) {
  console.log(json);
  console.log('JSON ricevuto');
  const library = document.querySelector("#Podcast");
  const results = json.episodes.items;
  let num_results = results.length;
  if(num_results > 9)
    num_results = 9;
  for(let i=0; i<num_results; i++)
  {
    const podcast_data = results[i]
    const title = document.createElement('h1');
    title.textContent= podcast_data.name;
    const selected_image = podcast_data.images[0].url;
    const description = document.createElement('p');
    description.textContent= podcast_data.description;
    library.classList.add('album');
    const img = document.createElement('img');
    const button=document.createElement('a');
    button.href= podcast_data.external_urls.spotify;
    button.textContent= "Ascolta";
    button.target="_blank";
    const container = document.createElement('div');
    img.src = selected_image;
    container.appendChild(title);
    container.appendChild(img);
    container.appendChild(description);
    container.appendChild(button);
    library.appendChild(container);

  }
}






