
        var form=document.getElementById('form')
        form.addEventListener('submit',e=>{
            e.preventDefault()
            // user input
            var umail=document.getElementById('email').value
            var upassword=document.getElementById('pass').value
            // local storage 
            var mail=localStorage.getItem('mail')
            var password=localStorage.getItem('password')
            if(umail=="" && upassword=="")
            {
                alert('fields cannot be empty')
            }
            else if(umail!="" && upassword==""){
                alert('password cannot be empty')
            }
            else if(umail=="" && upassword!=""){
                alert('mail cannot be empty')
            }
            else{
                if(umail!=mail && upassword!=password)
                {
                    alert('mail and password is not matching')
                }
                else if(umail!=mail && upassword==password)
                {
                    alert('mail is not matching')
                }
                else if(umail==mail && upassword!=password)
                {
                    alert('password is not matching')
                }
                else{
                    alert('mail and password is matching')
                    open('./home.html',"_self")
                }
               
            }
            
        })

    // todo sign up page
    var forms = document.getElementById("form");
    forms.addEventListener("submit", (e) => {
      e.preventDefault();
      var name1 = document.getElementById("name").value;
      var email = document.getElementById("mail").value;
      var pass = document.getElementById("pass").value;
      var cpass = document.getElementById("cpass").value;
      if (pass != cpass) {
        alert("password and re-password are not matching");
      } else if (pass == "" && cpass == "") {
        alert("fields cannot be empty");
      } else if (pass == "" && cpass != "") {
        alert("password cannot be empty");
      } else if (pass != "" && cpass == "") {
        alert("re-password cannot be empty");
      } else {
        alert("password and re-password is matching");
        localStorage.setItem("name", name1);
        localStorage.setItem("mail", email);
        localStorage.setItem("password", pass);
        open("./login.html");
      }
    });