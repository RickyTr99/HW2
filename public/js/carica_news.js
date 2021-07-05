function fetchNews(json)
{
    console.log(json);
    const news= document.querySelector(".news");
    for (let i in json)
    {
        
        const div=document.createElement("div");
        const titolo=document.createElement("h1");
        titolo.textContent=json[i].titolo;
        const img=document.createElement("img");
        img.src=json[i].immagine;
        img.id="myBtn";
        img.dataset.idImg=json[i].id;
        const descrizione=document.createElement("p");
        descrizione.textContent=json[i].descrizione;
        news.appendChild(div);
        div.appendChild(titolo);
        div.appendChild(img);
        div.appendChild(descrizione);
        img.addEventListener("click",modal);
    }
}
function fetchResponse(response){
    if (!response.ok) {return null};
    return response.json();
}

function modal(event){
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    span.onclick = function() {
         modal.style.display = "none";
         document.body.style['overflow'] = 'auto';
     }
  
    window.onclick = function(event) {

     if (event.target == modal) {
          modal.style.display = "none";
          document.body.style['overflow'] = 'auto';
     }
    }
    document.body.style['overflow'] = 'hidden';
    idNews = event.currentTarget.dataset.idImg;
    fetch(route('newsmodal', idNews)).then(fetchResponse).then(fetchModalNews);
    fetch(route('commenti')).then(fetchResponse).then(function(json){

        return fetchCommentiJson(json,idNews)
    });

}
function fetchModalNews(json){
        const modal_body = document.querySelector(".modal-body");
        modal_body.innerHTML="";
        const news= document.querySelector(".modal-body");
        const div=document.createElement("div");
        const titolo=document.createElement("h1");
        titolo.textContent=json[0].titolo;
        const img=document.createElement("img");
        img.src=json[0].immagine;
        img.id="myBtn";
        img.dataset.idImg=json[0].id;
        const descrizione=document.createElement("p");
        descrizione.textContent=json[0].descrizione;
        news.appendChild(div);
        div.appendChild(titolo);
        div.appendChild(img);
        div.appendChild(descrizione);
        
}

function aggiungiCommento(event){
    event.preventDefault();
    idNews=document.querySelector(".modal-body #myBtn").dataset.idImg;
    fetch(route('aggiungicommenti', [form.commento.value, idNews])).then(fetchResponse).then(addCommento);
}

function addCommento(json){
            console.log(json);
            const container=document.createElement("div");
            container.classList.add("commento");
            const nome=document.createElement("h1");
            nome.textContent=json[0].username+" :";
            const commento=document.createElement("p");
            commento.textContent=form.commento.value;
            container.appendChild(nome);
            container.appendChild(commento);
            document.querySelector(".commenti_content").prepend(container);
            form.commento.value="";
}

function fetchCommentiJson(json, idNews){
    document.querySelector(".commenti_content").innerHTML="";
    for(let i=json.length-1;i>=0; i--)
    {
        if(json[i].cod_news==idNews)
        {
            const container=document.createElement("div");
            container.classList.add("commento");
            const nome=document.createElement("h1");
            nome.textContent=json[i].Nome_Squadra+" :";
            const commento=document.createElement("p");
            commento.textContent=json[i].commento;
            container.appendChild(nome);
            container.appendChild(commento);
            document.querySelector(".commenti_content").appendChild(container);
        }
    }
}

const form=document.forms['commenta'];
form.addEventListener("submit",aggiungiCommento);
fetch(route('news', )).then(fetchResponse).then(fetchNews);