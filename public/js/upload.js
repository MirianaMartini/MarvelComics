
var title;
var description;

var id;
var img;    


$(document).ready(function(){
    $(".btn.btn-primary").click(function(event){
        var button =event.currentTarget; // Button that triggered the modal               console.log(button);       
        console.log(button);
        var recipient = button.parentNode;
        console.log(recipient); 
        console.log(recipient.querySelector(".card-title"));
        d_title=recipient.querySelector(".card-title");
        d_description=recipient.querySelector(".card-text");
        title=d_title.textContent;
        description=d_description.textContent;

        var comic= recipient.parentNode;
        id=comic.querySelector("#id_comic").textContent;
        img=comic.querySelector("img");    
        console.log(title);
        console.log(description);
        console.log(img.src);
        $("#exampleModalCenter").modal("show");
   });
  $("#exampleModalCenter").on('shown.bs.modal', function(event){
   
    
       console.log("sono qua");
            var modal = $(this);
            modal.find('.modal-body span.hidden').text(id);
            modal.find('.modal-title').text(title);
            modal.find('.modal-body img').attr("src", img.src);
            modal.find('.modal-body p').text(description);
         
  });
});

const collections=document.querySelectorAll('button.btn.btn-light');
for (const collection of collections){
     collection.addEventListener('click', inserisci_newcomic);
}



function inserisci_newcomic(event){
     const id_collection=event.currentTarget.parentNode.querySelector(".coll").textContent;

     const form=document.querySelector('form');

     const collection_id=document.createElement("input");
     const comic_id=document.createElement("input");
     const comic_title=document.createElement("input");
     const comic_img=document.createElement("input");
     const comic_description=document.createElement("input");
     
     collection_id.value=id_collection;
     comic_id.value=id;
     comic_title.value=title;
     comic_img.value=img.src;
     comic_description.value=description;
    
     collection_id.name="id_collection";
     comic_id.name="id_comic";
     comic_title.name="title_c";
     comic_img.name="img_c";
     comic_description.name="description_c";

     form.appendChild(collection_id);
     form.appendChild(comic_id);
     form.appendChild(comic_title);
     form.appendChild(comic_img);
     form.appendChild(comic_description);
     const formdata= new FormData(form);

    console.log(form);
    fetch("/search/add/", {method:'post', 
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                           body: formdata}).then(res=>res.text()).then(//text=>console.log(text)
                                                                       $("#exampleModalCenter").modal("hide")
                                                                   );
                                                     
                           //then(onResponse).then(onJson);
    console.log("ho eseguito il fetch");
   }

   $("#exampleModalCenter").on('hidden.bs.modal', function(event){
       
    console.log("chiudi");
        
});










const comics=document.querySelectorAll('button.btn.btn-outline-danger');
for (const comic of comics){
     comic.addEventListener('click', destroy_comic);
}


let collection_id=0;

function destroy_comic(event){
     console.log("yes baby");
     const comic_info= event.currentTarget.parentNode.parentNode;
     console.log(comic_info.querySelector(".modal-header h4").textContent);
     collection_id=comic_info.querySelector(".modal-header h4").textContent;
     const id_comic=comic_info.querySelector("span.hidden").textContent;
   
     fetch('/open/delete/'+id_comic+'/'+collection_id).then(onResponse).then(onJSON);
   }

function onResponse(response){
     console.log(response);
     
     return response.json();
}

function onJSON(info){
 
     const id_collection=info[0];
     const id_user=info[1];
     const id_comic=info[2];

     //se hai tempo cerca di farlo in modo sincrono
     window.location.href='/home/'+id_collection+'/'+id_user; 
}
    
    
    