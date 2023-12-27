<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: white;
        }

        #counter{
            background-color:blue;
            padding: 2rem;
            border-radius: 8px;
        }
        #counter div{
            display: flex;
            align-items: center;
        }

        #value{
            font-size: 8rem;
            color: #fff;
            min-width: 14rem;
            text-align: center;
        }

        button{
            border: none;
            border-radius: 4px;
            color: #fff;
            font-weight: 500;
            cursor: pointer;

        }

        button:hover{
            opacity: .8;
        }

        .count-button{
            width: 6rem;
            height: 6rem;
            font-size: 3rem;
            background-color: gray;
            margin-right: 1rem ;
        }
        .count-button:last-child{
            margin-right: 0rem;
            margin-left: 1rem;
        }







    </style>
</head>
<body>
    <div id="counter">
        <div>
            <button id="plus" class="count-button">+</button>
            <span id="value">0</span>
            <button id="minus" class="count-button">-</button>

        </div>
    </div>

    <script>
        const value = document.getElementById('value');
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        

        const updateValue = () =>{
            value.innerHTML = count;
        };

        let count = 0;
        let intervalId = 0;
        
        

        plusButton.addEventListener('click', () => {
                if(count < 99){
                    count +=1;
                    updateValue();
                }
                
        });

        minusButton.addEventListener('click', () => {
                if(count > 0){
                    count -=1;
                    updateValue();
                }
        });

        document.addEventListener('mouseup', () => clearInterval(intervalId));




    </script>


    
</body>
</html>