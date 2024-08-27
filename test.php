<!DOCTYPE html>
<html>
<body>

<h2>JavaScript Math.random()</h2>

<p>Math.random() returns a random number between 0 (included) and 1 (excluded):</p>

<p id="demo"></p>
<p id="demo2"></p>

<fieldset>
    <legend>aaa</legend>
</fieldset>

<script>
    const Interval1 = setInterval(myTimer, 500);

    function myTimer() {
        var num = Math.random()*9000;
        document.getElementById("demo").innerHTML = Number.parseInt(num);
    }
    
    const Interval2 = setInterval(myTimer2, 1000);
    let collectNum = "";

    function myTimer2() {
        let x = document.getElementById("demo").innerHTML;
        x = x.toString().slice(-1);
        collectNum = collectNum + x.toString();
        document.getElementById("demo2").innerHTML = Number.parseInt(collectNum);
    }
    
    const Interval3 = setInterval(myTimer3, 5000);
    
    function myTimer3() {
     clearInterval(Interval2);
     checkMatching();
    }

    function checkMatching() {
        inputNum = "15234";
        collectNum = "51234";

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



        console.log ("total = ", match);
        console.log ("continuous = ", maxContinuous);
        console.log ("permu = ", permutation);
    }

    checkMatching();


</script>

</body>

<!-- <div class="container-fluid p-0">

    <div id="runningNum">0000</div>

    <div class="Background h-100 w-100 position-fixed "></div>
    <div class="col-md-4 col-12 p-3 loginForm position-absolute top-50 start-50 translate-middle">
        <form method="POST" action="#" class="d-flex flex-column m-3 needs-validation" novalidate>
            <h2 class="text-white text-center">Number Collector</h2>
            <div class="text-danger mb-1" id="eMessage"></div>
            <div class="mb-3">
                <input type="number" min="10000" max="99999" id="inputNum" name="inputNum" placeholder="Enter a 5 digit number" class="form-control" required>
                <div class="invalid-feedback">
                    Please fill out this field with a 5 digit number.
                </div>
            </div>
            
            <button class="btn btn-primary mb-3">Collect Number</button>
            
        </form>
        
    </div>

</div> -->
</html>

<?php

// $num = $_POST['num'];

// $sql = " INSERT INTO numbers VALUES ('$12345')  ";
// if (mysqli_query($conn, $sql)) {
//     echo "
//         <script>
//             console.log('New record created successfully');
//         </script>
//     ";
// } else {
//     echo "
//         <script>
//             console.log('  Error: ".$sql." <br> ".mysqli_error($conn)." ');
//     //         </script>
//     //     ";
// }
?>