const firebaseConfig = {
    apiKey: "AIzaSyCixz5owb2TaPkgo48494jeaooSAEuCTRVS-TJ-X6quc",
    authDomain: "clinirofordoctors.firebaseapp.com",
    projectId: "clinirofordoctors",
    storageBucket: "clinirofordoctors.appspot.com",
    messagingSenderId: "7696543455620691206",
    appId: "1:769620691206:web:138a0rtret60f7ef24a43907687",
    measurementId: "G-Z1P4353H0J1ZHM"
  };

  firebase.initializeApp(firebaseConfig);

  




document.getElementById("logout-btn").onclick = (() => {
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
    
})


/*firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
  
      var name = user.email
    
      var users = document.getElementById("user")
      var text = document.createTextNode(email);
  
      users.appendChild(text);
  
      console.log(users)
      //is signed in
    } else {
      //no user signed in
    }
  })*/




