/*const firebaseConfig = {
    apiKey: "AIzaSyCixz5owb2TaPkgo48494jeaooSAEuCTRVS-TJ-X6quc",
    authDomain: "clinirofordoctors.firebaseapp.com",
    projectId: "clinirofordoctors",
    storageBucket: "clinirofordoctors.appspot.com",
    messagingSenderId: "769624535340691206",
    appId: "1:7698787899620691206:web:138a060f7ef24a43907687",
    measurementId: "G-Z1PH3450J1ZHM"
  };

  firebase.initializeApp(firebaseConfig);


function signup(){
    const name = document.getElementById("yourName").value
    const email = document.getElementById("yourEmail").value
    const password = document.getElementById("yourPassword").value

    console.log(name)



    firebase.firestore().collection("users").where("email","==",email)
    .get().then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            if(doc.data().email === email){
                $("#error-name").text("email already exists, please choose different one")
                return false
            }

        })
    }).catch(error =>{
        console.log("Unable to fetch document",error)
    })

    {
       
        const today = new Date()
        firebase.auth().createUserWithEmailAndPassword(email,password)
            .then((userCredential) => {
                firebase.firestore().collection("users").doc().set({
                    name: name,
                    email : email,
                    password: password,
                    userId: userCredential.user.uid,
                    created_at: today.getFullYear()+" "+(today.getMonth() +1)+" " + today.getDate()
                })
                swal({
                    title: "Sign Up",
                    text: "You have been successfully registered",
                    icon: "success",
                    button: "Login"
                }).then(function(){
                    window.location.href = "pages-login.html"
                })
            })        
    }
}

function login(){
    console.log("hello");
    const email = document.getElementById("yourEmaillogin").value
    const password = document.getElementById("yourPasswordlogin").value

    firebase.auth().signInWithEmailAndPassword(email,password)
    .then((userCredential) => {
        sessionStorage.setItem("uid", userCredential.user.uid)
        window.location.href = "index.html"
    }).catch((error) => {
        swal({
            title: "Sign In",
            text: error.message,
            icon: "error",
            button: "Try again"
        })
            
        })

}

function signout(){
    console.log("Logged Out")

    firebase.auth().signOut().then(() => {
     sessionStorage.removeItem("uid")
     swal ({
         title: "Logged Out",
         text: "Log out successful",
         icon: "success",
         button: "Login Again"
     }).then(function() {
         window.location.href = "pages-login.html"
     })
    }).catch(error => {
     swal({
         title: "Logged Out",
         text: error.message,
         icon: "error",
         button: "Login Again"
     })
    })
    return false
}



/*
const loginBtn = document.getElementById("signin").onclick = ((e) => {
    e.preventDefault()

    const email = document.getElementById("yourEmaillogin").value
    const password = document.getElementById("yourPasswordlogin").value

    firebase.auth().signInWithEmailAndPassword(email,password)
    .then((userCredential) => {
        sessionStorage.setItem("uid", userCredential.user.uid)
        window.location.href = "index.html"
    }).catch((error) => {
        swal({
            title: "Sign In",
            text: error.message,
            icon: "error",
            button: "Try again"
        })
            
        })
})
/*
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
      // User is signed in, see docs for a list of available properties
      // https://firebase.google.com/docs/reference/js/firebase.User
      var uid = user.uid;
      // ...
    } else {
      // User is signed out
      // ...
    }
  });
*/
