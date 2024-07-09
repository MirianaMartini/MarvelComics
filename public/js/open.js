const comics=document.querySelectorAll('button.btn.btn-outline-danger');
for (const comic of comics){
     comic.addEventListener('click', destroy_comic);
}


const collection_id=0;
const user_id=0;

function destroy_comic(event){
     console.log("yes baby");
     const comic_info= event.currentTarget.parentNode.parentNode;
     collection_id=comic_info.querySelector(".id_collection").textContent;
     user_id=comic_info.querySelector(".id_user").textContent;
     const id_comic=comic_info.querySelector("span.hidden").textContent;
   
     fetch('/open/delete/'+id_comic+'/'+collection_id).then(res=>res.text()).then($("#exampleModalCenter").modal("hide"));
   }

   $("#exampleModalCenter").on('hidden.bs.modal', function(event){
         console.log("chiudi");
          window.location.href="/open/"+collection_id+"/"+user_id;
        
});