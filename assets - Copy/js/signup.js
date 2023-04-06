const firebaseConfig = {
    apiKey: "AIzaSyCixz5owb2TaPkgo48494jeaooSAEuCTRVS-TJ-X6quc",
    authDomain: "clinirofordoctors.firebaseapp.com",
    projectId: "clinirofordoctors",
    storageBucket: "clinirofordoctors.appspot.com",
    messagingSenderId: "76962453450691206",
    appId: "1:769620691206:web:138a06yry50f7ef24a43907687",
    measurementId: "G-Z1PHertte440J1ZHM"
  };

  firebase.initializeApp(firebaseConfig);

const registerbtn = document.getElementById("signup").onclick = ((e) => {
    e.preventDefault()

    const name = document.getElementById("yourName").value
    const email = document.getElementById("yourEmail").value
    const password = document.getElementById("yourPassword").value



    /*--to check email already not exists in firestore--*/
    firebase.firestore().collection("users").where("email","==",email)
    .get().then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            if(doc.data().email === email){
                /*$("#name").css("border-bottom", "solid red 2px");*/
                $("#error-name").text("email already exists, please choose different one")
                return false
            }

        })
    }).catch(error =>{
        console.log("Unable to fetch document",error)
    })

    {
        /*$("signup").hide()*/
        const today = new Date()
        firebase.auth().createUserWithEmailAndPassword(email,password)
            .then((userCredentials) => {
                firebase.firestore.collection("users").doc().set({
                    name: name,
                    email : email,
                    password: password,
                    userId: userCredentials.user.uid,
                    created_at: today.getFullYear()+" "+(today.getMonth() +1)+" " + today.getDate()
                })

                swal({
                    title: "Sign Up",
                    text: "You have been successfully registered",
                    icon: "success",
                    button: "Login"
                }).then(function(){
                    window.location.href = "pages-login"
                })
            })
        
    }
})

/*
if(password.length < 8)
{
    $("#yourPassword").css("border-bottom","solid red 2px");
    $("")
}*/
