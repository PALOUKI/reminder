
let loginForm=document.querySelector(".borderTop");
let loginBtn=document.querySelector(".loginBtn");
let closeSvg=document.querySelector(".closeSvg");

function OpenLoginForm(item){
    item.addEventListener("click",()=>{
        loginForm.style.display="block";
    
    }) 
}

function closeLoginForm(item){
    item.addEventListener("click",()=>{
        loginForm.style.display="none";
    
    }) 
}


OpenLoginForm(loginBtn);
closeLoginForm(closeSvg);