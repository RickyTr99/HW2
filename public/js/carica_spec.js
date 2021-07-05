fetchSpec();
let x=0;
document.getElementById("cerca").addEventListener("keyup", cerca);

function fetchSpec(json)
{
    console.log(json);
    const spec= document.querySelector(".specialità");
    for (let i in json)
    {
        
        const div=document.createElement("div");
        const pref=document.createElement("span");
        const stella=document.createElement("img");
        stella.src="https://github.com/RickyTr99/MWH2/blob/images/preferiti-.png?raw=true";
        const titolo=document.createElement("h1");
        titolo.textContent=json[i].titolo;
        const img=document.createElement("img");
        img.src=json[i].url;
        img.id="myBtn";
        img.dataset.idImg=json[i].id;
        const descrizione=document.createElement("p");
        descrizione.textContent=json[i].descrizione;
        spec.appendChild(div);
        pref.appendChild(stella);
        div.appendChild(pref);
        div.appendChild(titolo);
        div.appendChild(img);
        div.appendChild(descrizione);
        div.dataset.titoloId=i;
        pref.addEventListener("click", addPref);
        pref.classList.add("pointer");
    }
}
function fetchResponse(response){
    if (!response.ok) {return null};
    return response.json();
}

function addPref(json){
    for(let i in json)
    {
        if(i==json.currentTarget.parentNode.dataset.titoloId)
        {
            x++;
            const pref= document.querySelector(".preferiti");
            pref.parentNode.classList.remove("hidden");
            const span=document.createElement("span");
            const elimina=document.createElement("img");
            elimina.src="https://github.com/RickyTr99/MWH2/blob/images/preferiti-no.png?raw=true"
            const div=document.createElement("div");
            const titolo=document.createElement("h1");
            titolo.textContent=json[i].titolo;
            const img=document.createElement("img");
            img.src=json[i].url;
            pref.appendChild(div);
            span.appendChild(elimina);
            div.appendChild(span);
            div.appendChild(titolo);
            div.appendChild(img);
            div.dataset.prefId=i;
            json.currentTarget.removeEventListener("click", addPref);
            json.currentTarget.firstChild.src="https://github.com/RickyTr99/MWH2/blob/images/preferiti.jpg?raw=true";
            json.currentTarget.classList.remove("pointer");
            elimina.addEventListener("click", eliminaPref);
            elimina.classList.add("pointer");
        }
    }
}

function eliminaPref(json){
    json.currentTarget.removeEventListener("click", eliminaPref);
    json.currentTarget.parentNode.parentNode.remove();
    const id=document.querySelectorAll(".specialità div");
    for(let i of id)
    {
        
        if(i.dataset.titoloId==json.currentTarget.parentNode.parentNode.dataset.prefId)
        {
            x--;
            i.firstChild.firstChild.src="https://github.com/RickyTr99/MWH2/blob/images/preferiti-.png?raw=true";
            i.firstChild.addEventListener("click", addPref);
            i.firstChild.classList.add("pointer");
            if(x==0)
            {
                const pref= document.querySelector(".specialità");
                pref.parentNode.classList.add("hidden");
            }
        }
    }
    
}

function cerca(){
    let valore = document.getElementById("cerca").value;
    const id=document.querySelectorAll(".specialità div");
    let a=0;
    for(let i of id)
    {
        
        i.classList.add("hidden");
        if(i.dataset.titoloId.startsWith(valore))
        {
            
            i.classList.remove("hidden");

            a=1;
            document.getElementById("risultato").classList.add("hidden");
        }
    }
    if(a==0)
    {
        document.getElementById("risultato").classList.remove("hidden");
    }
}



fetch("fetch_spec.php").then(fetchResponse).then(fetchSpec);