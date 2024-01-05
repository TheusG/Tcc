<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        input{
            height: 80px;
            font-size: 2rem;
            width: 40%;
            text-align: center;
            margin: 0 4px;
        }

        input:disabled{
            background-color: #fff;
        }

        button{
            width: 30%;
            height: 80px;
            background-color: blue;
            color: #fff;
            font-size: 3rem;
            cursor: pointer;
            
        }

        button:hover{
            opacity: 70%;

        }


    </style>
</head>
<body>
    <div class="container">
        <button id="buttonDecrement">-</button>
        <input type="text" disabled value="0" id="counterValue">
        <button id="buttonIncrement">+</button>

    </div>

    <script>
        const counter = document.document.querySelector('#counterValue');
        const buttonDecrement = document.querySelector('#buttonDecrement');
        const buttonIncrement = document.querySelector('#buttonIncrement');
        

        let value = counter.value;

        buttonIncrement.addEventListener('click', () =>{
            value = ++value;
            counter.value = value;
        });

        buttonDecrement.addEventListener('click', () =>{
            value = value !== 0 ? -- value:0;
            counter.value = value;
        });



    </script>
    
</body>
</html>