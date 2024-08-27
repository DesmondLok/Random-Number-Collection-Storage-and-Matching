<?php include "header.php";  ?>

<body class="backgroundRed">
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<h1 class="text-center text-white mt-3 mb-3">Random Number Collection, Storage and Matching</h1>

<div class="container-fluid p-0 m-0 h-100 row align-items-center" >
    

    <div class="col-sm-6" >

        <img src="img.png" alt="image" class="img-fluid mx-auto d-block" style="height:200px;">

       

        <div class="p-3 m-3 card backgroundCard" >
            <fieldset class="p-3 borderWhite">
                <legend class=" text-white text-center legendHeader ps-3 pe-3" >Input Number</legend>
                <form method="POST" action="#" class="d-flex flex-column m-3 needs-validation" novalidate>
                    <div class="text-danger mb-1" id="eMessage"></div>
                    <div class="mb-3 ">
                        <input type="number" min="10000" max="99999" id="inputNumber" name="inputNumber" placeholder="Enter a 5 digit number" class="form-control" required>
                        <div class="invalid-feedback">
                            Please fill out this field with a 5 digit number.
                        </div>
                    </div>
                    
                </form>
            </fieldset>

            
        </div>
    </div>
   
    <div class="col-sm-6" >

        <div class="p-3 m-3 card borderNone backgroundCard " >
            <fieldset class="p-3 mb-3 borderWhite">
                <legend class="text-white text-center legendHeader ps-3 pe-3" >Live Number</legend>
                <h1 id="runningNum" class="text-center text-white">0000</h1>
            </fieldset>
            <button class="btn btn-primary w-100 text-center" onclick="CollectNumber()">Collect Number</button>
        </div>
    
        <div class="p-3 m-3 card borderNone backgroundCard ">
            <fieldset class="p-3 borderWhite">
                <legend class="text-white text-center legendHeader ps-3 pe-3" >Result</legend>
                    <div id="result" class="text-white">
                        <p>Exact Matches: </p>
                        <p>Continuous Matches: </p>
                        <p>Permutations Match: </p>
                    </div>
            </fieldset>
        </div>
    </div>
</div>


<div class="d-none">
    <div id="collectedNUmber">0</div>
</div>

<script>
    const Interval1 = setInterval(runningNum, 100);

    function runningNum() {
        var randomNum = Math.random()*8000+1000;
        document.getElementById("runningNum").innerHTML = Number.parseInt(randomNum);
    }

    function saveNum(){
        collectNum = document.getElementById("collectedNUmber").innerHTML;

        $.ajax({
            method: 'POST',
            url: 'ajax.php', 
            data: {num: collectNum}
        });
    }
     
    function checkMatching() {
        inputNum = document.getElementById("inputNumber").value;
        collectNum = document.getElementById("collectedNUmber").innerHTML;

        if(inputNum != ""){
        
            console.log (inputNum);
            console.log (collectNum);

            let match = 0;
            let continuous = 0;
            let maxContinuous = 0;
            let permutation = 0;

                    //matched continuous digits
            for (i=0; i < inputNum.length; i++){
                if (inputNum[i] == collectNum[i]){
                    continuous++;
                    if ( continuous > maxContinuous ){
                        maxContinuous = continuous;
                    }
                }else{
                    continuous = 0;
                }
            }

            //matched digits
            for (let i = 0; i < inputNum.length; i++){
                for (let ii = 0; ii< collectNum.length; ii++){
                    if (inputNum[i] == collectNum[ii]){
                        collectNum = collectNum.slice(0,ii) + collectNum.slice(ii+1);
                        console.log(collectNum);
                        match++;
                        break;
                    }
                }
            }

            if(match == 5){
                permutation = 1;
            }

            document.getElementById('result').innerHTML = `
                <p>Exact Matches: ${match}</p>
                <p>Continuous Matches: ${maxContinuous}</p>
                <p>Permutations Match: ${permutation}</p>
            `;

            console.log ("total = ", match);
            console.log ("continuous = ", maxContinuous);
            console.log ("permu = ", permutation);
        }else{
            document.getElementById('result').innerHTML = `
                <p class="text-center">Input field is empty. Please fill out the input field with a 5 digit number.<p>
            `;
        }
    }

    function CollectNumber() {
        let collectNum = "";
            
        const Interval2 = setInterval(()=> {
            let x = document.getElementById("runningNum").innerHTML;
            x = x.slice(-1)
            collectNum = collectNum + x.toString();
            document.getElementById("collectedNUmber").innerHTML = Number.parseInt(collectNum);
        }, 60000);

        const Interval3 = setInterval(()=>{
            clearInterval(Interval2);
            checkMatching();
            saveNum();
            
            clearInterval(Interval3);
        }, 300000);

        
        
    }
   

</script>

<script>
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()

</script>

</body>
</html>