        // login button click 

        document.querySelector("#show-login").addEventListener("click", () => {
            document.querySelector(".popup").classList.add("active");
        });

        document.querySelector(".popup .close-btn").addEventListener("click", () => {
            document.querySelector(".popup").classList.remove("active");
        });

        document.querySelector("#signUpLink").addEventListener("click", (e) => {
            e.preventDefault(); 
            document.querySelector(".popup #signIn").style.display = "none";
            document.querySelector(".popup #signUp").classList.add("active");
            document.querySelector(".popup #signIn").classList.remove("active");
        });

        document.querySelector("#signInLink").addEventListener("click", (e) => {
            e.preventDefault(); 
            document.querySelector(".popup #signIn").style.display = "block";
            document.querySelector(".popup #signIn").classList.add("active");
            document.querySelector(".popup #signUp").classList.remove("active");
        });
        

        document.querySelector("#forgotPsdLink").addEventListener("click", (e) => {
            e.preventDefault(); 
            document.querySelector(".popup #signIn").style.display = "none";
            document.querySelector(".popup #forgotPsd").classList.add("active");
            document.querySelector(".popup #signIn").classList.remove("active");
        });

        document.querySelector("#backToLoginLink").addEventListener("click", (e) => {
            e.preventDefault(); 
            document.querySelector(".popup #signIn").style.display = "block";
            document.querySelector(".popup #signIn").classList.add("active");
            document.querySelector(".popup #forgotPsd").classList.remove("active");
        });



        