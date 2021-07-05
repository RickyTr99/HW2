fetch(route('caricagare')).then(fetchResponse).then(fetchOrario);
function fetchOrario(json)
{
    console.log(json);
    const tabella= document.querySelector(".table_body");
    for (let i in json)
    {
        
        const tr=document.createElement("tr");
        const orario=document.createElement("td");
        orario.textContent=json[i].orario;
        const specialita=document.createElement("td");
        specialita.textContent=json[i].specialita;
        tabella.appendChild(tr);
        tr.appendChild(orario);
        tr.appendChild(specialita);
    }
}
function fetchResponse(response){
    if (!response.ok) {return null};
    return response.json();
}
